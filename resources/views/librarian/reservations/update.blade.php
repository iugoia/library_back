<?php $title = 'Редактирование бронирования' ?>

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
        .profile__form .btn{
            width: 100%;
        }
    </style>

    <main class="user-profile__container">
        <section class="edit__reservation mt-4">
            <div class="container">
                <div>
                    <h1>Редактирование бронирования</h1>
                    <div class="profile">
                        <div class="profile__form">
                            <form method="post" action="{{route('librarian.reservations.update', $reservation)}}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                @endif
                                <div class="form-row_">
                                    <div class="form-group form-col-2">
                                        <label for="inputEmail4">Название</label>
                                        <input type="text" value="{{$book->name}}" disabled class="form-control" id="inputEmail4" placeholder="Введите название">
                                    </div>
                                    <div class="form-group form-col-2">
                                        <label for="inputPassword4">Автор</label>
                                        <input type="text" value="{{$book->author}}" disabled class="form-control" id="inputPassword4" placeholder="Введите автора">
                                    </div>
                                </div>
                                <div class="form-row_">
                                    <div class="form-group form-col-3">
                                        <label for="inputEmail4">Стеллаж</label>
                                        <input type="number" value="{{$book->rack}}" disabled class="form-control" id="inputEmail4" placeholder="Введите стеллаж">
                                    </div>
                                    <div class="form-group form-col-3">
                                        <label for="inputPassword4">Ряд</label>
                                        <input type="number" value="{{$book->row}}" disabled class="form-control" id="inputPassword4" placeholder="Введите ряд">
                                    </div>
                                    <div class="form-group form-col-3">
                                        <label for="inputPassword4">Полка</label>
                                        <input type="number" value="{{$book->shelf}}" disabled class="form-control" id="inputPassword4" placeholder="Введите полку">
                                    </div>
                                </div>
                                <div class="form-group form-col">
                                    <label for="inputState">Статус</label>
                                    <select id="inputState" name="status" class="form-select">
                                        <option value="Забронировано">Забронировано</option>
                                        <option value="Выдано">Выдано</option>
                                        <option value="Возвращено">Возвращено</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger mt-2">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
