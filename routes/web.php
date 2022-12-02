<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    $books = app()->call('App\Http\Controllers\BookController@index');
//    return view('welcome', compact('books'));
//});

Route::group(['namespace' => 'Main'], function (){
    Route::get('/catalog', [BookController::class, 'showCatalog'])->name('catalog');
});
