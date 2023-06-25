@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Ответить на отзыв
@endsection

<?php
$ratingWidth = $feedback->score * 20 + $feedback->score * 4;
$answer = \App\Models\Answer::all()->where('feedback_id', '=', $feedback->id);
?>

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Оставить сообщение пользователю</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success mb-3">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-error mb-3">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="comment_shadow">
                    <div class="comment_border">
                        <h2 class="comment_heading">Отзыв пользователя</h2>
                        <div class="comment_inner">
                            <div class="comment_image">
                                @if($user->avatar)
                                    <img src="{{asset('storage/' . $user->avatar)}}" alt="book">
                                @else
                                    <img src="{{asset('storage/human.jpg')}}" alt="book">
                                @endif
                            </div>
                            <div class="comment_info">
                                <p class="comment_name">{{$user->name}} {{$user->surname}}</p>
                                <p class="comment_phone">{{$user->phone}}</p>
                                <div class="comment_star">
                                    <div class="book_stars_par" style="margin: 0">
                                        <div class="book_stars_unfill">
                                            <img src="{{asset('storage/unfilled_stars.png')}}" alt="prev_btn">
                                        </div>
                                        <div class="book_stars_fill" style="width: {{$ratingWidth}}px">
                                            <img src="{{asset('storage/filled_stars.png')}}" alt="prev_btn">
                                        </div>
                                    </div>
                                    <p class="comment_date">{{date('d.m.Y', strtotime($feedback->updated_at))}}</p>
                                </div>
                            </div>
                        </div>
                        <p class="comment_text">
                            {{$feedback->message}}
                        </p>
                    </div>
                </div>
                @if($answer->isEmpty())
                    <form action="{{route('support.answers.store', [$feedback, $user])}}" method="post">
                        <h2 class="comment_heading">Ваше сообщение</h2>
                        <textarea name="comment" id="comment_answer"
                                  cols="30" rows="7" class="input comment_textarea" placeholder="Текст сообщения"></textarea>
                        <button type="submit" class="primary_btn btn_comment answer_submit">Отправить</button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection
