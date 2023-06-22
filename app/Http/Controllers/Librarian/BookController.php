<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('librarian.books.index');
    }

    public function create()
    {
        return view('librarian.books.create');
    }

    public function edit()
    {
        return view('librarian.books.edit');
    }
}
