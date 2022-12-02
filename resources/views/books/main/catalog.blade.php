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
