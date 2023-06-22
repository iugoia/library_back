@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все книги
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Книги</h1>
                    <a href="{{route('librarian.books.create')}}" class="primary_btn">
                        Добавить книгу
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По названию, автору, жанру...">
                    </div>
                </div>
                <!--<input type="text" class="input search" placeholder="Поиск по названию, автору, жанру...">-->
                <table class="main_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th>Книга</th>
                        <th>Автор</th>
                        <th>Жанр</th>
                        <th>Кол-во экземпляров</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="table_image_text">
                            <div class="table_image_ctn">
                                <img src="{{asset('storage/books/1.png')}}" alt="book">
                            </div>
                            <p>
                                Избранница весны
                            </p>
                        </td>
                        <td>
                            Джулия Филлипс
                        </td>
                        <td>
                            Детектив
                        </td>
                        <td>
                            3
                        </td>
                        <td class="text-succes">
                            Доступно
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="{{route('librarian.books.edit')}}" class="text-primary">
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
                        <td class="table_image_text">
                            <div class="table_image_ctn">
                                <img src="{{asset('storage/books/1.png')}}" alt="book">
                            </div>
                            <p>
                                Война и мир
                            </p>
                        </td>
                        <td>
                            Лев Толстой
                        </td>
                        <td>
                            Роман
                        </td>
                        <td>
                            0
                        </td>
                        <td class="text-danger">
                            Недоступно
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
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
                        <td class="table_image_text">
                            <div class="table_image_ctn">
                                <img src="{{asset('storage/books/1.png')}}" alt="book">
                            </div>
                            <p>
                                Избранница весны 2
                            </p>
                        </td>
                        <td>
                            Джулия Филлипс
                        </td>
                        <td>
                            Детектив
                        </td>
                        <td>
                            0
                        </td>
                        <td class="text-danger">
                            Недоступно
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
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
