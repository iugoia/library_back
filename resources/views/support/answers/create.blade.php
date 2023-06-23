@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Ответить на отзыв
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Оставить сообщение пользователю</h1>
                <div class="comment_shadow">
                    <div class="comment_border">
                        <h2 class="comment_heading">Отзыв пользователя</h2>
                        <div class="comment_inner">
                            <div class="comment_image">
                                <img src="{{asset('storage/human.png')}}" alt="book">
                            </div>
                            <div class="comment_info">
                                <p class="comment_name">Дарья Терешкова</p>
                                <p class="comment_phone">+7 (960)-085-00-00</p>
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
                <form action="#" method="post">
                    <h2 class="comment_heading">Ваше сообщение</h2>
                    <textarea name="comment_answer" id="comment_answer"
                              cols="30" rows="7" class="input comment_textarea" placeholder="Текст сообщения"></textarea>
                    <button type="submit" class="primary_btn btn_comment answer_submit">Отправить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
