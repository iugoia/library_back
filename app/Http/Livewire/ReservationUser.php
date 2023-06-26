<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReservationUser extends Component
{
    public $search = '';
    public $startDate;
    public $endDate;
    public $statusFilter = '';

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public function render()
    {
        $arrDataList = [];
        if ($this->search != ''){
            $reservations = Reservation::where('user_id', auth()->id())
                ->when($this->search, function ($query, $term) {
                    $query->where(function ($query) use ($term) {
                        $query->whereHas('book', function ($query) use ($term) {
                            $query->where('name', 'like', '%'.$term.'%');
                        })
                            ->orWhereHas('book.author', function ($query) use ($term) {
                                $query->where('name', 'like', '%'.$term.'%');
                            });
                    });
                })
                ->orWhere('status', 'like', '%'.$this->search.'%')
                ->get();

//            $reservations = Reservation::where('user_id', auth()->id())
//                ->when($this->search, function ($query, $term) {
//                    $query->where(function ($query) use ($term) {
//                        $query->whereHas('book', function ($query) use ($term) {
//                            $query->where('name', 'like', '%'.$term.'%');
//                        })
//                            ->orWhereHas('book.author', function ($query) use ($term) {
//                                $query->where('name', 'like', '%'.$term.'%');
//                            });
//                    });
//                })
//                ->whereBetween('created_at', [$this->startDate, $this->endDate])
//                ->get();
        } else {
            $reservations = Reservation::all()->where('user_id', '=', Auth::user()->id);
        }

        foreach ($reservations as $reservation){
            $arrDataList[] = [
                'reservation' => Reservation::find($reservation->id),
                'book' => Book::find($reservation->book_id)
            ];
        }

        return view('livewire.reservation-user', ['arrDataList' => $arrDataList]);
    }
}
