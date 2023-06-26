<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Author extends Component
{
    public $search = '';
    public $authors;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        sleep(1);
        $searchTerm = '%' . $this->search . '%';
        $paginator = \App\Models\Author::where('name', 'like', $searchTerm)
            ->orWhere('description', 'like', $searchTerm)
            ->paginate(10);

        $this->authors = $paginator->items();
        return view('livewire.author', ['paginator' => $paginator]);
    }
}
