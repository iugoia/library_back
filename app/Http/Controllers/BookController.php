<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Feedback;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('catalog', compact('books'));
    }

    public function show(Book $book)
    {
        $author = Author::find($book->author_id);
        $author_books = Book::all()->where('author_id', '=', $author->id);
        $feedbacks = Feedback::all()->where('book_id', '=', $book->id);
        return view('book', compact('book', 'author_books', 'author', 'feedbacks'));
    }
}
