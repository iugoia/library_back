<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}?{{time()}}">
    <title>Каталог</title>
</head>
<body>
    <div class="wrapper">
{{--        <header class="main__header">--}}
{{--            <div class="container">--}}
{{--                <div class="header__col">--}}
{{--                    <div class="header__logo">--}}
{{--                        <img src="{{asset('public/storage/logo.svg')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <nav class="user__navigation__header">--}}
{{--                        <ul class="user__nav__list">--}}
{{--                            <li class="user__nav__item">--}}
{{--                                <a href="#">Главная</a>--}}
{{--                            </li>--}}
{{--                            <li class="user__nav__item">--}}
{{--                                <a href="{{route('catalog')}}">Каталог</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <div class="header__col header__sign">--}}
{{--                    <a href="#" class="header__href__item login">Вход</a>--}}
{{--                    <a href="#" class="header__href__item signup">Регистрация</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </header>--}}
        <main>
            <section class="allBooks">
                <div class="container">
                    <div class="books__title__search">
                        <h1>Каталог книг</h1>
                        <input class="btn" type="text" id="search" placeholder="поиск по автору, жанру">
                    </div>
                    <div class="books__row">
                        <div class="books__col filters">
                            <p>Наличие в бибилотеке</p>
                            <ul class="books__filter__list">
                                <li class="books__filter__item">
                                    <label class="filter__checkbox">
                                        <span>Доступные</span>
                                        <input type="checkbox" class="filter__checkbox__input" name="available">
                                    </label>
                                </li>
                                <li class="books__filter__item">
                                    <label class="filter__checkbox">
                                        <span>Забронированные</span>
                                        <input type="checkbox" class="filter__checkbox__input" name="disavailable">
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="books__col _books">
                            <ul class="books__catalog__list">
                                @foreach ($books as $book)
                                    <li class="book__catalog__item">
                                        <div class="container__catalog__book">
                                            <div class="book__catalog__container__image">
                                                <img src="{{asset('public/storage/' . $book->image)}}" alt="">
                                            </div>
                                            <div class="book__catalog__info">
                                                <p>Название: {{$book->name}}</p>
                                                <p>Автор: {{$book->author}}</p>
                                                <p>Жанр: {{$book->genre}}</p>
                                            </div>
                                            <div class="btn__container">
                                                <a href="#" class="btn btn__default">Забронировать</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
