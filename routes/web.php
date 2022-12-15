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

Route::group(['namespace' => 'books'], function(){
    Route::get('/books/{book}', [BookController::class, 'showPage'])->name('showPageBook');
    Route::get('/catalog', [BookController::class, 'showCatalog'])->name('catalog');
    Route::get('/search', [BookController::class, 'search'])->name('book/search');
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

        Route::group(['prefix' => 'user/reservations'], function(){
            Route::get('/', [\App\Http\Controllers\User\ReservationController::class, 'index'])->name('user.reservations.index');
        });

        Route::group(['prefix' => 'user/feedbacks'], function(){
            Route::get('/', [\App\Http\Controllers\User\FeedbackController::class, 'index'])->name('user.feedbacks.index');
            Route::get('/edit/{feedback}', [\App\Http\Controllers\User\FeedbackController::class, 'edit'])->name('user.feedbacks.edit');
            Route::get('/create/book/{book}', [\App\Http\Controllers\User\FeedbackController::class, 'create'])->name('user.feedbacks.create');
        });

        Route::middleware('librarian')->group(function(){
            Route::group(['prefix' => 'books'], function(){
                Route::get('/', [\App\Http\Controllers\Librarian\BookController::class, 'index'])->name('librarian.books.index');
                Route::get('/create', [\App\Http\Controllers\Librarian\BookController::class, 'create'])->name('librarian.books.create');
                Route::get('/edit/{book}', [\App\Http\Controllers\Librarian\BookController::class, 'edit'])->name('librarian.books.edit');
            });
            Route::group(['prefix' => 'reservations'], function(){
                Route::get('/', [\App\Http\Controllers\Librarian\ReservationController::class, 'index'])->name('librarian.reservations.index');
                Route::get('/edit/{reservation}', [\App\Http\Controllers\Librarian\ReservationController::class, 'edit'])->name('librarian.reservations.edit');
            });
            Route::middleware('admin')->group(function(){
                Route::group(['prefix' => 'users'], function(){
                    Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
                    Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
                    Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
                });
            });
        });
    });
});
