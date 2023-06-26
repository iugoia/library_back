<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBooksLibrarian extends Component
{
    public $query = '';
    public $books;

    protected $queryString = ['query'];

    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        $paginator = Book::where('name', 'like', '%'.$this->query.'%')
            ->orWhereHas('author', function ($query) {
                $query->where('name', 'like', '%'.$this->query.'%');
            })
            ->orWhereHas('genre', function ($query) {
                $query->where('name', 'like', '%'.$this->query.'%');
            })
            ->paginate(10);
        $this->books = $paginator->items();
        return view('livewire.search-books-librarian', ['paginator' => $paginator]);
    }

}
