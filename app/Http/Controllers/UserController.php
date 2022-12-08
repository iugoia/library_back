<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\SignupRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function signup(SignupRequest $request)
    {
        if (Auth::check()){
            return redirect(route('UserPersonalAccount'));
        }
        $filename = $request->file('avatar')->store('/avatars', 'public');
        $user = User::create([
                'password' => Hash::make($request->password),
                'avatar' => $filename
            ] + $request->validated());
        if ($user){
            return redirect(route('login'));
        }
        return response()->json([
            'message' => 'При сохранении пользователя произошла ошибка'
        ]);
    }

    public function auth(\Illuminate\Http\Request $request)
    {
        if (Auth::check()){
            return redirect(route('UserPersonalAccount'));
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('api')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return $response;
        }
        return response([
            'message' => 'Пользователь не найден'
        ], 422);
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();
    }

    public function index()
    {
        $users = User::all();
        return $users;
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
