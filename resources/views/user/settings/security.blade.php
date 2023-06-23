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
                        <ul class="">
                            <div class="border_security">
                                <li class="li_setting">
                                    <i class="fa fa-regular fa-user svg20"></i> <a href="{{route('user.settings.index')}}"
                                                                                   class="a_setting">Личные данные</a>
                                </li>
                            </div>
                            <div class="border_settings">
                                <li class="li_security">
                                    <i class="fa fa-regular fa-house-user svg20"></i>
                                    <a href="{{route('user.settings.security')}}" class="a_setting a_security">Безопасность</a>
                                </li>
                            </div>
                        </ul>
                    </nav>

                </div>
                <form action="#" method="post">
                    <div class="right_block">
                        <h1 class="">Безопасность</h1>
                        <p class="p_security">Если безопасность вашего аккаунта находится под угрозой, немедленно
                            измените пароль и/или логин для защиты ваших личных данных</p>

                        <h2>Телефон и Логин</h2>


                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">
                                <p class="p_set">Телефон</p>
                                <input id="input1" class="input" type="text" placeholder="+7 (ххх) - ххх -хх - 55"
                                       name="login">
                                <span class="message1"></span>
                            </div>
                            <div class="input_wrapper input_set">
                                <p class="p_set">Почта</p>
                                <input id="input2" class="input" type="text" placeholder="da*****@gmail.com"
                                       name="surname">
                                <span class="message2"></span>
                            </div>
                        </fieldset>
                        <h2 class="p_security">Пароль</h2>

                        <p>Смените пароль, если безопасность вашего профиля находится под угрозой</p>
                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">

                                <input id="input3" class="input" type="text" placeholder="Текущий пароль"
                                       name="login">
                                <span class="message1"></span>
                            </div>
                            <div class="input_wrapper input_set">

                                <input id="input4" class="input" type="text" placeholder="Новый пароль"
                                       name="surname">
                                <span class="message2"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="right_block_set"></div>
                    <button type="submit" class="right_button_set">Сохранить Изменения</button>
                </form>
            </div>
        </div>
    </section>

@endsection
