<?php

use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index');
})->name('index');

Route::get('/works', function() {
    return view('works');
})->name('works');

Route::group(['namespace' => 'books'], function() {
    Route::get('/catalog', [\App\Http\Controllers\BookController::class, 'index'])->name('catalog');
    Route::get('/show/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('book');
});


Route::group(['namespace' => 'auth'], function() {
    Route::get('/login', function() {
        return view('login');
    })->name('login');

    Route::get('/register', function() {
        return view('register');
    })->name('register');
});

Route::middleware('auth')->group(function() {

    Route::group(['namespace' => 'user'], function() {
        Route::group(['namespace' => 'reservation', 'prefix' => 'reservations'], function() {
            Route::get('/', [\App\Http\Controllers\User\ReservationController::class, 'index'])->name('user.reservations.index');
        });
        Route::group(['namespace' => 'feedback', 'prefix' => 'feedback'], function() {
            Route::get('/', [\App\Http\Controllers\User\FeedbackController::class, 'index'])->name('user.feedbacks.index');
            Route::get('/{id_book}', [\App\Http\Controllers\User\FeedbackController::class, 'create'])->name('user.feedbacks.create');
            Route::get('/edit/{feedback}', [\App\Http\Controllers\User\FeedbackController::class, 'edit'])->name('user.feedbacks.edit');
        });

        Route::group(['namespace' => 'settings', 'prefix' => 'settings'], function() {
            Route::get('/', [\App\Http\Controllers\User\SettingController::class, 'indexSettings'])->name('user.settings.index');
            Route::get('/security', [\App\Http\Controllers\User\SettingController::class, 'indexSecurity'])->name('user.settings.security');
        });

        Route::middleware('support')->group(function() {
            Route::group(['namespace' => 'support', 'prefix' => 'support'], function() {
                Route::group(['namespace' => 'feedbacks', 'prefix' => 'supfeedback'], function() {
                    Route::get('/', [\App\Http\Controllers\Support\FeedbackController::class, 'index'])->name('support.feedbacks.index');
                });

                Route::group(['namespace' => 'answers', 'prefix' => 'answer'], function() {
                    Route::get('/create', [\App\Http\Controllers\Support\AnswerController::class, 'create'])->name('support.answers.create');
                });
            });
        });

        Route::middleware('librarian')->group(function() {
            Route::group(['namespace' => 'librarian'], function () {
                Route::group(['namespace' => 'books', 'prefix' => 'book'], function() {
                    Route::get('/', [\App\Http\Controllers\Librarian\BookController::class, 'index'])->name('librarian.books.index');
                    Route::get('/create', [\App\Http\Controllers\Librarian\BookController::class, 'create'])->name('librarian.books.create');
                    Route::get('/{book}', [\App\Http\Controllers\Librarian\BookController::class, 'edit'])->name('librarian.books.edit');
                });

                Route::group(['namespace' => 'authors', 'prefix' => 'author'], function() {
                    Route::get('/', [\App\Http\Controllers\Librarian\AuthorController::class, 'index'])->name('librarian.authors.index');
                    Route::get('/create', [\App\Http\Controllers\Librarian\AuthorController::class, 'create'])->name('librarian.authors.create');
                    Route::get('/{author}', [\App\Http\Controllers\Librarian\AuthorController::class, 'edit'])->name('librarian.authors.edit');
                });

                Route::group(['namespace' => 'genres', 'prefix' => 'genre'], function() {
                    Route::get('/', [\App\Http\Controllers\Librarian\GenreController::class, 'index'])->name('librarian.genres.index');
                    Route::get('/create', [\App\Http\Controllers\Librarian\GenreController::class, 'create'])->name('librarian.genres.create');
                    Route::get('/{genre}', [\App\Http\Controllers\Librarian\GenreController::class, 'edit'])->name('librarian.genres.edit');
                });

                Route::group(['namespace' => 'reservations', 'prefix' => 'libreservations'], function () {
                    Route::get('/', [\App\Http\Controllers\Librarian\ReservationController::class, 'index'])->name('librarian.reservations.index');
                    Route::get('/reservation/{reservation}/book/{book}/user/{user}', [\App\Http\Controllers\Librarian\ReservationController::class, 'edit'])->name('librarian.reservations.edit');
                });

                Route::middleware('admin')->group(function() {
                    Route::group(['namespace' => 'admin'], function() {
                        Route::group(['namespace' => 'users', 'prefix' => 'user'], function() {
                            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
                            Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
                            Route::get('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
                        });
                    });
                });

            });
        });
    });
});



//Route::get('/', function (){
//    return view('index');
//})->name('index');
//
//Route::group(['namespace' => 'books'], function(){
//    Route::get('/books/{book}', [BookController::class, 'showPage'])->name('showPageBook');
//    Route::get('/catalog', [BookController::class, 'index'])->name('catalog');
//});
//
//Route::group(['namespace' => 'user'], function(){
//    Route::get('/register', function (){
//        if (Auth::check()){
//            return redirect(route('personal-account'));
//        }
//        return view('auth.main.register');
//    })->name('register');
//
//    Route::get('/login', function (){
//        if (Auth::check()){
//            return redirect(route('personal-account'));
//        }
//        return view('auth.main.login');
//    })->name('login');
//
//    Route::middleware('auth')->group(function(){
//        Route::get('/account', function (){
//            return view('user.main.personal');
//        })->name('personal-account');
//        Route::get('/account-edit', function () {
//            return view('user.main.edit');
//        })->name('profile-edit');
//
//        Route::group(['prefix' => 'user/reservations'], function(){
//            Route::get('/', [\App\Http\Controllers\User\ReservationController::class, 'index'])->name('user.reservations.index');
//        });
//
//        Route::group(['prefix' => 'user/feedbacks'], function(){
//            Route::get('/', [\App\Http\Controllers\User\FeedbackController::class, 'index'])->name('user.feedbacks.index');
//            Route::get('/edit/{feedback}', [\App\Http\Controllers\User\FeedbackController::class, 'edit'])->name('user.feedbacks.edit');
//            Route::get('/create/book/{book}', [\App\Http\Controllers\User\FeedbackController::class, 'create'])->name('user.feedbacks.create');
//        });
//
//        Route::middleware('librarian')->group(function(){
//            Route::group(['prefix' => 'librarian.books'], function(){
//                Route::get('/', [\App\Http\Controllers\Librarian\BookController::class, 'index'])->name('librarian.books.index');
//                Route::get('/create', [\App\Http\Controllers\Librarian\BookController::class, 'create'])->name('librarian.books.create');
//                Route::get('/edit/{book}', [\App\Http\Controllers\Librarian\BookController::class, 'edit'])->name('librarian.books.edit');
//            });
//            Route::group(['prefix' => 'librarian.genres'], function() {
//                Route::get('/', [\App\Http\Controllers\Librarian\GenreController::class, 'index'])->name('librarian.genres.index');
//                Route::get('/create', [\App\Http\Controllers\Librarian\GenreController::class, 'create'])->name('librarian.genres.create');
//                Route::get('/{genre}', [\App\Http\Controllers\Librarian\GenreController::class, 'edit'])->name('librarian.genres.edit');
//            });
//            Route::group(['prefix' => 'reservations'], function(){
//                Route::get('/', [\App\Http\Controllers\Librarian\ReservationController::class, 'index'])->name('librarian.reservations.index');
//                Route::get('/edit/{reservation}', [\App\Http\Controllers\Librarian\ReservationController::class, 'edit'])->name('librarian.reservations.edit');
//            });
//            Route::middleware('admin')->group(function(){
//                Route::group(['prefix' => 'users'], function(){
//                    Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
//                    Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
//                    Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
//                });
//            });
//        });
//    });
//});
