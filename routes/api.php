<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/feedback', [\App\Http\Controllers\User\FeedbackController::class, 'update'])->name('user.feedbacks.update');

//Route::group(['namespace' => 'user'], function () {
//    Route::post('register', [UserController::class, 'signup'])->name('signup');
//    Route::post('login', [UserController::class, 'auth'])->name('auth');
//});
//
//Route::middleware('auth')->group(function(){
//    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//    Route::patch('/account-edit', [UserController::class, 'update'])->name('profile-update');
//
//    Route::group(['prefix' => 'user/reservations/'], function(){
//        Route::post('{book_id}', [\App\Http\Controllers\V1\User\ReservationController::class, 'store'])->name('user.reservations.store');
//        Route::delete('{reservation}', [\App\Http\Controllers\V1\User\ReservationController::class, 'destroy'])->name('user.reservations.destroy');
//    });
//
//    Route::group(['prefix' => 'user/feedbacks'], function(){
//        Route::post('/create/book/{book}', [\App\Http\Controllers\V1\User\FeedbackController::class, 'store'])->name('user.feedbacks.store');
//        Route::patch('/update/{feedback}', [\App\Http\Controllers\V1\User\FeedbackController::class, 'update'])->name('user.feedbacks.update');
//        Route::delete('/{feedback}', [\App\Http\Controllers\V1\User\FeedbackController::class, 'destroy'])->name('user.feedbacks.destroy');
//    });
//
//    Route::middleware('librarian')->group(function(){
//        Route::group(['prefix' => 'books'], function(){
//            Route::post('/', [\App\Http\Controllers\V1\Librarian\BookController::class, 'store'])->name('librarian.books.store');
//            Route::patch('/{book}', [\App\Http\Controllers\V1\Librarian\BookController::class, 'update'])->name('librarian.books.update');
//            Route::delete('/{book}', [\App\Http\Controllers\V1\Librarian\BookController::class, 'destroy'])->name('librarian.books.destroy');
//        });
//        Route::group(['prefix' => 'genres'], function() {
//            Route::post('/', [\App\Http\Controllers\V1\Librarian\GenreController::class, 'store'])->name('librarian.genres.store');
//            Route::patch('/{genre}', [\App\Http\Controllers\V1\Librarian\GenreController::class, 'update'])->name('librarian.genres.update');
//            Route::delete('/{genre}', [\App\Http\Controllers\V1\Librarian\GenreController::class, 'destroy'])->name('librarian.genres.destroy');
//        });
//        Route::group(['prefix' => 'reservations'], function(){
//            Route::patch('/{reservation}', [\App\Http\Controllers\V1\Librarian\ReservationController::class, 'update'])->name('librarian.reservations.update');
//            Route::delete('/{id}', [\App\Http\Controllers\V1\Librarian\ReservationController::class, 'destroy'])->name('librarian.reservations.destroy');
//        });
//        Route::middleware('admin')->group(function(){
//            Route::group(['prefix' => 'users'], function(){
//                Route::post('/', [\App\Http\Controllers\V1\Admin\UserController::class, 'store'])->name('admin.users.store');
//                Route::patch('/{user}', [\App\Http\Controllers\V1\Admin\UserController::class, 'update'])->name('admin.users.update');
//                Route::delete('/{user}', [\App\Http\Controllers\V1\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
//            });
//        });
//    });
//});
