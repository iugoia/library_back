<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    $books = app()->call('App\Http\Controllers\BookController@index');
//    return view('welcome', compact('books'));
//});

Route::group(['namespace' => 'Pages'], function (){
    Route::get('/catalog', [BookController::class, 'showCatalog'])->name('catalog');
    Route::get('/auth', [PageController::class, 'createLogin'])->name('auth');
    Route::get('/register', [PageController::class, 'createRegister'])->name('register');
    Route::get('/allUsers', [UserController::class, 'index'])->name('users');
    Route::get('/confirmation', [UserController::class, 'confirmation'])->name('confirmation');
    Route::get('/', [PageController::class, 'indexPage'])->name('index');
});
