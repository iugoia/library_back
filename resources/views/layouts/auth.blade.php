<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css?' . time())}}">
    <link rel="stylesheet" href="{{asset('css/fadeBlock.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
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
                    <li class="lk__nav__item">
                        <a href="{{route('register')}}" class="icon_btn">
                            Зарегистрироваться
                            <i class="fa fa-regular fa-user"></i>
                        </a>
                    </li>
                    <li class="lk__nav__item">
                        <a href="{{route('login')}}">Войти</a>
                    </li>
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
                <a href="{{route('support.feedbacks.index')}}">
                    <i class="fa-solid fa-comments fa-xl"></i>
                    <span>Все отзывы</span>
                </a>
                <a href="{{route('admin.users.index')}}">
                    <i class="fa-solid fa-users fa-xl"></i>
                    <span>Все пользователи</span>
                </a>
                <a href="{{route('user.settings.index')}}">
                    <i class="fa-solid fa-gear fa-xl"></i>
                    <span>Настройки</span>
                </a>

                <a href="#">
                    <i class="fa-solid fa-right-from-bracket fa-xl"></i>
                    <span>Выйти</span>

                </a>
            </div>
        </div>

        @yield('content')

    </main>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/fadeBlock.js')}}"></script>
    <script src="{{asset('js/bookReviewStars.js')}}"></script>
</div>
</body>
</html>
