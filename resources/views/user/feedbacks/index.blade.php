@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Мои отзывы
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Мои отзывы</h1>
                <div class="comment_shadow">
                    <div class="comment_border">
                        <div class="comment_button">
                            <a href="#" class="but_eye">
                                <i class="fa fa-eye fa-solid"></i>
                            </a>
                            <a href="{{route('user.feedbacks.edit')}}" class="but_pen">
                                <i class="fa fa-pen fa-solid"></i>
                            </a>
                            <form action="#" method="post" class="but_destroy">
                                <button type="sumbit" class="btn_icon text-danger">
                                    <i class="fa fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                        <div class="comment_inner">
                            <div class="comment_image">
                                <img src="{{asset('storage/human.png')}}" alt="book">
                            </div>
                            <div class="comment_info">
                                <p class="comment_name">Дарья Терешкова</p>
                                <div class="comment_star">
                                    <img src="{{asset('storage/filled_stars.png')}}" alt="star">
                                    <p class="comment_date">21.11.2022</p>
                                </div>
                            </div>
                        </div>
                        <p class="comment_text">Прекрасная книга. Каждая ее строчка просто завораживает. Произведение
                            читается на одном дыхании. Просто капец какая интересная книга, я вот даже еще раз об этом
                            скажу, ну прям потрясающая!! Обожаю читать, а книги в чудесном педагогическом колледже мои
                            любимые
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
