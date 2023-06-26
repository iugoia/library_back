@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Добавить автора
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Добавить Автора</h1>
                </div>

                <form action="{{route('librarian.authors.store')}}" method="post" enctype="multipart/form-data">
                    <div class="add_author_form">
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_name">Имя и фамилия *</label>
                                <input class="add_form_item_input input" id="book_name" name="name" type="text" placeholder="Введите значение">
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
                                    <input type="file" name="photo" id="input__file" class="input__file input" accept="image/png, image/jpeg, image/jpg, image/webp">
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
                                <textarea class="add_form_item_textarea input" placeholder="Текст описания" name="description" id="book_description" cols="30" rows="10"></textarea>
                                @error('description')
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
                    </div>

                    <div class="comment_form_rating_input_control">
                        <button type="submit" id="submit" class="book_info_section_reviews_submit edit_book">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('custom_js')
    <script>
        let fileInput = document.getElementById('input__file');
        let messageDiv = document.getElementById('message');
        let message= document.querySelector('.add_form_field__file-fake')
        fileInput.addEventListener('change', function() {
            if (fileInput.value) {
                message.textContent = 'Файл выбран!';
                message.style.color="#38C08B"
            } else {
                message.textContent = 'Файл не выбран';
            }
        });
    </script>
@endsection
