@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Редактирование автора
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Редактирование Автора | {{$author->name}}</h1>
                </div>

                <form action="{{route('librarian.authors.update', $author)}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    <div class="add_author_form">
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_name">Имя и фамилия *</label>
                                <input class="add_form_item_input input" name="name" id="book_name" type="text" value="{{$author->name}}">
                                @error('name')
                                <div class="text-danger mt-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="input__file">Фотография</label>
                                <div class="input__wrapper">
                                    <label class="add_form_field__file-wrapper" for="input__file">
                                        <div class="add_form_field__file-button">Выберите файл</div>
                                        <div class="add_form_field__file-fake">Файл не выбран</div>
                                    </label>
                                    <input type="file" id="input__file" class="input__file" name="photo">
                                    @error('photo')
                                    <div class="text-danger mt-3">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_description">Описание</label>
                                <textarea class="add_form_item_textarea" placeholder="Текст отзыва" name="description" id="book_description" cols="30" rows="10">{{$author->description}}</textarea>
                                @error('description')
                                <div class="text-danger mt-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success mt-3">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    </div>

                    <div class="comment_form_rating_input_control">
                        <input type="submit" id="submit" class="book_info_section_reviews_submit edit_book" value="Сохранить изменения">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
