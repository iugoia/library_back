<?php

namespace App\Http\Controllers\V1\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(8);
        return view('librarian.books.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('librarian.books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:4', 'string', 'max:60'],
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png,webp'],
            'author' => ['required', 'min:5', 'string', 'max:60'],
            'genre_id' => ['required', 'exists:genres,id'],
            'rack' => ['required', 'numeric'],
            'shelf' => ['required', 'numeric'],
            'row' => ['required', 'numeric'],
            'count' => ['required', 'numeric'],
            'description' => ['nullable', 'string']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filename = $request->file('image')->store('/books', 'public');
        $book = Book::create([
            'image' => $filename
        ] + $request->all());
        return redirect()->back()->with('success', 'Книга успешно добавлена');
    }

    public function edit(Book $book)
    {
        return view('librarian.books.update', compact('book'));
    }

    public function update(Book $book, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5', 'string', 'max:60'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
            'author' => ['required', 'min:5', 'string', 'max:60'],
            'genre_id' => ['required', 'exists:genres,id'],
            'rack' => ['required', 'numeric'],
            'shelf' => ['required', 'numeric'],
            'row' => ['required', 'numeric'],
            'count' => ['required', 'numeric'],
            'description' => ['nullable', 'string']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->image){
            $filename = $request->file('image')->store('/books', 'public');

            $book->update([
                'image' => $filename
            ] + $request->all());

            return redirect()->back()->with('success', 'Книга успешно обновлена');
        }

        $book->update($request->all());

        return redirect()->back()->with('success', 'Книга успешно обновлена');
    }

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->image);
        $book->delete();
        return redirect()->back()->with('success', 'Книга успешно удалена');
    }
}
