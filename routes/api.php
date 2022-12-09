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

Route::group(['prefix' => 'user'], function () {
    Route::post('register', [UserController::class, 'signup'])->name('signup');
    Route::post('login', [UserController::class, 'auth'])->name('auth');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

//Route::middleware()->group(function(){
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['prefix' => 'books'], function(){
            Route::get('/index', [BookController::class, 'index']);
            Route::post('/store', [BookController::class, 'store']);
            Route::post('/update', [BookController::class, 'update']);
            Route::delete('/destroy', [BookController::class, 'destroy']);
        });
        Route::group(['prefix' => 'users'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
            Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'showUpdate'])->name('admin.user.showUpdate');
            Route::patch('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
            Route::delete('/delete/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');
        });
        Route::group(['prefix' => 'books'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('admin.book.index');
            Route::get('/create', [\App\Http\Controllers\Admin\BookController::class, 'create'])->name('admin.book.create');
            Route::post('/', [\App\Http\Controllers\Admin\BookController::class, 'store'])->name('admin.book.store');
            Route::get('/{book}', [\App\Http\Controllers\Admin\BookController::class, 'edit'])->name('admin.book.edit');
            Route::patch('/{book}', [\App\Http\Controllers\Admin\BookController::class, 'update'])->name('admin.book.update');
            Route::delete('/delete/{book}', [\App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('admin.book.destroy');
        });
        Route::group(['prefix' => 'reservations'], function(){
            Route::get('/index', [ReservationController::class, 'index']);
            Route::delete('/destroy', [ReservationController::class, 'destroy']);
        });
//    });

//    Route::resource('books', BookController::class)->middleware('auth:sanctum');
//    Route::resource('feedbacks', FeedbackController::class)->middleware('auth:sanctum');
//    Route::resource('reservations', ReservationController::class)->middleware('auth:sanctum');
});
