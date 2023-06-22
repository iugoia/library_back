<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function show(User $user)
    {
        return $user;
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
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
            return redirect(route('admin.user.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $filename = $request->file('avatar')->store('/avatars', 'public');
        $user = User::create([
                'password' => Hash::make($request->password),
                'avatar' => $filename
            ] + $request->all());

        return redirect()->back()->with('success', 'Пользователь успешно создан');
    }

    public function edit(User $user)
    {
        return view('admin.users.update', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        if ($user->role === 'admin')
            return redirect(route('admin.users.index'))->with('error', 'Вы не можете редактировать администратора');

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
            Storage::disk('public')->delete($user->avatar);
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

        return redirect()->back()->with('success', 'Пользователь успешно обновлен');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin')
            return redirect(route('admin.users.index'))->with('error', 'Вы не можете удалить администратора');
        Storage::disk('public')->delete($user->avatar);
        $user->delete();
        return redirect()->back()->with('success', 'Пользователь успешно удален');
    }
}
