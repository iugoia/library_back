<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @yield('custom_css')
    <link rel="stylesheet" href="{{asset('css/style.css?' . time())}}">
    <link rel="stylesheet" href="{{asset('css/fadeBlock.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

{{--    favicon    --}}

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('storage/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('storage/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('storage/favicon/favicon-16x16.png')}}">
    <link rel="mask-icon" href="{{asset('storage/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    <title>
        @yield('title')
    </title>
</head>

<body>
<div class="@yield('wrapper') wrapper">
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

    @yield('content')

    <footer>
        <div class="container">
            <div class="footer_row">
                <div class="footer_col">
                    © 2023 Ruckuvas team
                </div>
                <div class="footer_col">
                    <ul class="social_medias_list">
                        <li class="social_item">
                            <a href="#" class="social_link">
                                <img src="{{asset('storage/icons/vk.svg')}}" alt="vk">
                            </a>
                        </li>
                        <li class="social_item">
                            <a href="#" class="social_link">
                                <img src="{{asset('storage/icons/tg.svg')}}" alt="tg">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
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
