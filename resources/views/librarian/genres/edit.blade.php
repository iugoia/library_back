@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Редактирование жанра
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Редактирование Жанра</h1>
                </div>

                <form action="" method="post">
                    <div class="add_genre_form">
                        <div class="add_genre_column">
                            <label class="add_genre_label" for="genre_name">Название жанра *</label>
                            <input class="add_genre_input" id="genre_name" type="text" placeholder="Нонфикшен">
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
