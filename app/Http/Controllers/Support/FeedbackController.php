<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('support.feedbacks.index');
    }

    public function edit()
    {
        return view('support.feedbacks.edit');
    }
}
