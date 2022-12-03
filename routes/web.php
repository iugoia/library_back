<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    $books = app()->call('App\Http\Controllers\BookController@index');
//    return view('welcome', compact('books'));
//});

Route::group(['namespace' => 'Main'], function (){
    Route::get('/catalog', [BookController::class, 'showCatalog'])->name('catalog');
    Route::get('/auth', [UserController::class, 'createLogin'])->name('auth');
    Route::get('/register', [UserController::class, 'createRegister'])->name('register');
    Route::get('/allUsers', [UserController::class, 'index'])->name('users');
    Route::get('/confirmation', [UserController::class, 'confirmation'])->name('confirmation');
});

Route::get('/', function (){
    return view('welcome');
});
