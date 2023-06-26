<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBooksLibrarian extends Component
{
    public $name;
    public $books;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;
    public function render()
    {
//        $name = '%' . $this->name . '%';
        $paginator = Book::where('name', 'like', '%' . $this->name . '%')
            ->orWhereHas('authors', function ($query) {
                $query->where('name', 'like', '%' . $this->name . '%');
            })
            ->orWhereHas('genres', function ($query) {
                $query->where('name', 'like', '%' . $this->name . '%');
            })
            ->with('author', 'genre')
            ->paginate(10);

        $this->books = $paginator->items();
        return view('livewire.search-books-librarian', ['paginator' => $paginator]);
    }
}
