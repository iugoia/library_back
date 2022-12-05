<?php $title = 'Каталог' ?>
@extends('layouts.main')

@section('content')
<main>
            <section class="allBooks">
                <div class="container">
                    <div class="books__title__search">
                        <h1>Каталог книг</h1>
                        <input type="text" id="search" placeholder="поиск по автору, жанру">
                    </div>
                    <div class="books__row">
                        <div class="books__col filters">
                            <p>Наличие в бибилотеке</p>
                            <ul class="books__filter__list">
                                <li class="books__filter__item">
                                    <span data-filter="available" class="filter__checkbox">Доступные</span>
                                </li>
                                <li class="books__filter__item">
                                    <span data-filter="disavailable" class="filter__checkbox">Забронированные</span>
                                </li>
                            </ul>
                            <p>Жанры</p>
                            <ul class="books__filter__list">
                                @foreach($genres as $genre)
                                <li class="books__filter__item">
                                    <span data-filter="{{$genre}}" class="filter__checkbox">{{$genre}}</span>
                                </li>
                                @endforeach
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
                                                <a href="#" class="btn__default">Забронировать</a>
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
@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){
            $('.books__filter__item > span').click(function (){
                let orderBy = $(this).data('filter')

                $.ajax({
                    url: {{route('catalog')}},
                    type: "GET",
                    data: data,
                    success: success,
                    dataType: dataType
                })
            })
        })
    </script>
@endsection
