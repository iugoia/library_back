@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Добавить жанр
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Добавить Жанр</h1>
                </div>

                <form action="{{route('librarian.genres.store')}}" method="post">
                    <div class="add_genre_form">
                        <div class="add_genre_column">
                            <label class="add_genre_label" for="genre_name">Название жанра *</label>
                            <input class="add_genre_input" id="genre_name" type="text" name="name" placeholder="Жанр">
                            @error('name')
                            <div class="text-danger mt-3">
                                {{$message}}
                            </div>
                            @enderror
                            @if(session()->has('success'))
                                <div class="alert alert-success mt-3">
                                    {{session()->get('success')}}
                                </div>
                            @endif
                        </div>
                    </div>



                    <div class="comment_form_rating_input_control">
                        <button name="submit" type="submit" id="submit" class="book_info_section_reviews_submit edit_book">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
