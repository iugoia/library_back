<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    public $searchTerm;
    public $users;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $paginator = User::where('name', 'like', $searchTerm)
            ->orwhere('surname', 'like', $searchTerm)
            ->orwhere('phone', 'like', $searchTerm)
            ->orwhere('role', 'like', $searchTerm)
            ->orwhere('email', 'like', $searchTerm)->paginate(6);
        $this->users = $paginator->items();
        return view('livewire.search-users', ['paginator' => $paginator]);
    }
}
