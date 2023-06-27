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
                    <div class="password-container">
                        <input class="password-input input" type="password" placeholder="Пароль" name="password" id="pass" maxlength="255" required>
                        <span toggle="#pass" class="field-icon toggle-password">
                            <i class="fa fa-fw fa-eye"></i>
                        </span>
                    </div>
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

@section('custom_js')
    <script>
        // Получаем элементы DOM
        const passwordInput = document.querySelector('#pass');
        const togglePassword = document.querySelector('.toggle-password');

        // Добавляем обработчик клика на иконку глазика
        togglePassword.addEventListener('click', function (e) {
        // Получаем текущее значение атрибута type у инпута с паролем
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        // Устанавливаем новое значение атрибута type
        passwordInput.setAttribute('type', type);
        // Изменяем иконку глазика в зависимости от типа поля с паролем
        this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
