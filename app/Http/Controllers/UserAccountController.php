<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function personalAccount()
    {
        return view('user.main.personal');
    }

    public function editProfile()
    {
        return view('user.main.edit');
    }
}
