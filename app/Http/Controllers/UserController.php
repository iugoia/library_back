<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // signup auth
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required', 'string', 'unique:users,login', 'min:4', 'max:30'],
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'surname' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'unique:users,phone', 'min:11'],
            'password' => ['required', 'string', 'min:5'],
            'avatar' => ['required', 'file', 'mimes:jpg,jpeg,png']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filename = $request->file('avatar')->store('/avatars', 'public');
        $user = User::create([
                'password' => Hash::make($request->password),
                'avatar' => $filename
            ] + $request->all());
        if ($user){
            Auth::login($user);
            return redirect(route('personal-account'));
        }
        return redirect()->back()->with('error', 'Ошибка при создании пользователя');
    }

    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)){
            return redirect(route('personal-account'));
        }

        return redirect()->back()->with('error', 'Пользователь не найден');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'login' => ['nullable', 'string', Rule::unique('users', 'login')->ignore($user->id), 'min:4', 'max:30'],
            'name' => ['nullable', 'string', 'min:2', 'max:30'],
            'surname' => ['nullable', 'string', 'min:3', 'max:30'],
            'email' => ['nullable', 'string', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['nullable', 'string', Rule::unique('users', 'phone')->ignore($user->id), 'min:11'],
            'password' => ['nullable', 'string', 'min:5'],
            'avatar' => ['nullable', 'file', 'mimes:jpg,jpeg,png']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->avatar){
            $filename = $request->file('avatar')->store('/avatars', 'public');
        } else {
            $filename = $user->avatar;
        }

        if ($request->password){
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
                'password' => $password,
                'avatar' => $filename
            ] + $request->all());

        return redirect()->back()->with('success', 'Профиль успешно обновлен');
    }
}
