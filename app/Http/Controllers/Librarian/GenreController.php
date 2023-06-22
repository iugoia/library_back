<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('librarian.genres.index');
    }

    public function create()
    {
        return view('librarian.genres.create');
    }

    public function edit()
    {
        return view('librarian.genres.edit');
    }
}
