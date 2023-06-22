<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
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
