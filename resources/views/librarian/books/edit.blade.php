@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все книги
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Изменить книгу</h1>
                </div>

                <form action="{{route('librarian.books.update', $book)}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    <div class="add_book_form">
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_name">Название книги</label>
                                <input class="add_form_item_input input" id="book_name" name="name" type="text" placeholder="Введите название" value="{{$book->name}}">
                                @error('name')
                                <div class="text-danger mb-3 mt-3">
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
                                    <input type="file" name="image" id="input__file" class="input__file">
                                    @error('image')
                                    <div class="text-danger mb-3 mt-3">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_genre">Жанр</label>
                                <select class="add_form_item_input" name="genre_id" id="book_genre">
                                    <option value="{{$book->genre_id}}" selected>{{\App\Models\Genre::find($book->genre_id)->name}}</option>
                                    @foreach($genres as $genre)
                                        @if($genre->id !== $book->genre_id)
                                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('genre_id')
                                <div class="text-danger mb-3 mt-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_author">Автор</label>
                                <select class="add_form_item_input" name="author_id" id="book_author">
                                    <option value="{{$book->author_id}}" selected>{{\App\Models\Author::find($book->author_id)->name}}</option>
                                    @foreach($authors as $author)
                                        @if($author->id !== $book->author_id)
                                            <option value="{{$author->id}}">{{$author->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('author_id')
                                <div class="text-danger mb-3 mt-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_inst">Количество экземпляров</label>
                                <input class="add_form_item_input input" type="text" name="count" value="{{$book->count}}" min="0" id="book_inst">
                                @error('count')
                                <div class="text-danger mb-3 mt-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_form_item_label" for="book_description">Описание</label>
                                <textarea class="add_form_item_textarea input" placeholder="Введите описание" name="description" id="book_description" cols="30" rows="10">{{$book->description}}</textarea>
                                @error('description')
                                <div class="text-danger mb-3 mt-3">
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
                        @if(session()->has('error'))
                            <div class="alert alert-error mt-3">
                                {{session()->get('error')}}
                            </div>
                        @endif
                    </div>

                    <div class="comment_form_rating_input_control">
                        <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit edit_book" value="Сохранить изменения">
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
