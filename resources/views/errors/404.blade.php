<?php $title = '404 not found' ?>
@extends('layouts.main')

@section('content')
    <main class="content__center">
        <section class="error-section">
            <div class="container">
                <div class="text-center error__content">
                    <h1>Ошибка 404 | Страница не найдена</h1>
                    <a href="{{route('index')}}" class="btn btn-primary error__link">Вернуться на главную страницу</a>
                </div>
            </div>
        </section>
    </main>
@endsection
