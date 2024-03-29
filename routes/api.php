<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [\App\Http\Controllers\RegisterController::class, '__invoke'])->name('registration');
Route::post('/login', [\App\Http\Controllers\LoginController::class, '__invoke'])->name('auth');

Route::middleware('auth')->group(function() {
    Route::get('/logout', [\App\Http\Controllers\LogoutController::class, '__invoke'])->name('logout');

    Route::group(['prefix' => 'user'], function() {
        Route::group(['prefix' => 'reservations'], function() {
            Route::post('/{book}', [\App\Http\Controllers\User\ReservationController::class, 'store'])->name('user.reservations.store');
            Route::delete('/{id}', [\App\Http\Controllers\User\ReservationController::class, 'destroy'])->name('user.reservations.destroy');
        });

        Route::group(['namespace' => 'settings'], function() {
            Route::patch('/update/settings', [\App\Http\Controllers\User\SettingController::class, 'updateSettings'])->name('user.settings.updateSettings');
            Route::patch('/update/security', [\App\Http\Controllers\User\SettingController::class, 'updateSecurity'])->name('user.settings.updateSecurity');
            Route::patch('/update/settings/delete-avatar', [\App\Http\Controllers\User\SettingController::class, 'deleteAvatar'])->name('user.settings.deleteAvatar');
        });

        Route::group(['prefix' => 'feedbacks'], function() {
            Route::post('/{book}', [\App\Http\Controllers\User\FeedbackController::class, 'store'])->name('user.feedbacks.store');
            Route::patch('/{feedback}', [\App\Http\Controllers\User\FeedbackController::class, 'update'])->name('user.feedbacks.update');
            Route::delete('/{feedback}', [\App\Http\Controllers\User\FeedbackController::class, 'destroy'])->name('user.feedbacks.destroy');
        });
    });

    Route::middleware('support')->group(function() {
        Route::group(['prefix' => 'answers'], function() {
            Route::post('/{feedback}/{user}', [\App\Http\Controllers\Support\AnswerController::class, 'store'])->name('support.answers.store');
            Route::patch('/{answer}', [\App\Http\Controllers\Support\AnswerController::class, 'update'])->name('support.answers.update');
            Route::delete('/{answer}', [\App\Http\Controllers\Support\AnswerController::class, 'destroy'])->name('support.answers.destroy');
        });

        Route::group(['prefix' => 'supfeedbacks'], function() {
            Route::delete('/{feedback}', [\App\Http\Controllers\Support\FeedbackController::class, 'destroy'])->name('support.feedbacks.destroy');
        });
    });

    Route::middleware('librarian')->group(function() {
        Route::group(['prefix' => 'genres'], function() {
            Route::post('/', [\App\Http\Controllers\Librarian\GenreController::class, 'store'])->name('librarian.genres.store');
            Route::patch('/{genre}', [\App\Http\Controllers\Librarian\GenreController::class, 'update'])->name('librarian.genres.update');
            Route::delete('/{genre}', [\App\Http\Controllers\Librarian\GenreController::class, 'destroy'])->name('librarian.genres.destroy');
        });

        Route::group(['prefix' => 'authors'], function() {
            Route::post('/', [\App\Http\Controllers\Librarian\AuthorController::class, 'store'])->name('librarian.authors.store');
            Route::patch('/{author}', [\App\Http\Controllers\Librarian\AuthorController::class, 'update'])->name('librarian.authors.update');
            Route::delete('/{author}', [\App\Http\Controllers\Librarian\AuthorController::class, 'destroy'])->name('librarian.authors.destroy');
        });

        Route::group(['prefix' => 'books'], function() {
            Route::post('/', [\App\Http\Controllers\Librarian\BookController::class, 'store'])->name('librarian.books.store');
            Route::patch('/{book}', [\App\Http\Controllers\Librarian\BookController::class, 'update'])->name('librarian.books.update');
            Route::delete('/{book}', [\App\Http\Controllers\Librarian\BookController::class, 'destroy'])->name('librarian.books.destroy');
        });

        Route::group(['prefix' => 'libreservations'], function() {
            Route::get('/exportToHtml', [\App\Http\Controllers\Librarian\ReservationController::class, 'exportToHtml'])->name('librarian.reservations.exportToHtml');
            Route::get('/export', [\App\Http\Controllers\Librarian\ReservationController::class, 'export'])->name('librarian.reservations.export');
            Route::patch('/{reservation}', [\App\Http\Controllers\Librarian\ReservationController::class, 'update'])->name('librarian.reservations.update');
            Route::delete('/{reservation}', [\App\Http\Controllers\Librarian\ReservationController::class, 'destroy'])->name('librarian.reservations.destroy');
        });

        Route::middleware('admin')->group(function() {
            Route::group(['namespace' => 'user'], function() {
                Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
                Route::patch('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
                Route::delete('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
            });
        });
    });
});

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
