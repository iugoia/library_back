<?php $title = 'Редактирование пользователя' ?>
@extends('admin.layout.admin')

@section('content')
    <style>
        .profile__form{
            margin-left: 0;
        }
        .form-row{
            display: flex;
            justify-content: space-between;
        }
        .btn-small{
            display: unset;
        }
        .profile__form .btn{
            width: unset;
            padding-left: 30px;
            padding-right: 30px;
        }
        .edit_proile__form input[type="text"], .edit_proile__form input[type="tel"], .edit_proile__form input[type="password"], .edit_proile__form input[type="email"]{
            width: 100%;
        }
        .form-row > div:first-of-type{
            margin-right: 15px;
        }
        .form-group{
            margin: 10px 0;
        }
        .form-group label{
            margin-bottom: 10px;
        }
        .input-group-addon {
            padding: 0.5rem 0.75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.25;
            color: #495057;
            text-align: center;
            background-color: #e9ecef;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 0.25rem;
        }
        .account_image{
            margin-right: 30px;
        }
        .form-row_{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .form-col{
            flex: 0 0 49%;
            max-width: 49%;
        }

        @media (max-width: 1030px) {
            .profile{
                flex-wrap: wrap;
            }
            .profile > div{
                flex: 0 0 100%;
                max-width: 100%;
            }
            .account_image{
                margin: 0 auto;
                width: 200px;
                height: 200px;
                min-width: unset;
            }
        }
        @media (max-width: 460px) {
            .form-col{
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
    <main class="user-profile__container">
        <div class="container">
            <div class="">
                <h1>Редактирование {{$user->login}}</h1>
                <div class="profile">
                    <div class="avatar__ctn">
                        <div class="account_image">
                            <img src="{{asset('storage/'.$user->avatar)}}" alt="avatar" class="avatar">
                        </div>
                    </div>
                    <div class="profile__form">
                        <form method="post" action="{{route('admin.user.update', $user)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif
                            <div class="form-row_">
                                <div class="form-group form-col">
                                    <label for="inputEmail4">Имя</label><span class="text-danger">*</span>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="inputEmail4" placeholder="Введите имя">
                                    @error('name')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputPassword4">Фамилия</label><span class="text-danger">*</span>
                                    <input type="text" name="surname" value="{{$user->surname}}" class="form-control" id="inputPassword4" placeholder="Введите фамилию">
                                    @error('surname')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row_">
                                <div class="form-group form-col">
                                    <label for="inputAddress">Email</label><span class="text-danger">*</span>
                                    <input type="email" value="{{$user->email}}" name="email" class="form-control" id="inputAddress" placeholder="Введите эл. почту">
                                    @error('email')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputAddress2">Логин</label><span class="text-danger">*</span>
                                    <input type="text" name="login" value="{{$user->login}}" class="form-control" id="inputAddress2" placeholder="Введите логин">
                                    @error('login')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row_">
                                <div class="form-group form-col">
                                    <label for="phone">Телефон</label><span class="text-danger">*</span>
                                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="phone">
                                    @error('phone')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputState">Роль</label>
                                    <select id="inputState" name="role" class="form-select">
                                        <option value="user">Пользователь</option>
                                        <option value="librarian">Библиотекарь</option>
                                        <option value="admin">Админ</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Пароль</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="password" type="password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group avatar__input">
                                <label for="inputavatar">Аватар</label>
                                <input type="file" name="avatar" class="form-control" id="inputavatar" accept="image/png,image/jpeg, image/jpg">
                                @error('avatar')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('custom_js')
    <script>
        $(function(){
            $("#phone").mask("+ 7 (999) 999-99-99");
        });
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
@endsection
