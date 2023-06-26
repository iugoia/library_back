<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('sort')){
            $sort = $request->input('sort');
            $direction = $request->input('direction');
            $feedbacks = Feedback::orderBy($sort, $direction)->get();
        } elseif($request->input('select')){
            $select = $request->input('select');
            $value = $request->input('value');
            $feedbacks = Feedback::where($select, '=', $value)->get();
        }
        else {
            $feedbacks = Feedback::all();
        }
        $arrDataList = array();
        foreach ($feedbacks as $feedback){
            $arrDataList[] = [
                'feedback' => $feedback,
                'user' => User::find($feedback->user_id),
                'answer' => Answer::all()->where('feedback_id', '=', $feedback->id)
            ];
        }
        return view('support.feedbacks.index', compact('arrDataList'));
    }

    public function edit()
    {
        return view('support.feedbacks.edit');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', "Отзыв успешно удален");
    }
}
