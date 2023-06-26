@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Безопасность
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_block_settings">

                <div class="left_block_settings">
                    <nav class="nav_setings">
                        <ul>
                            <div class="border_security">
                                <li class="li_setting">
                                    <i class="fa fa-regular fa-user svg20"></i>
                                    <a href="{{route('user.settings.index')}}" class="a_setting">Личные данные</a>
                                </li>
                            </div>
                            <div class="border_settings">
                                <li class="li_security active">
                                    <i class="fa fa-regular fa-house-user svg20"></i>
                                    <a href="{{route('user.settings.security')}}" class="a_setting a_security">Безопасность</a>
                                </li>
                            </div>
                        </ul>
                    </nav>

                </div>
                <form action="{{route('user.settings.updateSecurity')}}" method="post">
                    @method('patch')
                    <div class="right_block">
                        <h1>Безопасность</h1>
                        <p class="p_security">Если безопасность вашего аккаунта находится под угрозой, немедленно
                            измените пароль и/или логин для защиты ваших личных данных</p>

                        <h2>Телефон и Логин</h2>


                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">
                                <p class="p_set">Телефон</p>
                                <input id="input1" class="input phone" type="text" placeholder="+7 (ххх) - ххх -хх - 55"
                                       name="phone" value="{{$user->phone}}">
                                <span class="message1"></span>
                                @error('phone')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="input_wrapper input_set">
                                <p class="p_set">Логин</p>
                                <input class="input" type="text" placeholder="Введите логин"
                                       name="login" value="{{$user->login}}">
                                <span class="message2"></span>
                                @error('login')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <h2 class="p_security">Пароль</h2>

                        <p>Смените пароль, если безопасность вашего профиля находится под угрозой</p>
                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">

                                <input id="input3" class="input" type="password" placeholder="Текущий пароль"
                                       name="current_password">
                                <span class="message1"></span>

                            </div>
                            <div class="input_wrapper input_set">

                                <input id="input4" class="input" type="password" placeholder="Новый пароль"
                                       name="password">
                                <span class="message2"></span>
                                @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        @if(session()->has('success'))
                            <div class="alert alert-success mt-3">
                                {{session()->get('success')}}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-error mt-3">
                                {{session()->get('error')}}
                            </div>
                        @endif
                    </div>
                    <div class="right_block_set"></div>
                    <button type="submit" class="right_button_set primary_btn">Сохранить</button>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('custom_js')
    <script>
        $(function(){
            $(".phone").mask("+ 7 (999) 999-99-99");
        });
    </script>
@endsection
