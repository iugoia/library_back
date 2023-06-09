<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $arrDataList = array();
        $books = array();
        foreach ($reservations as $reservation){
            $user = User::find($reservation->user_id);
            $book = Book::find($reservation->book_id);
            $arrDataList[] = [
                'id' => $reservation->id,
                'username' => $user->login,
                'userphone' => $user->phone,
                'book' => $book->name,
                'bookimage' => $book->image,
                'bookrack' => $book->rack,
                'bookrow' => $book->row,
                'bookshelf' => $book->shelf,
                'created_at' => $reservation->created_at,
                'received_time' => $reservation->received_time,
                'status' => $reservation->status
            ];
            $books[] = $book;
        }
        return view('librarian.reservations.index', compact('arrDataList', 'books'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id'],
            'received_time' => ['required', 'date', 'date_format:Y-n-j']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $book = Book::find($request->book_id);
        if ($book->is_available == false){
            return redirect()->back()->with('error', 'Книга уже забронирована');
        }
        if ($book->count > 0) {
            $book->is_available = true;
        } else {
            $book->is_available = false;
        }
        $book->save();
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $book = Book::find($reservation->book_id);
        return view('librarian.reservations.update', compact('reservation', 'book'));
    }

    public function update(Reservation $reservation, Request $request)
    {
        if (($reservation->status === 'Выдано' && $request->status === 'Забронировано') || ($reservation->status === 'Возвращено' && $request->status === 'Выдано') || ($reservation->status === 'Возвращено' && $request->status === 'Забронировано'))
            return redirect()->back()->with('error', 'Нельзя поставить статус ниже');

        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ]);
        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $book = Book::find($reservation->book_id);

        if ($request->status == 'Возвращено'){
            $book->count = $book->count + 1;
            $book->save();
        }
        if ($book->count > 0) {
            $book->is_available = true;
        } else {
            $book->is_available = false;
        }
        $book->save();
        $reservation->update($request->all());
        return redirect()->back()->with('success', 'Бронирование успешно обновлено');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id)->first();
        $book = Book::find($reservation->book_id);
        if ($reservation->status === 'Забронировано'){
            $book->count = $book->count + 1;
            $book->save();
        }

        if ($book->count > 0) {
            $book->is_available = true;
        } else {
            $book->is_available = false;
        }
        $book->save();
        if ($reservation->status === 'Выдано'){
            return redirect()->back()->with('error', 'Бронирование не может быть снято, так как книга не возвращена.');
        }
        $reservation->delete();
        return redirect()->back()->with('success', 'Бронирование успешно удалено');
    }
}
