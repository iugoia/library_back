<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'surname' => ['required', 'string', 'min:3', 'max:30'],
            'login' => ['required', 'string', 'unique:users,login', 'min:4', 'max:30'],
            'password' => ['required', 'string', 'min:5']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->password !== $request->password_retry)
            return redirect()->back()->with('error', "Пароли не совпадают");

        $user = User::create([
                'password' => Hash::make($request->password)
            ] + $request->all());

        if ($user){
            return redirect(route('login'));
        }
        return redirect()->back()->with('error', 'Ошибка при создании пользователя');
    }
}