<?php $title = 'Редактирование книги' ?>

@extends('user.layout.main')

@section('content')
    <style>
        .form-row_{
            display: flex;
            justify-content: space-between;
        }
        .form-row_ > .form-col-2{
            flex: 0 0 49%;
            max-width: 49%;
        }
        .form-row_ > .form-col-3{
            flex: 0 0 32%;
            max-width: 32%;
        }
        .form-group label{
            margin: 10px 0;
        }
        .profile__form{
            margin-left: 0;
        }
        .profile__form .btn{
            width: 100%;
        }
    </style>
    <main class="user-profile__container">
        <div class="container">
            <div>
                <h1>Редактирование книги {{$book->name}}</h1>
                <div class="profile">
                    <div class="profile__form">
                        <form method="post" action="{{route('librarian.books.update', $book)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif
                            <div class="form-row_">
                                <div class="form-group form-col-2">
                                    <label for="inputEmail4">Название</label><span class="text-danger">*</span>
                                    <input type="text" name="name" value="{{$book->name}}" class="form-control" id="inputEmail4" placeholder="Введите название">
                                    @error('name')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col-2">
                                    <label for="inputPassword4">Автор</label><span class="text-danger">*</span>
                                    <input type="text" name="author" value="{{$book->author}}" class="form-control" id="inputPassword4" placeholder="Введите автора">
                                    @error('author')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword43" class="form-label">Жанр</label>
                                <input type="text" name="genre" value="{{$book->genre}}" class="form-control" id="inputPassword43" placeholder="Введите жанр">
                                @error('genre')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group avatar__input">
                                <label for="inputavatar">Изображение</label>
                                <input type="file" name="image" class="form-control" id="inputavatar" accept="image/png,image/jpeg, image/jpg">
                                @error('image')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-row_">
                                <div class="form-group form-col-3">
                                    <label for="inputEmail4">Стеллаж</label><span class="text-danger">*</span>
                                    <input type="number" name="rack" value="{{$book->rack}}" class="form-control" id="inputEmail4" placeholder="Введите стеллаж">
                                    @error('rack')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col-3">
                                    <label for="inputPassword4">Ряд</label><span class="text-danger">*</span>
                                    <input type="number" name="row" value="{{$book->row}}" class="form-control" id="inputPassword4" placeholder="Введите ряд">
                                    @error('row')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group form-col-3">
                                    <label for="inputPassword4">Полка</label><span class="text-danger">*</span>
                                    <input type="number" name="shelf" value="{{$book->shelf}}" class="form-control" id="inputPassword4" placeholder="Введите полку">
                                    @error('shelf')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$book->description}}</textarea>
                                @error('description')
                                <div class="text-danger mt-2">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
