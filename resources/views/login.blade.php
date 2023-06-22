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
        <div class="background-dots background-dots_second"></div>
        <div class="container">
            <div class="authorization_form">
                <form class="authorization_form_content" action="" method="post">
                    <h2 class="authorization_caption">Вход</h2>
                    <input class="input" type="text" placeholder="Логин" name="login" id="login" maxlength="255" required>
                    <input class="input" type="password" placeholder="Пароль" name="pass" id="pass" maxlength="255" required>
                    <input class="primary_btn login_btn" type="submit" value="Войти в аккаунт">
                    <a class="additional_btn" href="#">Нет аккаунта?</a>
                </form>
            </div>
        </div>
    </main>
@endsection
