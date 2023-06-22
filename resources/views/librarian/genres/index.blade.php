@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все жанры
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Жанры</h1>
                    <a href="{{route('librarian.genres.create')}}" class="primary_btn">
                        Добавить жанр
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По названию...">
                    </div>
                </div>
                <!--<input type="text" class="input search" placeholder="Поиск по названию...">-->
                <table class="main_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th class="left_alignment">Название жанра</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="left_alignment">
                            Детектив
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="{{route('librarian.genres.edit')}}" class="text-primary">
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
                        <td>2</td>
                        <td class="left_alignment">
                            Роман
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
                        <td>3</td>
                        <td class="left_alignment">
                            Фантастика
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
                        <td>4</td>
                        <td class="left_alignment">
                            Художественная литература
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
                        <td>5</td>
                        <td class="left_alignment">
                            Психология
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
                        <td>6</td>
                        <td class="left_alignment">
                            Психология
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
