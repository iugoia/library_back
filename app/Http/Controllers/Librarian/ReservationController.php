<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $arrDataList = array();
        foreach ($reservations as $reservation){
            $arrDataList[] = [
                'reservation' => $reservation,
                'book' => Book::find($reservation->book_id),
                'user' => User::find($reservation->user_id)
            ];
        }
        return view('librarian.reservations.index', compact('arrDataList'));
    }

    public function edit(Reservation $reservation, Book $book, User $user)
    {
        return view('librarian.reservations.edit', compact('reservation', 'book', 'user'));
    }

    public function update(Reservation $reservation, Request $request)
    {
        if (($reservation->status === 'Выдано' && $request->status === 'Забронировано') || ($reservation->status === 'Возвращено' && $request->status === 'Выдано') || ($reservation->status === 'Возвращено' && $request->status === 'Забронировано'))
            return redirect()->back()->with('error', 'Нельзя поставить статус ниже');

        $validator = Validator::make($request->all(), [
            'status' => ['required', 'string']
        ]);
        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $book = Book::find($reservation->book_id);

        if ($request->status == 'Возвращено' && $reservation->status !== "Возвращено"){
            $book->count = $book->count + 1;
            $book->save();
        }

        $reservation->update($request->all());
        return redirect()->back()->with('success', 'Бронирование успешно обновлено');
    }

    public function destroy(Reservation $reservation)
    {
        $book = Book::find($reservation->book_id);
        if ($reservation->status === 'Забронировано'){
            $book->count = $book->count + 1;
            $book->save();
        }

        if ($reservation->status !== 'Забронировано'){
            return redirect()->back()->with('error', 'Бронирование не может быть снято');
        }

        $reservation->delete();
        return redirect()->back()->with('success', 'Бронирование успешно удалено');
    }
}
