<?php

namespace App\Http\Livewire\V1;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBooks extends Component
{

    public $name;
    public $books;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;
    public function render()
    {
        $name = '%' . $this->name . '%';
        $paginator = Book::where('name', 'like', $name)
            ->orwhere('author', 'like', $name)->paginate(8);

        $this->books = $paginator->items();
        return view('livewire.search-books', ['paginator' => $paginator]);
    }
}
