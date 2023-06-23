@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Редактирование пользователя
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Редактировать пользователя</h1>
                </div>

                <form action="" method="post">
                    <div class="add_user_form">
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Имя *</label>
                                <input class="add_author_input input" id="genre_name" type="text" placeholder="Надежда">
                            </div>
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Фамилия *</label>
                                <input class="add_author_input input" id="genre_name" type="text" placeholder="Шевченко">
                            </div>
                        </div>

                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Логин *</label>
                                <input class="add_author_input input" id="genre_name" type="text" placeholder="nadya1">
                            </div>
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">E-mail</label>
                                <input class="add_author_input input" id="genre_name" type="email" placeholder="shev23@gmail.com">
                            </div>
                        </div>

                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Телефон</label>
                                <input class="add_author_input input" id="genre_name" type="tel" placeholder="+7 (xxx) - xxx - xx - 55">
                            </div>
                            <div class="add_form_item">
                                <p class="add_form_item_label">Выбор роли *</p>
                                <div class="__select" data-state="">
                                    <div class="__select__title" data-default="user">Пользователь</div>
                                    <div class="__select__content">
                                        <a href="#" class="__select__label" id="user">Пользователь</a>
                                        <a href="#" class="__select__label" id="support">Тех.поддержка</a>
                                        <a href="#" class="__select__label" id="librarian">Библиотекарь</a>
                                        <a href="#" class="__select__label" id="admin">Администратор</a>
                                    </div>
                                </div>
                                <!--
                                <label class="add_form_item_label" for="role">Выбор роли *</label>
                                <select class="select input" name="role" id="role">
                                    <option disabled>Выбрать</option>
                                    <option value="user">Пользователь</option>
                                    <option value="support">Тех.поддержка</option>
                                    <option value="librarian">Библиотекарь</option>
                                    <option value="admin">Администратор</option>
                                </select>-->
                            </div>
                        </div>

                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Текущий пароль *</label>
                                <input class="add_author_input input" id="genre_name" type="text">
                            </div>
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Новый пароль *</label>
                                <input class="add_author_input input" id="genre_name" type="text">
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
