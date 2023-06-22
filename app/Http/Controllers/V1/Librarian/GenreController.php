<?php

namespace App\Http\Controllers\V1\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:40']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Genre::create($request->all());

        return redirect()->back()->with('success', 'Жанр успешно добавлен');
    }

    public function index()
    {
        $genres = Genre::all();

        return view('librarian.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('librarian.genres.create');
    }

    public function edit(Genre $genre)
    {
        return view('librarian.genres.update', compact('genre'));
    }

    public function update(Genre $genre, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'min:3', 'max:40']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $genre->update($request->all());
        return redirect()->back()->with('success', 'Жанр успешно обновлен');
    }

    public function destroy(Genre $genre)
    {
        $book = Book::find($genre->id)->first();
        if ($book) {
            return redirect()->back()->with('error', 'Пожалуйста, удалите книги с этим жанром перед тем, как удалять жанр');
        }

        $genre->delete();
        return redirect()->back()->with('success', 'Жанр успешно удален');
    }
}
