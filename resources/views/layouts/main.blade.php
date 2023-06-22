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
                            <a href="index.html" class="user__nav__link">Контакты</a>
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
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/fadeBlock.js')}}"></script>
</div>
</body>

</html>
