<?php

namespace App\Http\Controllers\Librarian;

use App\Exports\ReservationsExport;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export(Request $request)
    {
        $array = $request->input('array');
        $arrDataList = [];
        foreach ($array as $item){
            $user = User::find($item['user_id']);
            $reservation = Reservation::find($item['reservation_id']);
            $book = Book::find($item['book_id']);
            $author = Author::find($book->author_id);
            $arrDataList[] = [
                '#' => $reservation->id,
                'Название книги' => $book->name,
                'Автор' => $author->name,
                'Статус бронирования' => $reservation->status,
                'Начало бронирования' => date('d.m.Y', strtotime($reservation->created_at)),
                'Конец бронирования' => date('d.m.Y', strtotime($reservation->received_time)),
                'Имя' => $user->name,
                'Фамилия' => $user->surname,
                'Телефон' => $user->phone,
                'Логин' => $user->login,
                'Почта' => $user->email
            ];
        }
        return Excel::download(new ReservationsExport($arrDataList), 'Бронирования.xlsx');
    }

    public function exportToHtml(Request $request)
    {
        $array = $request->input('array');
        $arrDataList = [];
        foreach ($array as $item){
            $arrDataList[] = [
                'reservation_id' => $item['reservation_id'],
                'book_id' => $item['book_id'],
                'user_id' => $item['user_id']
            ];
        }
        $html = view('librarian.reservations.html-template', ['arrDataList' => $arrDataList])->render();

        // Отдаем файл на скачивание
        $fileName = 'reservations.html';
        $headers = array(
            'Content-Type' => 'text/html',
            'Content-Disposition' => 'attachment; filename=' . $fileName,
        );

        return response()->make($html, 200, $headers);
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
