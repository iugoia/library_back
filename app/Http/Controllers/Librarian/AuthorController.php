<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('librarian.authors.index');
    }

    public function create()
    {
        return view('librarian.authors.create');
    }

    public function edit()
    {
        return view('librarian.authors.edit');
    }
}
