@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Все Бронирования</h1>

                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По книге, статусу, пользователю...">
                    </div>
                    <div class="lk_filter">
                        <p class="lk_filter_label">Статус бронирования</p>
                        <div class="__select" data-state="">
                            <div class="__select__title" data-default="booked">Забронировано</div>
                            <div class="__select__content">
                                <a href="#" class="__select__label" id="booked">Забронировано</a>
                                <a href="#" class="__select__label" id="issued">Выдано</a>
                                <a href="#" class="__select__label" id="returned">Возвращено</a>
                            </div>
                        </div>
                        <!--
                        <label class="lk_filter_label" for="reservation_status">Статус бронирования</label>
                        <select class="select input" name="reservation_status" id="reservation_status">
                            <option disabled>Выбрать</option>
                            <option value="booked">Забронировано</option>
                            <option value="issued">Выдано</option>
                            <option value="returned">Возвращено</option>
                        </select>-->
                    </div>
                    <div class="lk_filter">
                        <label for="start" class="lk_filter_label">Начало бронирования</label>
                        <input type="date" id="start" name="start" class="input">
                    </div>
                    <div class="lk_filter">
                        <label for="end" class="lk_filter_label">Конец бронирования</label>
                        <input type="date" id="end" name="end" class="input">
                    </div>
                </div>

                <table class="main_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th>Книга</th>
                        <th>
                            <a href="#">
                                Статус
                                <i class="fa fa-solid fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="#">
                                Начало бронирования
                                <i class="fa fa-solid fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="#">
                                Конец бронирования
                                <i class="fa fa-solid fa-sort"></i>
                            </a>
                        </th>
                        <th>Пользователь</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="table_image_text">
                            <div class="table_image_ctn">
                                <img src="media/image/books/1.png" alt="book">
                            </div>
                            <p>
                                Избранница весны
                            </p>
                        </td>
                        <td class="text-danger">
                            Забронировано
                        </td>
                        <td>23.11.2022</td>
                        <td>06.12.2022</td>
                        <td>Надежда Шевченко</td>
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
                        <td>1</td>
                        <td class="table_image_text">
                            <div class="table_image_ctn">
                                <img src="media/image/books/1.png" alt="book">
                            </div>
                            <p>
                                Избранница весны
                            </p>
                        </td>
                        <td class="text-succes">
                            Возвращено
                        </td>
                        <td>23.11.2022</td>
                        <td>06.12.2022</td>
                        <td>Надежда Шевченко</td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="{{route('librarian.reservations.edit')}}" class="text-primary">
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
                        <td class="table_image_text">
                            <div class="table_image_ctn">
                                <img src="media/image/books/1.png" alt="book">
                            </div>
                            <p>
                                Избранница весны
                            </p>
                        </td>
                        <td class="text-danger">
                            Забронировано
                        </td>
                        <td>23.11.2022</td>
                        <td>06.12.2022</td>
                        <td>Надежда Шевченко</td>
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
