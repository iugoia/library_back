<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BooksResource;
use App\Http\Resources\FeedbacksResource;
use App\Models\Book;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{


    public function showPage(Book $book)
    {
        $item = new BooksResource($book);
        $arrDataList = array();
        $feedbacks = $item->feedbacks;
        foreach ($feedbacks as $feedback) {
            $user = User::find($feedback->user_id);
            $arrDataList[] = [
                'username' => $user->name,
                'usersurname' => $user->surname,
                'avatar' => $user->avatar,
                'score' => $feedback->score,
                'message' => $feedback->message,
            ];
        }
        return view('books.main.show', compact('item', 'arrDataList'));
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

    public function showCatalog(Request $request)
    {
        $cat = Book::where('genre', $request->orderBy)->first();
        $books = $this->index();
        $genres = $this->showGenres();

        if (isset($request->orderBy)){
            if ($request->orderBy == 'Ужасы'){
                $books = Book::where('genre', $request->orderBy);
            }
        }

        if($request->ajax()){
            return view('books.main.catalog', compact('books'));
        }

        return view('books.main.catalog', compact('books', 'genres', 'cat'));
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
