<?php $title = 'Регистрация' ?>
@extends('layouts.main')

@section('content')
    <main>

        <div class="vacation-request-form">
            <h1 class="reg-headline">Регистрация</h1>
            <form method="post" action="{{route('signup')}}" enctype="multipart/form-data">
                @csrf
                @if(session()->has('error'))
                    <div class="alert alert-success">
                        {{session()->get('error')}}
                    </div>
                @endif
                <fieldset class="half-field input">
                    <label for="name" class="visually-hidden">Имя</label>
                    <input id="name" type="text" placeholder="Имя" name="name">
                    @error('name')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <fieldset class="half-field input">
                    <label for="surname" class="visually-hidden">Фамилия</label>
                    <input id="surname" type="text" placeholder="Фамилия" name="surname">
                    @error('surname')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <fieldset class="half-field input">
                    <label for="login" class="visually-hidden">Логин</label>
                    <input id="login" type="text" placeholder="Логин" name="login">
                    @error('login')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <fieldset class="half-field input">
                    <label for="email" class="visually-hidden">E-mail</label>
                    <input id="email" type="email" placeholder="E-mail" name="email">
                    @error('email')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <fieldset class="input">
                    <label for="phone" class="visually-hidden">Телефон</label>
                    <input id="phone" type="tel" placeholder="Телефон" name="phone">
                    @error('phone')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <fieldset class="input">
                    <label for="password" class="visually-hidden">Пароль</label>
                    <input id="password" type="password" placeholder="Пароль" class="password" name="password">
                    @error('password')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <p class="input-checkbox">
                    <input id="show-password" type="checkbox" class="custom-checkbox">
                    <label for="show-password">Показать пароль</label>
                </p>
                <fieldset class="input file__input">
                    <input id="avatar" class="download-file" type="file" name="avatar" accept="image/png,image/jpeg, image/jpg">
                    @error('avatar')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </fieldset>
                <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
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
            $("#phone").mask("+ 7 (999) 999-99-99");
        });
    </script>
@endsection
