<?php $title = 'Вход' ?>

@extends('layouts.main')

@section('content')

    <main>
        <div class="vacation-request-form form__login">
            <h1 class="reg-headline">Вход</h1>
            <form method="post" action="{{route('auth')}}">
                @csrf
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <fieldset class="input">
                    <label for="login" class="visually-hidden">Почта</label>
                    <input id="login" type="email" name="email" placeholder="Почта">
                    @error('email')
                    <div class="text-danger mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </fieldset>
                <fieldset class="input">
                    <label for="password" class="visually-hidden">Пароль</label>
                    <input id="password" type="password" name="password" placeholder="Пароль" class="password">
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
                <button class="btn btn-primary" type="submit">Войти</button>
                <div class="title">
                    <span>
                        Нет аккаунта?
                    </span>
                </div>
            </form>
            <a href="{{route('register')}}" class="change-shape">Зарегистрироваться</a>
        </div>
    </main>
@endsection
