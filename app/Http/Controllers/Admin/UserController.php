<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'login' => ['required', 'string', 'unique:users,login', 'min:4', 'max:30'],
            'surname' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['nullable', 'string', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'unique:users,phone', 'min:11'],
            'password' => ['required', 'string', 'min:5'],
            'role' => ['required']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'password' => Hash::make($request->password)
        ] + $request->all());

        return redirect()->back()->with('success', "Пользователь успешно добавлен");
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'min:2', 'max:30'],
            'login' => ['nullable', 'string', Rule::unique('users', 'login')->ignore($user->id), 'min:4', 'max:30'],
            'surname' => ['nullable', 'string', 'min:3', 'max:30'],
            'email' => ['nullable', 'string', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['nullable', 'string', Rule::unique('users', 'phone')->ignore($user->id), 'min:11'],
            'password' => ['nullable', 'string', 'min:5'],
            'role' => ['nullable']
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->password)
            $password = Hash::make($request->password);
        else
            $password = $user->password;

        $user->update([
            'password' => $password
        ] + $request->all());

        return redirect()->back()->with('success', "Пользователь успешно изменен");
    }

    public function destroy(User $user)
    {
        if ($user->role === "admin")
            return redirect()->back()->with('error', "Администратора нельзя удалить");
        $user->delete();
        return redirect()->back()->with('success', "Пользователь успешно удален");
    }
}
