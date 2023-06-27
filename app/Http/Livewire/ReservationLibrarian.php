<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Livewire\Component;

class ReservationLibrarian extends Component
{
    public $search = '';

    public $created_at = '';
    public $received_at = '';

    public function render(Request $request)
    {
//        sleep(1);
        $sort = '';
        $direction = '';
        if ($request->input('sort')){
            $sort = $request->input('sort');
            $direction = $request->input('direction');
            $reservations = Reservation::orderBy($sort, $direction)->get();
        } elseif($this->search !== '') {
            $reservations = Reservation::where('status', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function($name) {
                    $name->where('name', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('user', function($name) {
                    $name->where('surname', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('user', function($name) {
                    $name->where('login', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('user', function($name) {
                    $name->where('email', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('book', function($name) {
                    $name->where('name', 'like', '%'.$this->search.'%');
                })
                ->get();
        } elseif($this->created_at !== '' && $this->received_at !== '') {
            $reservations = Reservation::whereBetween('created_at', [$this->created_at, $this->received_at])
                ->whereBetween('received_time', [$this->created_at, $this->received_at])
                ->get();
        } else {
            $reservations = Reservation::all();
        }
        $arrDataList = [];
        foreach ($reservations as $reservation){
            $arrDataList[] = [
                'reservation_id' => $reservation->id,
                'user_id' => \App\Models\User::find($reservation->user_id)->id,
                'book_id' => Book::find($reservation->book_id)->id
            ];
        }

        return view('livewire.reservation-librarian', ['sort' => $sort, 'direction' => $direction, 'arrDataList' => $arrDataList]);
    }
}
