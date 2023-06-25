<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::all()->where('user_id', '=', $user->id);
        $arrDataList = array();
        foreach ($reservations as $reservation) {
            $book = Book::where('id', $reservation['book_id'])->first();
            $arrDataList[] = [
                'reservation' => $reservation,
                'book' => $book
            ];
        }
        return view('user.reservations.index', compact('arrDataList'));
    }

    public function store(Book $book, Request $request)
    {
        $reservation_user = Reservation::all()->where('user_id', '=', Auth::user()->id)
            ->where('book_id', '=', $book->id);
        if ($reservation_user){
            foreach ($reservation_user as $reservation_current){
                if ($reservation_current->status = "Забронировано"){
                    return redirect()->back()->with('error', "Вы уже забронировали данную книгу");
                }
            }
        }

        $currentDate = new Carbon();
        $received_time = Carbon::parse($request->received_time);
        $diff = $received_time->diffInDays($currentDate);
        if ($diff > 14)
            return redirect()->back()->with('error', 'Дата выбрана неправильно');

        $book->count = $book->count - 1;
        $book->save();

        $formFields = [
            'user_id' => Auth::user()->id,
            'book_id' => $book->id,
            'received_time' => $request->received_time
        ];
        $reservation = Reservation::create($formFields);

        return redirect(route('user.reservations.index'));
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if ($reservation->status === 'Забронировано'){
            $book = Book::find($reservation->book_id);
            $book->count = $book->count + 1;
            $book->save();
            $reservation->delete();
            return redirect()->back()->with('success', 'Бронирование успешно снято');
        }
        if ($reservation->status === 'Выдано'){
            return redirect()->back()->with('error', 'Бронирование нельзя снять, так как книга не возвращена');
        }
        if ($reservation->status === 'Возвращено'){
            return redirect()->back()->with('error', 'Бронирование нельзя снять');
        }
    }
}
