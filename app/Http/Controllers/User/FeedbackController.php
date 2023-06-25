<?php

namespace App\Http\Controllers\User;

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
        $feedbacks = Feedback::all()->where('user_id', '=', $user->id);
        return view('user.feedbacks.index', compact('feedbacks'));
    }

    public function edit(Feedback $feedback)
    {
        return view('user.feedbacks.edit', compact('feedback'));
    }

    public function create($id_book)
    {
        $book = Book::find($id_book);
        return view('user.feedbacks.create', compact('book'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $validator = Validator::make($request->all(), [
            'score' => ['nullable', 'numeric'],
            'message' => ['required', 'string', 'min:20']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        $feedback->update($request->all());

        return redirect()->back()->with('success', "Отзыв успешно изменен");
    }

    public function store(Request $request, Book $book)
    {
        $feedbacks = Feedback::all()->where('user_id', '=', Auth::user()->id)->where('book_id', '=', $book->id);
        if (!$feedbacks->isEmpty()){
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

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', "Отзыв успешно удален");
    }
}
