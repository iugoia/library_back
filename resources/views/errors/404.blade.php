@extends('layouts.main')

@section('title')
    НЧПК | Библиотека | 404 Ошибка
@endsection

@section('content')
    <style>
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
    <section class="main_block_lk element_pad">
        <div class="container">


            <h1 class="s404_block">Вернуться на главную </h1>

            <img class="p404_block" src="{{asset('storage/404.svg')}}">
            <a href="{{route('index')}}" class="but_404">Вернуться на главную</a>
        </div>
    </section>
@endsection
