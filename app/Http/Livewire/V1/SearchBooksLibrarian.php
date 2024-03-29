<?php

namespace App\Http\Livewire\V1;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBooksLibrarian extends Component
{
    public $searchTerm;
    public $books;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $paginator = Book::where('name', 'like', $searchTerm)
            ->orwhere('author', 'like', $searchTerm)->paginate(8);

        $this->books = $paginator->items();
        return view('livewire.search-books-librarian', ['paginator' => $paginator]);
    }
}
