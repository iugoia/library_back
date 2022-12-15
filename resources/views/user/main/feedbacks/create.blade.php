<?php $title = 'Создание отзыва' ?>
@extends('user.layout.main')

@section('content')
    <main>
        <section class="admin__users__table user-profile__container">
            <div class="container">
                <h1>Оставьте отзыв о "<span>{{$book->name}}"</span></h1>
                <form action="{{route('user.feedbacks.store', $book)}}" method="post">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session()->get('error')}}
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-5">
                        <label for="exampleFormControlTextarea1" class="form-label">Текст отзыва</label><span class="text-danger">*</span>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('message')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" name="book_id" value="{{$book->id}}">
                    <div class="form-group">
                        <div class="mb-3">
                            <span>Ваша оценка</span><span class="text-danger">*</span>
                        </div>
                        <div class="form-group-radio">
                            <label class="radio__button">
                                <span>1</span>
                                <input type="radio" class="form-check-input" name="score" value="1">
                            </label>
                            <label class="radio__button">
                                <span>2</span>
                                <input type="radio" class="form-check-input" name="score" value="2">
                            </label>
                            <label class="radio__button">
                                <span>3</span>
                                <input type="radio" class="form-check-input" name="score" value="3">
                            </label>
                            <label class="radio__button">
                                <span>4</span>
                                <input type="radio" class="form-check-input" name="score" value="4">
                            </label>
                            <label class="radio__button">
                                <span>5</span>
                                <input type="radio" class="form-check-input" name="score" value="5">
                            </label>
                        </div>
                        @error('score')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-5 btn-left">Отправить</button>
                </form>
            </div>
        </section>
    </main>
@endsection
