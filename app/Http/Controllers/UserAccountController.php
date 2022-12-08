<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function personalAccount(User $user)
    {
        return view('user.main.personal' . $user->id);
    }

    public function editProfile(User $user)
    {
        return view('user.main.edit' . $user->id);
    }
}
