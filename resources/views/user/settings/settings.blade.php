@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Настройки
@endsection

@section('content')

    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_block_settings">

                <div class="left_block_settings">
                    <nav class="nav_setings">
                        <ul class="">
                            <div class="border_settings">
                                <li class="li_setting">
                                    <i class="fa fa-regular fa-user svg20"></i> <a href="{{route('user.settings.index')}}"
                                                                                   class="a_setting a_user">Личные данные</a>
                                </li>
                            </div>
                            <div class="border_security">
                                <li class="li_security">
                                    <i class="fa fa-regular fa-house-user svg20"></i>
                                    <a href="{{route('user.settings.security')}}" class="a_setting ">Безопасность</a>
                                </li>
                            </div>
                        </ul>
                    </nav>

                </div>
                <form action="#" method="post">
                    <div class="right_block">
                        <h1>Профиль</h1>
                        <img src="{{asset('storage/human.png')}}" alt="" class="img_settings">
                        <a href="#" class="icon_settings">Изменить</a>
                        <h2>Личные данные</h2>


                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">
                                <p class="p_set">Имя</p>
                                <input id="input1" class="input" type="text" placeholder="Имя" name="login">
                                <span class="message1"></span>
                            </div>
                            <div class="input_wrapper input_set">
                                <p class="p_set">Фамилия</p>
                                <input id="input2" class="input" type="text" placeholder="Фамилия" name="surname">
                                <span class="message2"></span>
                            </div>
                        </fieldset>
                        <h2>Логин</h2>


                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">

                                <input id="input1" class="input" type="text" placeholder="Текущий логин"
                                       name="login">
                                <span class="message1"></span>
                            </div>
                            <div class="input_wrapper input_set">

                                <input id="input2" class="input" type="text" placeholder="Новый логин"
                                       name="surname">
                                <span class="message2"></span>
                            </div>
                        </fieldset>



                    </div>

                    <div class="right_block_set">
                        <button type="submit" class="right_button_set">Сохранить Изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
