<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class PersonalController extends Controller
{
    public function index(User $user)
    {
        return view('user.main.personal', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.main.edit', compact('user'));
    }

}
