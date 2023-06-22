@extends('layouts.main')

@section('title')
    НЧПК | Библиотека
@endsection
@section('wrapper')
    authorization
@endsection
@section('content')
    <main>
        <div class="background-dots background-dots_first"></div>
        <div class="container">
            <div class="authorization_form">
                <form class="authorization_form_content" action="" method="post">
                    <h2 class="authorization_caption">Регистрация</h2>
                    <fieldset class="authorization_field">
                        <div class="input_wrapper">
                            <input id="input1" class="input" type="text" placeholder="Имя" name="login">
                            <span class="message1"></span>
                        </div>
                        <div class="input_wrapper">
                            <input id="input2" class="input" type="text" placeholder="Фамилия" name="surname">
                            <span class="message2"></span>
                        </div>
                    </fieldset>
                    <input class="input" type="text" placeholder="Логин" name="login">
                    <div class="input_wrapper" id="password">
                        <input class="input" type="password" placeholder="Пароль" name="password">
                        <span class="message"></span>
                    </div>
                    <div class="input_wrapper" id="password_retry">
                        <input class="input" type="password" placeholder="Повтор пароля" name="password_retry">
                        <span class="message text-danger"></span>
                    </div>
                    <input class="primary_btn login_btn" type="submit" value="Зарегистрироваться">
                    <a class="additional_btn" href="#">Есть аккаунт?</a>
                </form>
            </div>
        </div>
    </main>
@endsection
