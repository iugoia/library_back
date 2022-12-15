<?php $title = 'Мои отзывы' ?>
@extends('user.layout.main')

@section('content')
    <style>
        @media (max-width: 736px) {
            .reviews li img{
                width: unset;
            }
        }
    </style>
    <main>
        <section class="admin__users__table user-profile__container">
            <div class="container">
                @if($arrDataList === [])
                    <div class="admin__user__title__ctn">
                        <h1>Сейчас у вас нет отзывов</h1>
                    </div>
                @endif
                @if($arrDataList !== [])
                <div class="admin__user__title__ctn">
                    <h1>Мои отзывы</h1>
                </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <ul class="reviews">
                    @foreach($arrDataList as $item)
                        <li class="feedback__item user__feedback__account">
                            <div class="book__feedback__rate feedback__rate__user">
                                @for($i = 0; $i < $item['feedback']->score; $i++)
                                    <img src="{{asset('public/storage/img/fill_star.png')}}" alt="">
                                @endfor
                                @for($i = $item['feedback']->score; $i < 5; $i++)
                                    <img src="{{asset('public/storage/img/unfill_star.png')}}" alt="">
                                @endfor
                            </div>
                            <div class="feedback__user__info">
                                <div class="feedback__user__ctn__img">
                                    <img src="{{asset('public/storage/' . $item['book']->image)}}" alt="">
                                </div>
                                <p>{{$item['book']->name}}</p>
                            </div>
                            <div class="feedback__content">
                                {{$item['feedback']->message}}
                            </div>
                            <div class="user__feedback__actions">
                                <a href="{{route('user.feedbacks.edit', $item['feedback'])}}" class="text-primary">
                                    <span class="user__feedback__action">Изменить</span>
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{route('user.feedbacks.destroy', $item['feedback'])}}" method="post" class="form__icon form__icon__delete__feedback">
                                    @csrf
                                    @method('delete')
                                    <button class="text-danger">
                                        <span class="user__feedback__action">Удалить</span>
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </main>
@endsection
