<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;

class GenreController extends Controller
{
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
        return view('librarian.genres.edit', compact('genre'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:4', 'max:50', 'unique:genres,name']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        Genre::create($request->all());

        return redirect()->back()->with('success', "Жанр успешно создан");
    }

    public function update(Request $request, Genre $genre)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:4', 'max:50', Rule::unique('genres', 'name')->ignore($genre->id)],
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        $genre->update($request->all());

        return redirect()->back()->with('success', "Жанр успешно обновлен");
    }

    public function destroy(Genre $genre)
    {
        $books = Book::where('genre_id', '=', $genre->id)->get();
        if (!isEmpty($books))
            return redirect()->back()->with('error', "Удалите сначала книги, у которых проставлен данный жанр");
        $genre->delete();
        return redirect()->back()->with('success', "Жанр успешно удален");
    }
}
