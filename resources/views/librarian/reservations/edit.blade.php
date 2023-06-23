@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Редактирование бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Редактирование Бронирования</h1>
                </div>

                <form action="" method="post">
                    <div class="edit_reservation_form">
                        <img src="{{asset('storage/books/2.png')}}" alt="" class="edit_reservation_img">
                        <div class="edit_reservation_column">
                            <div class="edit_reservation_row">
                                <label class="edit_reservation_label" for="book_name">Название книги</label>
                                <input class="edit_reservation_input input" disabled type="text" placeholder="Избранница весны" id="book_name">
                            </div>
                            <div class="edit_reservation_row">
                                <label class="edit_reservation_label" for="book_author">Автор</label>
                                <input class="edit_reservation_input input" disabled type="text" placeholder="Джуллия Филлипс" id="book_author">
                            </div>
                        </div>
                        <div class="edit_reservation_column">
                            <div class="edit_reservation_row">
                                <label class="edit_reservation_label" for="book_user">Пользователь</label>
                                <input class="edit_reservation_input input" disabled type="text" placeholder="Надежда Шевченко" id="book_user">
                            </div>
                            <div class="edit_reservation_row">
                                <p class="edit_reservation_label">Статус бронирования</p>
                                <div class="__select" data-state="">
                                    <div class="__select__title" data-default="booked">Забронировано</div>
                                    <div class="__select__content">
                                        <a href="#" class="__select__label" id="booked">Забронировано</a>
                                        <a href="#" class="__select__label" id="issued">Выдано</a>
                                        <a href="#" class="__select__label" id="returned">Возвращено</a>
                                    </div>
                                </div>
                                <!--
                                <label class="edit_reservation_label" for="reservation_status">Статус бронирования</label>
                                <select class="select edit_reservation_input" name="reservation_status" id="reservation_status">
                                    <option disabled>Выбрать</option>
                                    <option value="booked">Забронировано</option>
                                    <option value="issued">Выдано</option>
                                    <option value="returned">Возвращено</option>
                                </select>-->
                            </div>
                        </div>
                    </div>

                    <div class="comment_form_rating_input_control">
                        <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit edit_book" value="Сохранить изменения">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
