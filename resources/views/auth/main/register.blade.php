<?php $title = 'Регистрация' ?>
@extends('layouts.main')

@section('content')
    <main>

        <div class="vacation-request-form">
            <h1 class="reg-headline">Регистрация</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->messages() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('signup')}}" enctype="multipart/form-data">
                @csrf
                <p class="half-field input">
                    <label for="name" class="visually-hidden">Имя</label>
                    <input id="name" type="text" placeholder="Имя" name="name">
                </p>
                <p class="half-field input">
                    <label for="surname" class="visually-hidden">Фамилия</label>
                    <input id="surname" type="text" placeholder="Фамилия" name="surname">
                </p>
                <p class="half-field input">
                    <label for="login" class="visually-hidden">Логин</label>
                    <input id="login" type="text" placeholder="Логин" name="login">
                </p>
                <p class="half-field input">
                    <label for="email" class="visually-hidden">E-mail</label>
                    <input id="email" type="email" placeholder="E-mail" name="email">
                </p>
                <p class="input">
                    <label for="phone" class="visually-hidden">Телефон</label>
                    <input id="phone" type="tel" placeholder="Телефон" name="phone">
                </p>
                <p class="input">
                    <label for="password" class="visually-hidden">Пароль</label>
                    <input id="password" type="password" placeholder="Пароль" class="password" name="password">
                </p>
                <p class="input-checkbox">
                    <input id="show-password" type="checkbox" class="custom-checkbox">
                    <label for="show-password">Показать пароль</label>
                </p>
                <p class="input file__input">
                    <input id="avatar" class="download-file" type="file" name="avatar" accept="image/png,image/jpeg, image/jpg">
                </p>
                <button class="btn" type="submit">Зарегистрироваться</button>
                <div class="title">
                    <span>
                        Есть аккаунт?
                    </span>
                </div>
            </form>
            <a href="{{route('login')}}" class="change-shape">Войти</a>
        </div>
    </main>
@endsection
@section('custom_js')
    <script>
        $(function(){
            $("#phone").mask("7(999) 999-99-99");
        });
    </script>
@endsection
