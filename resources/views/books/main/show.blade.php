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
        @if($item->is_available && \Illuminate\Support\Facades\Auth::check())
            <?php $currentDate = \Illuminate\Support\Carbon::now()->toArray(); ?>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Оформить бронирование?</h5>
                            <a class="modal-close-link" data-bs-dismiss="modal" aria-label="Закрыть">
                                <i class="fa-solid fa-xmark fa-lg"></i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <p>Забрать книгу можно будет у библиотекаря. Выберите время окончания бронирования (максимальное время - 14
                                дней)</p>
                            <p><strong>Старт бронирования - {{$currentDate['day']}}.{{$currentDate['month']}}.{{$currentDate['year']}}</strong></p>
                            <p>Выберите дату окончания бронирования</p>
                            <form method="post" action="{{route('user.reservations.store', $item->id)}}">
                                @csrf
                                <div class="form-group">
                                    <input type="date" class="form-control" name="received_time" id="date-input">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                                    <button type="submit" class="btn btn-primary">Забронировать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (!\Illuminate\Support\Facades\Auth::check())
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Бронирование недоступно</h5>
                                <a class="modal-close-link" data-bs-dismiss="modal" aria-label="Закрыть">
                                    <i class="fa-solid fa-xmark fa-lg"></i>
                                </a>
                            </div>
                            <div class="modal-body">
                                <p>Бронирование недоступно, так как книга в настоящее время забронирована другим пользователем или вы не вошли в аккаунт.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        <section class="showBook">
            <div class="container">
                <div class="book__info__img">
                    <div class="img__link">
                        <div class="book__img__container">
                            <img src="{{asset('storage/' . $item->image)}}" alt="dasdasd">
                        </div>
                        @if($item->is_available)
                        <div class="btn__container">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Забронировать</a>
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
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
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
                                        <img src="{{asset('storage/img/fill_star.png')}}" alt="">
                                    @endfor
                                    @for($i = $feedback['score']; $i < 5; $i++)
                                        <img src="{{asset('storage/img/unfill_star.png')}}" alt="">
                                    @endfor
                                </div>
                                <div class="feedback__user__info">
                                    <div class="feedback__user__ctn__img">
                                        <img src="{{asset('storage/' . $feedback['avatar'])}}" alt="">
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
@section('custom_js')
    <script>
        var dateInput = document.getElementById('date-input');
        var received_time = new Date();
        received_time.setDate(received_time.getDate() + 14);
        received_time = received_time.toISOString().split('T')[0];
        window.onload = function () {
            dateInput.setAttribute('max', received_time);
            console.log(received_time);
        }
    </script>
@endsection
