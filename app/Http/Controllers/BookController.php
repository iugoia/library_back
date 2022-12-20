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

    public function search(Request $request)
    {
        if ($request->ajax()){
            $data = Book::where('id','like','%'.$request->search.'%')
                ->orwhere('author','like','%'.$request->search.'%')
                ->orwhere('name','like','%'.$request->search.'%')
                ->orwhere('genre','like','%'.$request->search.'%')
                ->get();

            $output = '';
            if (count($data) > 0){
                $output = '<ul class="books__catalog__list">';

                foreach ($data as $item) {
                    $output .= '<li class="book__catalog__item">
                                        <div class="container__catalog__book">
                                            <div class="book__catalog__container__image">
                                                <img src="' . $item->image . '" alt="">
                                            </div>
                                            <div class="book__catalog__info">
                                                <p>Название: ' . $item->name . '</p>
                                                <p>Автор: ' . $item->author . '</p>
                                                <p>Жанр: ' . $item->genre . '</p>
                                            </div>
                                            <div class="btn__container">
                                                <a href="" class="btn__default">Забронировать</a>
                                            </div>
                                        </div>
                                    </li>';
                }
                $output .= '</ul>';
                ;
            }
            else {
                $output .= 'Нет совпадений';
            }
        }
        return $output;
    }
}
