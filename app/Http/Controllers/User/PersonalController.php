<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
