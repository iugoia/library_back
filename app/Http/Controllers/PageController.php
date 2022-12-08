<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function indexPage()
    {
        return view('index');
    }

    public function createLogin()
    {
        if (Auth::check()){
            return redirect(route('private'));
        }
        return view('auth.main.auth');
    }

    public function createRegister()
    {
        if (Auth::check()){
            return redirect(route('private'));
        }
        return view('auth.main.register');
    }
}
