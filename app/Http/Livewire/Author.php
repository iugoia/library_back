<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Author extends Component
{
    public $search;
    public $authors;

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        $paginator = \App\Models\Author::where('name', 'like', $searchTerm)
            ->orWhere('description', 'like', $searchTerm)
            ->paginate(10);

        $this->authors = $paginator->items();
        return view('livewire.author', ['paginator' => $paginator]);
    }
}
