<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Feedback;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $genres = DB::table('genres')->orderBy('name')->get();
        return view('catalog', compact('books', 'genres'));
    }

    public function show(Book $book)
    {
        $author = Author::find($book->author_id);
        $author_books = Book::all()->where('author_id', '=', $author->id);
        $feedbacks = Feedback::all()->where('book_id', '=', $book->id);
        if (!$feedbacks->isEmpty()){
            $countFeedbacks = $feedbacks->count();
            $sum = 0;
            foreach ($feedbacks as $feedback){
                $sum += $feedback->score;
            }
            $sumAvg = $sum / $countFeedbacks;
            $widthRating = ($sumAvg * 22) + (floor($sumAvg) * 3);
        } else {
            $sumAvg = 0;
            $widthRating = 0;
        }

        return view('book', compact('book', 'author_books', 'author', 'feedbacks', 'widthRating', 'sumAvg'));
    }
}
