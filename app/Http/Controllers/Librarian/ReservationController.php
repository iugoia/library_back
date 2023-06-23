<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('librarian.reservations.index');
    }

    public function edit()
    {
        return view('librarian.reservations.edit');
    }
}
