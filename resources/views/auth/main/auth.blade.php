<?php $title = 'Вход' ?>

@extends('layouts.main')

@section('content')

    <main>
        <div class="vacation-request-form form__login">
            <h1 class="reg-headline">Вход</h1>
            <form method="post" action="#">
                <p class="input">
                    <label for="login" class="visually-hidden">Логин</label>
                    <input id="login" type="text" placeholder="Логин">
                </p>
                <p class="input">
                    <label for="password" class="visually-hidden">Пароль</label>
                    <input id="password" type="password" placeholder="Пароль" class="password">
                </p>
                <p class="input-checkbox">
                    <input id="show-password" type="checkbox" class="custom-checkbox">
                    <label for="show-password">Показать пароль</label>
                </p>
                <button class="btn" type="submit">Зарегистрироваться</button>
                <div class="title">
						<span>
							Нет аккаунта?
						</span>
                </div>
            </form>
            <a href="{{route('register')}}" class="change-shape">Зарегестрироваться</a>
        </div>
    </main>
@endsection
