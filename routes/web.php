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

Route::group(['namespace' => 'auth'], function(){
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::get('/login', [PageController::class, 'login'])->name('login');
});

Route::group(['namespace' => 'user'], function (){
    Route::get('/account/{user}', [UserAccountController::class, 'personalAccount'])->name('user.account')->middleware('auth');
    Route::get('/edit-profile/{user}', [UserAccountController::class, 'editProfile'])->name('UserEditProfile')->middleware('auth');
});
