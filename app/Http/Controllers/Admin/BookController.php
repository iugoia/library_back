<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = BooksResource::collection(Book::all());
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:2', 'string', 'max:60'],
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png'],
            'author' => ['required', 'min:5', 'string', 'max:60'],
            'genre' => ['required', 'string', 'max:60'],
            'rack' => ['required'],
            'shelf' => ['required'],
            'row' => ['required'],
            'description' => ['nullable', 'string']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filename = $request->file('image')->store('/books', 'public');

        Book::create([
            'image' => $filename
        ] + $request->all());

        return redirect()->back()->with('success', 'Книга успешно добавлена');
    }

    public function edit()
    {
        return redirect(route('admin.book.edit'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
