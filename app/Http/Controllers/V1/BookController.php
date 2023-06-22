<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
//        $books = Book::paginate(8);
        return view('books.main.catalog');
    }

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

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->image);
        $book->delete();
        return response()->json([
            'message' => 'Книга успешно удалена'
        ]);
    }

}
