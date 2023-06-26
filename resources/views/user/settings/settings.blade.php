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
                        <ul>
                            <div class="border_settings">
                                <li class="li_setting active">
                                    <i class="fa fa-regular fa-user svg20"></i>
                                    <a href="{{route('user.settings.index')}}" class="a_setting a_user">Личные данные</a>
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
                <form action="{{route('user.settings.updateSettings')}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    <div class="right_block">
                        <h1>Профиль | {{$user->login}}</h1>
                        <div class="settings_avatar_btns">
                            <div class="settings_avatar_ctn">
                                @if($user->avatar)
                                    <img src="{{asset('storage/' . $user->avatar)}}" alt="" class="img_settings">
                                @else
                                    <img src="{{asset('storage/human.jpg')}}" alt="" class="img_settings">
                                @endif
                            </div>

                            <div class="btns_flex">
                                <label for="input_file" class="icon_settings">Изменить</label>
                            </div>
                        </div>

                        <input type="file" name="avatar" accept="image/png,image/jpg,image/jpeg,image/webp" id="input_file" style="display: none">
                        @error('avatar')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <h2>Личные данные</h2>

                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">
                                <p class="p_set">Имя</p>
                                <input id="input1" class="input" type="text" value="{{$user->name}}" name="name">
                                <span class="message1"></span>
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="input_wrapper input_set">
                                <p class="p_set">Фамилия</p>
                                <input id="input2" class="input" type="text" value="{{$user->surname}}" name="surname">
                                <span class="message2"></span>
                                @error('surname')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <h2>Почта</h2>


                        <fieldset class="settings_field">
                            <div class="input_wrapper input_set">
                                <input id="input1" class="input" type="text" placeholder="Введите почту"
                                       name="email" value="{{$user->email}}">
                                <span class="message1"></span>
                            </div>
                        </fieldset>
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        @if(session()->has('success'))
                            <div class="alert alert-success mt-3">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    </div>

                    <div class="right_block_set">
                        <button type="submit" class="right_button_set primary_btn">Сохранить</button>
                    </div>
                </form>
                <form action="{{route('user.settings.deleteAvatar')}}" method="post">
                    @method('patch')
                    <button class="btn btn_danger icon_settings btn-position" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </section>

@endsection
