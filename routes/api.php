<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\User\PersonalController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

//Route::apiResource('users', UserController::class);

//Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
//    Route::get('/', [UserController::class, 'index']);
//    Route::get('/{id}', [UserController::class, 'show']);
//    Route::post('/', [UserController::class, 'store']);
//    Route::patch('/{id}', [UserController::class, 'update']);
//    Route::delete('/{id}', [UserController::class, 'destroy']);
//});

Route::group(['namespace' => 'user'], function () {
    Route::post('register', [UserController::class, 'signup'])->name('signup');
    Route::post('login', [UserController::class, 'auth'])->name('auth');
});

Route::group(['namespace' => 'users'], function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
    Route::patch('/account-edit', [UserController::class, 'update'])->name('profile-update')->middleware('auth');
});

//Route::middleware()->group(function(){
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['prefix' => 'users'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index')->middleware(['auth', 'admin']);
            Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create')->middleware(['auth', 'admin']);
            Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store')->middleware(['auth', 'admin']);
            Route::get('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'showUpdate'])->name('admin.user.showUpdate')->middleware(['auth', 'admin']);
            Route::patch('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update')->middleware(['auth', 'admin']);
            Route::delete('/delete/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy')->middleware(['auth', 'admin']);
        });
        Route::group(['prefix' => 'books'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\BookController::class, 'index'])->name('admin.book.index')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::get('/create', [\App\Http\Controllers\Admin\BookController::class, 'create'])->name('admin.book.create')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::post('/', [\App\Http\Controllers\Admin\BookController::class, 'store'])->name('admin.book.store')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::get('/{book}', [\App\Http\Controllers\Admin\BookController::class, 'edit'])->name('admin.book.edit')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::patch('/{book}', [\App\Http\Controllers\Admin\BookController::class, 'update'])->name('admin.book.update')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::delete('/delete/{book}', [\App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('admin.book.destroy')->name('admin.user.destroy')->middleware(['auth', 'admin']);
        });
        Route::group(['prefix' => 'reservations'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin.reservation.index')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::get('/create', [\App\Http\Controllers\Admin\ReservationController::class, 'create'])->name('admin.reservation.create')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::post('/', [\App\Http\Controllers\Admin\ReservationController::class, 'store'])->name('admin.reservation.store')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::get('/{id}', [\App\Http\Controllers\Admin\ReservationController::class, 'edit'])->name('admin.reservation.edit')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::patch('/{reservation}', [\App\Http\Controllers\Admin\ReservationController::class, 'update'])->name('admin.reservation.update')->name('admin.user.destroy')->middleware(['auth', 'admin']);
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\ReservationController::class, 'destroy'])->name('admin.reservation.destroy')->name('admin.user.destroy')->middleware(['auth', 'admin']);
        });
//    });

//    Route::resource('books', BookController::class)->middleware('auth:sanctum');
//    Route::resource('feedbacks', FeedbackController::class)->middleware('auth:sanctum');
//    Route::resource('reservations', ReservationController::class)->middleware('auth:sanctum');
});
