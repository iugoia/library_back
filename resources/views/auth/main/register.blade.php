<?php $title = 'Регистрация' ?>
@extends('layouts.main')

@section('content')
    <main>
        <div class="vacation-request-form">
            <h1 class="reg-headline">Регистрация</h1>
            <form>
                <p class="half-field input">
                    <label for="name" class="visually-hidden">Имя</label>
                    <input id="name" type="text" placeholder="Имя">
                </p>
                <p class="half-field input">
                    <label for="surname" class="visually-hidden">Фамилия</label>
                    <input id="surname" type="text" placeholder="Фамилия">
                </p>
                <p class="half-field input">
                    <label for="login" class="visually-hidden">Логин</label>
                    <input id="login" type="text" placeholder="Логин">
                </p>
                <p class="half-field input">
                    <label for="email" class="visually-hidden">E-mail</label>
                    <input id="email" type="email" placeholder="E-mail">
                </p>
                <p class="input">
                    <label for="tel" class="visually-hidden">Телефон</label>
                    <input id="tel" type="tel" placeholder="Телефон">
                </p>
                <p class="input">
                    <label for="password" class="visually-hidden">Пароль</label>
                    <input id="password" type="password" placeholder="Пароль" class="password">
                </p>
                <p class="input-checkbox">
                    <input id="show-password" type="checkbox" class="custom-checkbox">
                    <label for="show-password">Показать пароль</label>
                </p>
                <p class="input">
                    <label for="password-repeat" class="visually-hidden">Повторите пароль</label>
                    <input id="password-repeat" type="password" placeholder="Повторите пароль">
                </p>
                <p class="input file__input">
                    <input id="download-file" class="download-file" type="file" accept="image/png,image/jpeg, image/jpg">
                </p>
                <button class="btn" type="button">Зарегистрироваться</button>
                <div class="title">
						<span>
							Есть аккаунт?
						</span>
                </div>
            </form>
            <a href="{{route('auth')}}" class="change-shape">Войти</a>

        </div>
    </main>
@endsection
