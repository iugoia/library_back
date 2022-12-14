<?php $title = $item->name ?>
@extends('layouts.main')

@section('content')

    @if ($arrDataList == [])
        <style>
            body{
                position: relative;
            }
            footer{
                position: relative;
                bottom: 0;
            }
        </style>
    @endif
    <main>
        <section class="showBook">
            <div class="container">
                <div class="book__info__img">
                    <div class="img__link">
                        <div class="book__img__container">
                            <img src="{{asset('public/storage/' . $item->image)}}" alt="dasdasd">
                        </div>
                        @if($item->is_available)
                        <div class="btn__container">
                            <a href="#" class="btn btn-primary">Забронировать</a>
                        </div>
                        @endif
                    </div>
                    <div class="book__info">
                        <h1>{{$item->name}}</h1>
                        <p><span class="font__bold">Автор:</span> <span>{{$item->author}}</span></p>
                        <p><span class="font__bold">Жанр:</span> <span>{{$item->genre}}</span></p>
                        <p><span class="font__bold">Номер стеллажа:</span> <span>{{$item->rack}}</span></p>
                        <p><span class="font__bold">Номер ряда:</span> <span>{{$item->row}}</span></p>
                        <p><span class="font__bold">Номер полки:</span> <span>{{$item->shelf}}</span></p>
                        @if($item->description)
                            <p><span class="font__bold">Описание:</span> <span>{{$item->description}}</span></p>
                        @endif
                        @if(!$item->is_available)
                            <p><span class="font__available">В настоящее время книга недоступна для бронирования</span></p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @if ($arrDataList != [])
            <section class="book__feedbacks">
                <div class="container">
                    <h2>Отзывы</h2>
                    <ul class="feedbacks__list">
                        @foreach($arrDataList as $feedback)
                            <li class="feedback__item">
                                <div class="book__feedback__rate">
                                    @for($i = 0; $i < $feedback['score']; $i++)
                                        <img src="{{asset('public/storage/img/fill_star.png')}}" alt="">
                                    @endfor
                                    @for($i = $feedback['score']; $i < 5; $i++)
                                        <img src="{{asset('public/storage/img/unfill_star.png')}}" alt="">
                                    @endfor
                                </div>
                                <div class="feedback__user__info">
                                    <div class="feedback__user__ctn__img">
                                        <img src="{{asset('public/storage/' . $feedback['avatar'])}}" alt="">
                                    </div>
                                    <p>{{$feedback['username']}} {{$feedback['usersurname']}}</p>
                                </div>
                                <div class="feedback__content">
                                    {{$feedback['message']}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif
    </main>

@endsection
