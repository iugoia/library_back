<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    public $name = '';
    public $users;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $name = '%' . $this->name . '%';

        $paginator = \App\Models\User::where('name', 'like', $name)
            ->orWhere('surname', 'like', $name)
            ->orWhere('login', 'like', $name)
            ->orWhere('email', 'like', $name)
            ->orWhere('role', 'like', $name)
            ->paginate(10);

        $this->users = $paginator->items();

        return view('livewire.user', ['paginator' => $paginator]);
    }
}
