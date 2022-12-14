<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('index');
})->name('index');

Route::group(['prefix' => 'books'], function(){
    Route::get('/books/{book}', [BookController::class, 'showPage'])->name('showPageBook');
    Route::get('/catalog', [BookController::class, 'showCatalog'])->name('catalog');
});

Route::group(['namespace' => 'user'], function(){
    Route::get('/register', function (){
        if (Auth::check()){
            return redirect(route('personal-account'));
        }
        return view('auth.main.register');
    })->name('register');

    Route::get('/login', function (){
        if (Auth::check()){
            return redirect(route('personal-account'));
        }
        return view('auth.main.login');
    })->name('login');


    Route::middleware('auth')->group(function(){
        Route::get('/account', function (){
            return view('user.main.personal');
        })->name('personal-account');
        Route::get('/account-edit', function () {
            return view('user.main.edit');
        })->name('profile-edit');
    });
});
