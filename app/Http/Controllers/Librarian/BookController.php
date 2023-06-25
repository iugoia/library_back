<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('librarian.books.index', compact('books'));
    }

    public function create()
    {
        $genres = DB::table('genres')->orderBy('name')->get();
        $authors = DB::table('authors')->orderBy('name')->get();
        return view('librarian.books.create', compact('genres', 'authors'));
    }

    public function edit(Book $book)
    {
        return view('librarian.books.edit', compact('book'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:5', 'max:60'],
            'image' => ['required', 'mimes:png,jpeg,jpg,webp'],
            'genre_id' => ['required', 'exists:genres,id'],
            'author_id' => ['required', 'exists:authors,id'],
            'count' => ['nullable', 'numeric'],
            'description' => ['nullable', 'min:10']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        $filename = $request->file('image')->store('/books', 'public');

        Book::create([
            'image' => $filename
        ] + $request->all());

        return redirect()->back()->with('success', "Книга успешно создана");
    }

    public function update(Request $request, Book $book)
    {

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('success', "Книга успешно удалена");
    }
}
