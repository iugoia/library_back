<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $feedbacks = Feedback::all()->where('user_id', $user->id);
        $arrDataList = array();
        foreach ($feedbacks as $feedback) {
            $book = Book::where('id', $feedback['book_id'])->first();
            $arrDataList[] = [
                'feedback' => $feedback,
                'book' => $book
            ];
        }
        return view('user.main.feedbacks.index', compact('arrDataList'));
    }

    public function create(Book $book)
    {
        return view('user.main.feedbacks.create', compact('book'));
    }

    public function edit(Feedback $feedback)
    {
        $book = Book::query()->where('id', $feedback->book_id)->first();
        return view('user.main.feedbacks.edit', compact('feedback', 'book'));
    }

    public function store(Request $request, Book $book)
    {
        if (Feedback::query()->where('user_id', Auth::user()->id)->first() && Feedback::query()->where('book_id', $book->id)->first()){
            return redirect()->back()->with('error', 'Отзыв уже добавлен');
        }

        $validator = Validator::make($request->all(), [
            'score' => ['required', 'numeric'],
            'message' => ['required', 'string', 'min:20']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        $formFields = [
            'book_id' => $book->id,
            'user_id' => Auth::user()->id,
            'score' => $request->score,
            'message' => $request->message
        ];

        Feedback::create($formFields);

        return redirect()->back()->with('success', 'Отзыв успешно добавлен');
    }

    public function update(Request $request, Feedback $feedback)
    {
        $validator = Validator::make($request->all(), [
            'score' => ['nullable', 'numeric'],
            'message' => ['nullable', 'string', 'min:20']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        $feedback->update($request->all());

        return redirect()->back()->with('success', 'Отзыв успешно обновлен');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', 'Отзыв успешно удален');
    }
}
