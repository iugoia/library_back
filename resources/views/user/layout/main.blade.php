<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('public/storage/icons/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}?{{time()}}">
</head>

<body>
<div class="wrapper">
    <header class="site-header">
        <div class="container">
            <nav class="user-profile__container">
                <img src="{{asset('public/storage/icons/logo.svg')}}" alt="Logo" class="logo">
                <input type="checkbox" id="menu" name="menu" class="m-menu__checkbox">
                <label class="m-menu__toggle" for="menu">
                    <svg width="35" height="35" viewBox="0 0 24 24" stroke="#2B2B2B" stroke-width="2" stroke-linecap="butt"
                         stroke-linejoin="arcs">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </label>
                <label class="m-menu__overlay" for="menu"></label>

                <div class="m-menu">
                    <div class="m-menu__header">
                        <label class="m-menu__toggle" for="menu">
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                                 stroke-linecap="butt" stroke-linejoin="arcs">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </label>
                        <span>Меню</span>
                    </div>
                    <div class="navigation">
                        <ul class="user-navigation">
                            <li><a href="{{route('index')}}">Главная</a></li>
                            <li><a href="{{route('catalog')}}">Каталог</a></li>
                            <li><a href="#" class="personal-account__link">Личный кабинет</a></li>

                        </ul>
                        <ul class="account-navigation">
                            <li><a href="">Личный кабинет</a></li>
                            <li><a href="">Все пользователи</a></li>
                            <li><a href="">Мои бронирования</a></li>
                            <li><a href="">Бронирования</a></li>
                            <li><a href="">Книги</a></li>
                            <li><a href="">Добавить книгу</a></li>
                            <li><a href="">Мои отзывы</a></li>
                            <li><a href="">Выйти</a></li>
                        </ul>
                    </div>

                </div>
            </nav>
        </div>
    </header>

@yield('content')



    <footer>
        <div class="container">
            <div class="site-navigation footer-nav user-profile__container">
                <span class="copyrightus">© 2022 Untarias team</span>
                <div class="footer-social">
                    <ul>
                        <li class="us_in_social">
                            <a href="https://web.telegram.org/k/" target="_blank">
                                <img src="{{asset('public/storage/icons/telegram.svg')}}" alt="">
                            </a>
                        </li>
                        <li class="us_in_social">
                            <a href="https://vk.com/feed" target="_blank">
                                <img src="{{asset('public/storage/icons/vk.svg')}}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('public/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('public/js/script.js')}}?{{time()}}"></script>

@yield('custom_js')
</body>

</html>
