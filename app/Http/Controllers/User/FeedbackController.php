<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('user.feedbacks.index');
    }

    public function edit()
    {
        return view('user.feedbacks.edit');
    }

    public function create()
    {
        return view('user.feedbacks.create');
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
