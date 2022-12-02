<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\ReservationStoreRequest;
use App\Http\Requests\Reservation\ReservationUpdateRequest;
use App\Http\Resources\ReservationsResource;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        return ReservationsResource::collection(Reservation::all());
    }

    public function show(Reservation $reservation)
    {
        return new ReservationsResource($reservation);
    }

    public function store(ReservationStoreRequest $request)
    {
        $book = Book::find($request->book_id);
        $book->is_available = false;
        $book->save();
        $reservation = Reservation::create($request->validated());
        $reservation->save();

        return response()->json([
            'message' => 'Бронирование успешно создано'
        ]);
    }

    public function update(Reservation $reservation, ReservationUpdateRequest $request)
    {
        if ($request->status == 'Возвращено'){
            $book = Book::find($reservation->book_id);
            $book->is_available = true;
            $book->save();
        }
        $reservation->update($request->validated());

        return response()->json([
            'message' => 'Успешное обновление'
        ]);
    }

    public function destroy(Reservation $reservation)
    {
        $book = Book::find($reservation->book_id);
        $book->is_available = true;
        $book->save();
        $reservation->delete();

        return response()->json([
            'message' => 'Бронирование успешно удалено'
        ]);
    }
}
