@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Создание отзыва
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Создание отзыва</h1>
                </div>

                <form action="#" method="post" class="book_info_section_reviews_form">
                    <div class="comment_form_rating">
                        <label for="rating" class="comment_form_rating_heading">Ваша оценка</label>
                        <p class="stars">
                            <span>
                                <a class="star" href="#">1</a>
                                <a class="star" href="#">2</a>
                                <a class="star" href="#">3</a>
                                <a class="star" href="#">4</a>
                                <a class="star" href="#">5</a>
                            </span>
                        </p>
                        <div class="rating hidden">
                            <input class="rating_radio" type="radio" name="rating" value="1">
                            <input class="rating_radio" type="radio" name="rating" value="2">
                            <input class="rating_radio" type="radio" name="rating" value="3">
                            <input class="rating_radio" type="radio" name="rating" value="4">
                            <input class="rating_radio" type="radio" name="rating" value="5">
                        </div>
                    </div>
                    <div class="comment_form_rating_input_control">
                        <textarea id="comment" name="comment" placeholder="Текст отзыва" cols="100" rows="10"></textarea>
                    </div>
                    <div class="comment_form_rating_input_control">
                        <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit edit_book" value="Сохранить изменения">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
