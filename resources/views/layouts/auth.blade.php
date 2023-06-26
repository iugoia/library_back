<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css?' . time())}}">
    <link rel="stylesheet" href="{{asset('css/fadeBlock.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('storage/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('storage/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('storage/favicon/favicon-16x16.png')}}">
    <link rel="mask-icon" href="{{asset('storage/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @livewireStyles
    <title>
        @yield('title')
    </title>
</head>

<body>

<div class="wrapper">
    <header class="element_pad main_header">
        <div class="container">
            <div class="header__row">
                <div class="logo">
                    <img src="{{asset('storage/logo.png')}}" alt="logo">
                    <p><span class="strong">НЧПК</span> Библиотека</p>
                </div>
                <nav class="user__navigation">
                    <ul class="user__nav__list">
                        <li class="user__nav__item">
                            <a href="{{route('index')}}" class="user__nav__link">Главная</a>
                        </li>
                        <li class="user__nav__item">
                            <a href="{{route('catalog')}}" class="user__nav__link">Каталог</a>
                        </li>
                        <li class="user__nav__item">
                            <a href="{{route('works')}}" class="user__nav__link">Бронирование книг</a>
                        </li>
                    </ul>
                </nav>
                <ul class="lk__nav">
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <li class="lk__nav__item">
                        <a href="{{route('user.reservations.index')}}" class="icon_btn">
                            Личный кабинет
                            <i class="fa fa-regular fa-user"></i>
                        </a>
                    </li>
                    <li class="lk__nav__item">
                        <a href="{{route('logout')}}">Выйти</a>
                    </li>
                    @else
                        <li class="lk__nav__item">
                            <a href="{{route('register')}}" class="icon_btn">
                                Зарегистрироваться
                                <i class="fa fa-regular fa-user"></i>
                            </a>
                        </li>
                        <li class="lk__nav__item">
                            <a href="{{route('login')}}">Войти</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </header>

    <main>
        <div class="left_nav">
            <div class="left_nav_ctn">
                <a href="{{route('user.reservations.index')}}">
                    <i class="fa-solid fa-book-bookmark fa-xl"></i>
                    <span>Мои бронирования</span>
                </a>
                <a href="{{route('user.feedbacks.index')}}">
                    <i class="fa-solid fa-comment fa-xl"></i>
                    <span>Мои отзывы</span>
                </a>
                @if(\Illuminate\Support\Facades\Auth::user()->role === 'librarian' || \Illuminate\Support\Facades\Auth::user()->role === 'admin')
                <a href="{{route('librarian.books.index')}}">
                    <i class="fa fa-book fa-xl"></i>
                    <span>Все книги</span>
                </a>
                <a href="{{route('librarian.authors.index')}}">
                    <i class="fa-solid fa-user-shakespeare fa-xl "></i>
                    <span>Авторы</span>
                </a>
                <a href="{{route('librarian.genres.index')}}">
                    <i class="fa-solid fa-rectangle-list fa-xl"></i>
                    <span>Жанры</span>
                </a>
                <a href="{{route('librarian.reservations.index')}}">
                    <i class="fa-solid fa-octagon-check fa-xl"></i>
                    <span>Все бронирования</span>
                </a>
                @endif
                @if (\Illuminate\Support\Facades\Auth::user()->role === 'support' || \Illuminate\Support\Facades\Auth::user()->role === 'admin')
                <a href="{{route('support.feedbacks.index')}}">
                    <i class="fa-solid fa-comments fa-xl"></i>
                    <span>Все отзывы</span>
                </a>
                @endif
                @if (\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                <a href="{{route('admin.users.index')}}">
                    <i class="fa-solid fa-users fa-xl"></i>
                    <span>Все пользователи</span>
                </a>
                @endif
                <a href="{{route('user.settings.index')}}">
                    <i class="fa-solid fa-gear fa-xl"></i>
                    <span>Настройки</span>
                </a>

                <a href="{{route('logout')}}">
                    <i class="fa-solid fa-right-from-bracket fa-xl"></i>
                    <span>Выйти</span>

                </a>
            </div>
        </div>

        @yield('content')

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/fadeBlock.js')}}"></script>
    <script src="{{asset('js/bookPageWidget.js')}}"></script>
    <script src="{{asset('js/bookReviewStars.js')}}"></script>
    <script src="{{asset('js/catalog.js')}}"></script>
    <script src="{{asset('js/hideReviews.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/selectAnimation.js')}}"></script>
    <script src="{{asset('js/validation.js')}}"></script>
    <script src="{{asset('js/bookingModal.js')}}"></script>
    @yield('custom_js')
</div>
</body>
</html>
