<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('librarian.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('librarian.authors.create');
    }

    public function edit(Author $author)
    {
        return view('librarian.authors.edit', compact('author'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:5', 'max:60', 'unique:authors,name'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png'],
            'description' => ['nullable', 'string', 'min:10', 'max:255']
        ]);
        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        if ($request->photo)
            $filename = $request->file('photo')->store('/authors', 'public');
        else
            $filename = null;
        Author::create([
            'photo' => $filename
        ] + $request->all());

        return redirect()->back()->with('success', "Автор успешно создан");
    }

    public function update(Request $request, Author $author)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:5', 'max:60', Rule::unique('authors', 'name')->ignore($author->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png'],
            'description' => ['nullable', 'string', 'min:10', 'max:255']
        ]);
        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        if ($request->photo)
            $filename = $request->file('photo')->store('/authors', 'public');
        else if ($author->photo)
            $filename = $author->photo;
        else
            $filename = null;

        $author->update([
            'photo' => $filename
        ] + $request->all());

        return redirect()->back()->with('success', "Автор успешно обновлен");
    }

    public function destroy(Author $author)
    {
        $books = Book::where('author_id', '=', $author->id)->get();
        if (!isEmpty($books))
            return redirect()->back()->with('error', "Удалите сначала книги, у которых проставлен данный автор");

        $author->delete();
        return redirect()->back()->with('success', "Автор успешно удален");
    }
}
