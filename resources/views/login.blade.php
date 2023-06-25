@extends('layouts.main')

@section('title')
    НЧПК | Библиотека | Авторизация
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
                <form class="authorization_form_content" action="{{route('auth')}}" method="post">
                    <h2 class="authorization_caption">Вход</h2>
                    <input class="input" type="text" placeholder="Логин" name="login" id="login" maxlength="255" required>
                    @error('login')
                    <div class="text-danger mb-2 text-center">
                        {{$message}}
                    </div>
                    @enderror
                    <input class="input" type="password" placeholder="Пароль" name="password" id="pass" maxlength="255" required>
                    @error('password')
                    <div class="text-danger mb-2 text-center">
                        {{$message}}
                    </div>
                    @enderror
                    @if(session()->has('error'))
                        <div class="alert alert-error">
                            {{session()->get('error')}}
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    <input class="primary_btn login_btn" type="submit" value="Войти в аккаунт">
                    <a class="additional_btn" href="{{route('register')}}">Нет аккаунта?</a>
                </form>
            </div>
        </div>
    </main>
@endsection
