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

    public function login()
    {
        if (Auth::check()){
            return redirect(route('UserPersonalAccount'));
        }
        return view('auth.main.login');
    }

    public function register()
    {
        if (Auth::check()){
            return redirect(route('UserPersonalAccount'));
        }
        return view('auth.main.register');
    }
}
