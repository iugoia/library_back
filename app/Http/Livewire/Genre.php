<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Genre extends Component
{
    public $name = '';
    public $genres;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->name . '%';
        $paginator = \App\Models\Genre::where('name', 'like', $search)->paginate(10);

        $this->genres = $paginator->items();

        return view('livewire.genre', ['paginator' => $paginator]);
    }
}
