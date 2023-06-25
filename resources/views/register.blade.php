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
                <form class="authorization_form_content" action="{{route('registration')}}" method="post">
                    <h2 class="authorization_caption">Регистрация</h2>
                    <div class="input_wrapper">
                        <input id="input1" class="input" type="text" placeholder="Имя" name="name">
                        <span class="message1"></span>
                        @error('name')
                        <div class="text-danger mb-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="input_wrapper">
                        <input id="input2" class="input" type="text" placeholder="Фамилия" name="surname">
                        <span class="message2"></span>
                        @error('surname')
                        <div class="text-danger mb-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <input class="input" type="text" placeholder="Логин" name="login">
                    @error('login')
                    <div class="text-danger mb-2" style="text-align: left">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="input_wrapper" id="password">
                        <input class="input" type="password" placeholder="Пароль" name="password">
                        <span class="message"></span>
                        @error('password')
                        <div class="text-danger mb-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="input_wrapper" id="password_retry">
                        <input class="input" type="password" placeholder="Повтор пароля" name="password_retry">
                        <span class="message text-danger"></span>
                    </div>
                    @if(session()->has('error'))
                        <div class="alert alert-error">
                            {{session()->get('error')}}
                        </div>
                    @endif
                    <input class="primary_btn login_btn" type="submit" value="Зарегистрироваться">
                    <a class="additional_btn" href="{{route('login')}}">Есть аккаунт?</a>
                </form>
            </div>
        </div>
    </main>
@endsection
