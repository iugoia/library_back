<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\SignupRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function signup(SignupRequest $request)
    {
        $filename = $request->file('avatar')->store('/avatars', 'public');
        $user = User::create([
                'password' => Hash::make($request->password),
                'avatar' => $filename
            ] + $request->validated());
        return redirect()->route('confirmation', compact('user'));
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated()))
        {
            $token = Auth::user()->createToken('api');

            return response()->json([
                'token' => $token->plainTextToken
            ]);
        }
        return response()->json([
            'message' => 'Email или пароль указаны не верно'
        ], 422);
    }

    public function index()
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }

    public function createLogin()
    {
        return view('auth.main.auth');
    }

    public function createRegister()
    {
        return view('auth.main.register');
    }

    public function confirmation()
    {
        return view('auth.main.confirmation');
    }
//    public function index()
//    {
//        return User::all();
//    }
//
//    public function show(User $user)
//    {
//        return [
//            'id' => $user->id,
//            'login' => $user->login,
//            'name' => $user->name,
//            'surname' => $user->surname,
//            'email' => $user->email,
//            'phone' => $user->phone,
//            'password' => $user->password,
//            'role' => $user->role,
//            'feedbacks' => $user->feedbacks
//        ];
//    }
//
//    public function create()
//    {
//        return 'Hello';
//    }
//
//    public function store(Request $request)
//    {
//        $validator = Validator::make($request->all(),[
//            'name' => 'required',
//            'surname' => 'required',
//            'login' => ['required', 'unique:users,login'],
//            'email' => ['required', 'unique:users,email'],
//            'phone' => ['required', 'unique:users,password']
//        ]);
//        if ($validator->fails()){
//            return response()->json([
//                'message' => 'Что-то пошло не так',
//                'errors' => $validator->errors()
//            ]);
//        }
//        $user = user::create($request->all());
//        $user->save();
//    }
//
//    public function update($id)
//    {
//        return 'тут будет обновлен пользователь с id: ' . $id;
//    }
//
//    public function destroy($id)
//    {
//        return 'тут будет удален пользователь под id: ' . $id;
//    }
}
