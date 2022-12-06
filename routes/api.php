<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResource('users', UserController::class);

//Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
//    Route::get('/', [UserController::class, 'index']);
//    Route::get('/{id}', [UserController::class, 'show']);
//    Route::post('/', [UserController::class, 'store']);
//    Route::patch('/{id}', [UserController::class, 'update']);
//    Route::delete('/{id}', [UserController::class, 'destroy']);
//});

Route::group(['prefix' => 'users'], function () {
    Route::post('signup', [UserController::class, 'signup'])->name('signup');
    Route::post('auth', [UserController::class, 'auth'])->name('auth');
});


Route::get('uniquebooks', [BookController::class, 'filter']);
Route::resource('books', BookController::class);
Route::resource('feedbacks', FeedbackController::class);

Route::resource('reservations', ReservationController::class);
