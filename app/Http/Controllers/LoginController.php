<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $formFields = $request->only(['login', 'password']);

        if (Auth::attempt($formFields)){
            return redirect(route('user.reservations.index'));
        }

        return redirect()->back()->with('error', 'Пользователь не найден');
    }
}
