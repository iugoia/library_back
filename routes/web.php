<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    $books = app()->call('App\Http\Controllers\BookController@index');
//    return view('welcome', compact('books'));
//});

Route::group(['namespace' => 'Pages'], function (){
    Route::get('/catalog', [BookController::class, 'showCatalog'])->name('catalog');
    Route::get('/allUsers', [UserController::class, 'index'])->name('users');
    Route::get('/', [PageController::class, 'indexPage'])->name('index');
});
Route::group(['namespace' => 'User'], function (){
    Route::view('/private', 'private')->middleware('auth')->name('private');
    Route::get('/login', function (){
        if (Auth::check()){
            return redirect(route('private'));
        }
        return view('auth.main.auth');
    })->name('login');
    Route::get('/register', function (){
        if (Auth::check()){
            return redirect(route('private'));
        }
        return view('auth.main.register');
    })->name('register');
});
