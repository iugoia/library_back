@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все пользователи
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Пользователи</h1>
                    <a href="{{route('admin.users.create')}}" class="primary_btn">
                        Добавить пользователя
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По имени, телефону, роли, почте...">
                    </div>
                </div>
                <!--<input type="text" class="input search" placeholder="Поиск по имени, телефону, роли, почте...">-->
                @if(session()->has('success'))
                    <div class="alert alert-success mb-5">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-error mb-5">
                        {{session()->get('error')}}
                    </div>
                @endif
                <table class="main_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th class="left_alignment">Пользователь</th>
                        <th>Почта</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Номер</th>
                        <th>Роль</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td class="table_image_text left_alignment">
                                <div class="table_image_ctn">
                                    @if($user->avatar)
                                        <img class="user_avatar" src="{{asset('storage/' . $user->avatar)}}" alt="user">
                                    @else
                                        <img class="user_avatar" src="{{asset('storage/human.jpg')}}" alt="user">
                                    @endif
                                </div>
                                <p class="name_user">
                                    {{$user->login}}
                                </p>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->surname}}
                            </td>
                            <td>
                                {{$user->phone}}
                            </td>
                            <td>
                                {{$user->role}}
                            </td>
                            <td>
                                <div class="table_actions">
                                    <a href="{{route('admin.users.edit', $user)}}" class="text-primary">
                                        <i class="fa fa-pen fa-solid"></i>
                                    </a>
                                    <form action="{{route('admin.users.destroy', $user)}}" method="post" class="form_destroy">
                                        @method('delete')
                                        <button type="submit" class="btn_icon text-danger">
                                            <i class="fa fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
