<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    public function show(Book $book)
    {
        return new BooksResource($book);
    }

    public function store(BookStoreRequest $request)
    {
        $filename = $request->file('image')->store('/books', 'public');
        Book::create([
            'name' => $request->name,
            'image' => $filename,
            'author' => $request->author,
            'genre' => $request->genre,
            'rack' => $request->rack,
            'shelf' => $request->shelf,
            'row' => $request->row,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Книга успешно добавлена'
        ]);
    }

    public function update(Book $book, BookUpdateRequest $request)
    {
        $book->update($request->validated());

        return response()->json([
            'message' => 'Успешное обновление'
        ]);
    }

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->image);
        $book->delete();
        return response()->json([
            'message' => 'Книга успешно удалена'
        ]);
    }

    public function showCatalog()
    {
        $books = $this->index();
        $genres = $this->showGenres();
        return view('books.main.catalog', compact('books', 'genres'));
    }

    public function showGenres()
    {
        $books = Book::all()->unique('genre');
        $genres = array();
        foreach ($books as $book){
            $genres[] = $book->genre;
        }
        return $genres;
    }
}
