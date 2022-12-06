<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function indexPage()
    {
        return view('index');
    }

    public function createLogin()
    {
        return view('auth.main.auth');
    }

    public function createRegister()
    {
        return view('auth.main.register');
    }
}
