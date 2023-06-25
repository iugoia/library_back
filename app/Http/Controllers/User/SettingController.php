<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    public function indexSecurity()
    {
        $user = Auth::user();
        return view('user.settings.security', compact('user'));
    }

    public function indexSettings()
    {
        $user = Auth::user();
        return view('user.settings.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'surname' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['nullable', 'string', 'email', Rule::unique('users', 'email')->ignore($user->id), 'min:15', 'max:100'],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png,webp']
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();


        if ($request->avatar)
            $filename = $request->file('avatar')->store('/avatars', 'public');
        else
            $filename = $user->avatar;
        $user->update([
            'avatar' => $filename
        ] + $request->all());

        return redirect()->back()->with('success', "Профиль успешно изменен");
    }

    public function updateSecurity(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'phone' => ['nullable', 'min:19', 'max:19', Rule::unique('users', 'phone')->ignore($user->id)],
            'login' => ['nullable', 'string', Rule::unique('users', 'login')->ignore($user->id), 'min:4', 'max:30'],
            'password' => ['nullable', 'string', 'min:5']
        ]);
        if ($validator->fails())
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        if($request->current_password && $request->password){
            if (!Hash::check($request->current_password, $user->password))
                return redirect()->back()->with('error', 'Пароль не совпадает с текущим');
            $password = Hash::make($request->password);
            $pass = $request->password;
        } else {
            $password = $user->password;
            $pass = $user->password;
        }
        $user->update([
            'password' => $password
        ] + $request->all());

        if (Auth::attempt(['login' => $user->login, 'password' => 'password'])){
            return redirect()->back()->with('success', "Данные успешно изменены");
        }
        return redirect()->back()->with('success', "Данные успешно изменены");
    }

    public function deleteAvatar()
    {
        $user = Auth::user();
        $user->avatar = null;
        $user->save();
        return redirect()->back()->with('success', "Аватарка успешно удалена");
    }
}
