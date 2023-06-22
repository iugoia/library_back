<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{$title}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('storage/icons/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}?{{time()}}">
    @livewireStyles
</head>

<body>
<div class="wrapper">
    <header class="site-header">
        <div class="container">
            <nav>
                <img src="{{asset('storage/logo.svg')}}" alt="">
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
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="2"
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
                            @if (\Illuminate\Support\Facades\Auth::check())
                                <li><a href="{{route('personal-account')}}">В личный кабинет</a></li>
                                <li><a href="{{route('logout')}}">Выйти</a></li>
                            @endif
                            @if (!\Illuminate\Support\Facades\Auth::check())
                                <li><a href="{{route('login')}}">Вход</a></li>
                                <li><a href="{{route('register')}}">Регистрация</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="site-navigation footer-nav">
                <span class="copyrightus">© 2022 Untarias team</span>
                <div class="footer-social">
                    <ul>
                        <li class="us_in_social">
                            <a href="https://web.telegram.org/k/" target="_blank">
                                <img src="{{asset('storage/icons/telegram.svg')}}" alt="">
                            </a>
                        </li>
                        <li class="us_in_social">
                            <a href="https://vk.com/feed" target="_blank">
                                <img src="{{asset('storage/icons/vk.svg')}}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a60cb12451.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('js/script.js')}}?{{time()}}"></script>
@yield('custom_js')
</body>
</html>
