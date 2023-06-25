<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function create(Feedback $feedback, User $user)
    {
        return view('support.answers.create', compact('feedback', 'user'));
    }

    public function edit(Feedback $feedback, User $user, Answer $answer)
    {
        return view('support.answers.edit', compact('feedback', 'user', 'answer'));
    }

    public function store(Feedback $feedback, User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => ['required', 'string', 'min:10', 'max:300']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        Answer::create([
            'user_id' => $user->id,
            'feedback_id' => $feedback->id,
            'support_id' => Auth::user()->id
        ] + $request->all());

        return redirect()->back()->with('success', "Ответ успешно добавлен");
    }

    public function update(Answer $answer, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => ['nullable', 'min:10', 'string', 'max:300']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        $answer->update($request->all());
        return redirect()->back()->with('success', "Ответ успешно изменен");
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->back()->with('success', "Ответ успешно удален");
    }
}
