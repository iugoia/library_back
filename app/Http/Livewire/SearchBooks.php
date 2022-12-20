<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
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
        $paginator = $this->books = DB::table('books')
            ->where(DB::raw('lower(name)'), 'like', strtolower($name))
            ->orwhere(DB::raw('lower(author)'), 'like', strtolower($name))
            ->orwhere(DB::raw('lower(genre)'), 'like', strtolower($name))->paginate(8);
        $this->books = $paginator->items();
        return view('livewire.search-books', ['paginator' => $paginator]);
    }
}
