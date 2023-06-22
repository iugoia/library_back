@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Редактирование автора
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Редактирование Автора</h1>
                </div>

                <form action="" method="post">
                    <div class="add_author_form">
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_name">Имя и фамилия *</label>
                                <input class="add_form_item_input" id="book_name" type="text" placeholder="Избранница весны">
                            </div>
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="input__file">Фотография</label>
                                <div class="input__wrapper">
                                    <label class="add_form_field__file-wrapper" for="input__file">
                                        <div class="add_form_field__file-button">Выберите файл</div>
                                        <div class="add_form_field__file-fake">Файл не выбран</div>
                                    </label>
                                    <input type="file"id="input__file" class="input__file">
                                </div>
                            </div>
                        </div>
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_description">Описание</label>
                                <textarea class="add_form_item_textarea" placeholder="Текст отзыва" name="" id="book_description" cols="30" rows="10"></textarea>
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
