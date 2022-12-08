<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    $books = app()->call('App\Http\Controllers\BookController@index');
//    return view('welcome', compact('books'));
//});

Route::group(['namespace' => 'Pages'], function (){
    Route::get('/allUsers', [UserController::class, 'index'])->name('users');
    Route::get('/', [PageController::class, 'indexPage'])->name('index');
    Route::get('/login', [PageController::class, 'createLogin'])->name('login');
    Route::get('/register', [PageController::class, 'createRegister'])->name('register');
});

Route::group(['namespace' => 'user'], function (){
    Route::get('/account/{user}', [UserAccountController::class, 'personalAccount'])->name('UserPersonalAccount')->middleware('auth:sanctum');
    Route::get('/edit-profile/{user}', [UserAccountController::class, 'editProfile'])->name('UserEditProfile')->middleware('auth:sanctum');
});
