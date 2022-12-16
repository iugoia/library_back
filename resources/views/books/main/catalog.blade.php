<?php $title = 'Каталог' ?>
@extends('layouts.main')

@section('content')

    <style>
        .catalog__search{
            display: flex;
        }
        .catalog__search > * {
            padding: 10px;
        }
        .catalog__input__search{
            border-radius: 0 !important;
        }
        .catalog__input__button{
            border: 0;
            background: #0072A3;
            color: #FFF;
        }
        .book__catalog__item a:hover{
            color: #FFF;
        }
        ol, ul{
            padding-left: 0;
        }
    </style>
<main>
            <section class="allBooks">
                <div class="container">
                    <div class="books__title__search">
                        <h1>Каталог книг</h1>
                        <div class="d1">
                            <form class="catalog__search">
                                <input id="search" type="text" class="catalog__input__search" placeholder="Поиск по автору, жанру">
                                <button type="submit" class="catalog__input__button"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    @if($books === [])
                        <div class="books__title__search">
                            <h2>Просим прощения, на данный момент на сайте отсутствуют книги</h2>
                        </div>
                    @endif
                        <div class="books__col _books" id="books__catalog__list">
                            <ul class="books__catalog__list">
                                @foreach ($books as $book)
                                    <li class="book__catalog__item @if (!$book->is_available) book_unavailable @endif">
                                        <div class="container__catalog__book">
                                            <div class="book__catalog__container__image">
                                                <img src="{{asset('public/storage/' . $book->image)}}" alt="">
                                            </div>
                                            <div class="book__catalog__info">
                                                <p>Название: {{$book->name}}</p>
                                                <p>Автор: {{$book->author}}</p>
                                                <p>Жанр: {{$book->genre}}</p>
                                            </div>
                                            @if ($book->is_available)
                                            <div class="btn__container">
                                                <a href="{{route('showPageBook', $book->id)}}" class="btn__default">Забронировать</a>
                                            </div>
                                            @endif
                                            @if (!$book->is_available)
                                                <div class="btn__container text-error-available">
                                                    <span>Забронировано</span>
                                                </div>
                                            @endif
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){
            $("#search").on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: 'book/search',
                    type: "GET",
                    data: {'search': query},
                    success:function (data){
                        $('#books__catalog__list').html(data);
                    }
                })
            })
        })
    </script>
@endsection
