<?php $title = 'Редактирование жанра' ?>

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
                <h1>Редактирование жанра | {{$genre->name}}</h1>
                <div class="profile">
                    <div class="profile__form">
                        <form method="post" action="{{route('librarian.genres.update', $genre)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif
                            <div class="form-group form-col-2">
                                <label for="inputEmail4">Название</label><span class="text-danger">*</span>
                                <input type="text" name="name" value="{{$genre->name}}" class="form-control" id="inputEmail4" placeholder="Введите название">
                                @error('name')
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
