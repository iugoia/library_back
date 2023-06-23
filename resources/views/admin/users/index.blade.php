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
                    <tr>
                        <td>1</td>
                        <td class="table_image_text left_alignment">
                            <div class="table_image_ctn">
                                <img class="user_avatar" src="{{asset('storage/authors/author1.png')}}" alt="user">
                            </div>
                            <p class="name_user">
                                darya
                            </p>
                        </td>
                        <td>
                            darya@mail.ru
                        </td>
                        <td>
                            Дарья
                        </td>
                        <td>
                            Терешкова
                        </td>
                        <td>
                            +7 (960) - 000 - 00 - 00
                        </td>
                        <td>
                            Админ
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="{{route('admin.users.edit')}}" class="text-primary">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="table_image_text left_alignment">
                            <div class="table_image_ctn">
                                <img class="user_avatar" src="{{asset('storage/authors/author1.png')}}" alt="user">
                            </div>
                            <p class="name_user">
                                darya
                            </p>
                        </td>
                        <td>
                            darya@mail.ru
                        </td>
                        <td>
                            Дарья
                        </td>
                        <td>
                            Терешкова
                        </td>
                        <td>
                            +7 (960) - 000 - 00 - 00
                        </td>
                        <td>
                            Пользователь
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="text-primary">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="table_image_text left_alignment">
                            <div class="table_image_ctn">
                                <img class="user_avatar" src="{{asset('storage/authors/author1.png')}}" alt="user">
                            </div>
                            <p class="name_user">
                                darya
                            </p>
                        </td>
                        <td>
                            darya@mail.ru
                        </td>
                        <td>
                            Дарья
                        </td>
                        <td>
                            Терешкова
                        </td>
                        <td>
                            +7 (960) - 000 - 00 - 00
                        </td>
                        <td>
                            Библиотекарь
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="text-primary">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
