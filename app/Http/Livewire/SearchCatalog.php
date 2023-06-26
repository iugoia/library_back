<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class SearchCatalog extends Component
{
    public $name;
    public $books;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;
    public function render(Request $request)
    {
        $name = '%' . $this->name . '%';
        $genres = (array) $request->genre_id;

        $paginator = Book::select('books.*', 'authors.name as author_name')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->where(function($query) use ($name) {
                $query->where('books.name', 'like', $name)
                    ->orWhere('authors.name', 'like', $name);
            })
            ->when(!empty($genres), function($query) use ($genres) {
                $query->whereIn('books.genre_id', $genres);
            })
            ->paginate(100);

        $genres = Genre::all();

        $this->books = $paginator->items();
        return view('livewire.search-catalog', ['paginator' => $paginator, 'genres' => $genres]);
    }

}
