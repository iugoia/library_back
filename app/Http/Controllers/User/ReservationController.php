<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::all()->where('user_id', $user->id);
        $arrDataList = array();
        foreach ($reservations as $reservation) {
            $book = Book::where('id', $reservation['book_id'])->first();
            $arrDataList[] = [
                'reservation' => $reservation,
                'book' => $book
            ];
        }
        return view('user.main.reservations.index', compact('arrDataList'));
    }

    public function destroy(Reservation $reservation)
    {

        if ($reservation->status === 'Забронировано'){
            $book = Book::find($reservation->book_id);
            $book->count = $book->count + 1;
            if ($book->count > 0) {
                $book->is_available = true;
            } else {
                $book->is_available = false;
            }
            $book->save();
            $reservation->delete();
            return redirect()->back()->with('success', 'Бронирование успешно снято');
        }
        if ($reservation->status === 'Выдано'){
            return redirect()->back()->with('error', 'Бронирование нельзя снять, так как книга не возвращена');
        }
        if ($reservation->status === 'Возвращено'){
            return redirect()->back()->with('error', 'Бронирование нельзя снять.');
        }
    }

    public function store(Request $request, $book_id)
    {
        $currentDate = new Carbon();
        $received_time = Carbon::parse($request->received_time);
        $diff = $received_time->diffInDays($currentDate);
        if ($diff > 14)
            return redirect()->back()->with('error', 'Дата выбрана неправильно');
        $book = Book::find($book_id);

        $book->count = $book->count - 1;
        $book->save();
        if ($book->count > 0) {
            $book->is_available = true;
        } else {
            $book->is_available = false;
        }
        $book->save();
        $formFields = [
            'user_id' => Auth::user()->id,
            'book_id' => $book->id,
            'received_time' => $request->received_time
        ];
        $reservation = Reservation::create($formFields);

        return redirect(route('user.reservations.index'));
    }
}
