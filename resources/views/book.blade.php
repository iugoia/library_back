@extends('layouts.main')

@section('title')
    НЧПК | Библиотека
@endsection

@section('content')
    <main>
        <h1 class="hidden">Страница книги</h1>
        <!--Раздел с информацией о книге-->
        <section class="book_show element_pad">
            <div class="container">
                <div class="book_show_inner">
                    <h2 class="hidden">О книге</h2>
                    <div class="book_show_image">
                        <img src="{{asset('storage/' . $book->image)}}" alt="{{$book->name}}">
                    </div>
                    <div class="book_show_description">
                        @if(session()->has('error'))
                            <div class="alert alert-error mb-1">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        <div class="book_show_description_row">
                            <p class="book_show_heading">{{$book->name}}</p>
                            <p class="book_show_description_text">
                                {{$book->description}}
                            </p>
                            <div class="book_stars_par">
                                <div class="book_stars_unfill">
                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="">
                                </div>
                                <div class="book_stars_fill" style="width: 122px">
                                    <img src="{{asset('storage/filled_stars.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="book_show_description_row">
                            <p>
                                <b>Количество экземпляров:</b>
                                <span class="book_show_result">{{$book->count}}</span>
                            </p>
                            <p>
                                <b>Жанр</b>
                                <span class="book_show_result">{{\App\Models\Genre::find($book->genre_id)->name}}</span>
                            </p>
                            <p>
                                <b>Автор</b>
                                <span class="book_show_result">{{\App\Models\Author::find($book->author_id)->name}}</span>
                            </p>
                        </div>
                        @if($book->count > 0 && \Illuminate\Support\Facades\Auth::user())
                            <button class="booking_modal_button_open" type="button">Забронировать</button>
                            <p class="booking_title text-succes">Книга доступна для бронирования</p>
                        @else
                            <p class="booking_title text-danger">Книга недоступна для бронирования, так как книг нет в наличии или Вы не зашли в аккаунт</p>
                        @endif

                    </div>
                </div>
            </div>
        </section>

        <!--Раздел с информацией об авторе и отзывами-->
        @if($author->photo)
            <section class="woocommerce-tabs widget-tabs book_info_section element_pad">
                <div class="container">
                    <div class="book_info_section_content">
                        <ul class="widget_tabs">
                            <li class="widget_tabs_link widget_tabs_link_active" id="tab_author">
                                <p>Об авторе</p>
                            </li>
                            <li class="widget_tabs_link" id="tab_reviews">
                                <p>Отзывы</p>
                            </li>
                        </ul>
                        <div class="widget_inner">
                            <div class="widget_inner_author">
                                <h2 class="hidden">Об авторе</h2>
                                <div class="book_info_section_author_img">
                                    <img src="{{asset('storage/authors/author1.png')}}" alt="Автор">
                                </div>
                                <div class="book_info_section_author_info">
                                    <p class="book_info_section_author_heading">Джуллия Филлипс</p>
                                    <p class="book_info_section_author_text">Американская писательница и кинопродюсер, первая женщина, получившая «Оскар» за «Лучший фильм».  Во время учебы в Москве Филлипс,
                                        впечатленная Россией, поняла, что хочет стать писательницей и написать книгу о нашей стране. Получив стипендию Фулбрайта на создание романа,
                                        она год провела на Камчатке, чтобы прочувствовать атмосферу отдаленного изолированного региона и передать особенности местного менталитета.</p>
                                </div>
                            </div>
                            <div class="widget_inner_reviews widget_hide" id="tab_reviews">
{{--                                <div class="widget_inner_reviews_addComment">--}}
{{--                                    <p class="book_info_section_reviews_heading">Оставить отзыв</p>--}}
{{--                                    <form action="" method="post" class="book_info_section_reviews_form">--}}
{{--                                        <div class="comment_form_rating">--}}
{{--                                            <label for="rating" class="comment_form_rating_heading">Ваша оценка</label>--}}
{{--                                            <p class="stars">--}}
{{--                                                <span>--}}
{{--                                                    <a class="star" href="#">1</a>--}}
{{--                                                    <a class="star" href="#">2</a>--}}
{{--                                                    <a class="star" href="#">3</a>--}}
{{--                                                    <a class="star" href="#">4</a>--}}
{{--                                                    <a class="star" href="#">5</a>--}}
{{--                                                </span>--}}
{{--                                            </p>--}}
{{--                                            <div class="rating hidden">--}}
{{--                                                <input class="rating_radio" type="radio" name="rating" value="1">--}}
{{--                                                <input class="rating_radio" type="radio" name="rating" value="2">--}}
{{--                                                <input class="rating_radio" type="radio" name="rating" value="3">--}}
{{--                                                <input class="rating_radio" type="radio" name="rating" value="4">--}}
{{--                                                <input class="rating_radio" type="radio" name="rating" value="5">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="comment_form_rating_input_control">--}}
{{--                                            <textarea id="comment" name="comment" placeholder="Текст отзыва" cols="100" rows="10"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="comment_form_rating_input_control">--}}
{{--                                            <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit" value="Отправить">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                    <span class="blue_bottom_line"></span>--}}
{{--                                </div>--}}
                                <div class="widget_inner_reviews_comments">
                                    <h2 class="comments_title">Отзывы</h2>
                                    <ul class="comment_list hide_reviews">
                                        @foreach($feedbacks as $feedback)
                                            <li class="comment_list_item">
                                                <div class="comment_user_info">
                                                    <div class="comment_user_info_img">
                                                        <img alt="Пользователь" src="#######">
                                                    </div>
                                                    <div class="comment_user_info_desc">
                                                        <p class="comment_user_info_desc_name">########</p>
                                                        <div class="comment_rating_and_date">
                                                            <div class="book_stars_par">
                                                                <div class="book_stars_unfill">
                                                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="">
                                                                </div>
                                                                <div class="book_stars_fill">
                                                                    <img src="{{asset('storage/filled_stars.png')}}" alt="">
                                                                </div>
                                                            </div>
                                                            <p class="comment_user_info_desc_date">########</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment_user_text">
                                                    <p>########</p>
                                                </div>
                                                <button type="button" class="primary_btn btn_comment answer_comment_btn">Ответить</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="show_all_reviews">
                                        <button type="button" class="show_all_reviews_button">Читать все</button>
                                    </div>
                                </div>
                            </div>
                            <div class="widget_inner_answer widget_hide">
{{--                                <div class="widget_inner_reviews_addComment">--}}
{{--                                    <p class="book_info_section_reviews_heading">Оставить сообщение пользователю</p>--}}
{{--                                    <form action="" method="post" class="book_info_section_reviews_form">--}}
{{--                                        <div class="comment_form_rating_input_control">--}}
{{--                                            <textarea id="comment" name="comment" placeholder="Текст сообщения" cols="100" rows="10"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="comment_form_rating_input_control">--}}
{{--                                            <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit" value="Отправить">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="woocommerce-tabs widget-tabs book_info_section element_pad">
                <div class="container">
                    <div class="book_info_section_content">
                        <ul class="widget_tabs">
                            <li class="widget_tabs_link" id="tab_reviews">
                                <p>Отзывы</p>
                            </li>
                        </ul>
                        <div class="widget_inner">
                            <div class="widget_inner_answer">
                                <div class="widget_inner_reviews_comments">
                                    <h2 class="comments_title">Отзывы пользователей</h2>
                                    <ul class="comment_list hide_reviews">
                                        @foreach($feedbacks as $feedback)
                                            <li class="comment_list_item">
                                                <div class="comment_user_info">
                                                    <div class="comment_user_info_img">
                                                        <img alt="Пользователь" src="#######">
                                                    </div>
                                                    <div class="comment_user_info_desc">
                                                        <p class="comment_user_info_desc_name">########</p>
                                                        <div class="comment_rating_and_date">
                                                            <div class="book_stars_par">
                                                                <div class="book_stars_unfill">
                                                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="">
                                                                </div>
                                                                <div class="book_stars_fill">
                                                                    <img src="{{asset('storage/filled_stars.png')}}" alt="">
                                                                </div>
                                                            </div>
                                                            <p class="comment_user_info_desc_date">########</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment_user_text">
                                                    <p>########</p>
                                                </div>
                                                <button type="button" class="primary_btn btn_comment answer_comment_btn">Ответить</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </section>
        @endif


        <!--Раздел с работами автора-->
        <section class="book_author_related_books element_pad">
            <div class="container">
                <h2 class="hidden">Работы автора</h2>
                <div class="book_author_related_books_heading">
                    <span class="bold_dark_blue_heading">Работы</span>
                    <span> автора</span>
                    <span class="book_author_related_books_heading_line"></span>
                </div>
                <ul class="book_author_related_books_list">
                    @foreach($author_books as $author_book)
                        <li class="book_author_related_books_list_item">
                            <a href="{{route('book', $author_book)}}">
                                <div class="book_author_related_books_list_item_img">
                                    <img src="{{asset('storage/' . $author_book->image)}}" alt="Книга">
                                </div>
                            </a>

                            <div class="book_author_related_books_list_item_row">
                                <p class="book_author_related_books_list_item_heading">{{$author_book->name}}</p>
                                <a href="author.html" class="book_author_related_books_list_item_text">{{\App\Models\Author::find($author_book->author_id)->name}}</a>
                                <div class="book_stars_par">
                                    <div class="book_stars_unfill">
                                        <img src="{{asset('storage/unfilled_stars.png')}}" alt="">
                                    </div>
                                    <div class="book_stars_fill" style="width: 122px">
                                        <img src="{{asset('storage/filled_stars.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <!--Модальное окно бронирования-->
        @if($book->count > 0 && \Illuminate\Support\Facades\Auth::user())
            <div class="booking_modal modal_hide">
                <div class="booking_modal_dialog">
                    <div class="booking_modal_content">
                        <div class="booking_modal_header">
                            <a class="booking_modal_close_link">
                                <img src="{{asset('storage/icons/booking_modal_exit.png')}}" alt="Выйти из модального окна">
                            </a>
                            <p class="booking_modal_title">Оформить бронирование?</p>
                        </div>
                        <div class="booking_modal_body">
                            <p>Забрать книгу можно будет у библиотекаря. Выберите время окончания бронирования (максимальное время - 14 дней)</p>
                            <p><b>Старт бронирования -
                                <?php
                                    $now = \Carbon\Carbon::now();
                                ?>
                                </b>{{date('d.m.Y', strtotime($now))}}</p>
                            <p>Выберите дату окончания бронирования</p>
                            <form method="post" action="{{route('user.reservations.store', $book)}}">
                                <div class="booking_modal_form_control">
                                    <input type="date" class="input" name="received_time" id="date-input">
                                </div>
                                <div class="booking_modal_footer">
                                    <button type="button" class="booking_modal_button booking_modal_button_close">Отменить</button>
                                    <button type="submit" class="booking_modal_button booking_modal_button_submit">Забронировать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!--Уведомление о невозможности бронирования-->
        <div class="warning_booking_modal modal_hide">
            <div class="warning_booking_modal_dialog">
                <div class="warning_booking_modal_content">
                    <div class="warning_booking_modal_header">
                        <p class="booking_modal_title">Бронирование недоступно</p>
                        <a class="modal_exit_button">
                            <img src="{{asset('storage/icons/warning_booking_modal_exit.png')}}" alt="Закрыть модальное окно">
                        </a>
                    </div>
                    <div class="warning_booking_modal_body">
                        <p>Бронирование недоступно, так как книга в настоящее время забронирована другим пользователем или вы не вошли в аккаунт.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        var dateInput = document.getElementById('date-input');
        if (dateInput){
            var received_time = new Date();
            received_time.setDate(received_time.getDate() + 14);
            received_time = received_time.toISOString().split('T')[0];
            if (dateInput){
                window.onload = function () {
                    dateInput.setAttribute('max', received_time);
                    console.log(received_time);
                }
            }
        }

    </script>
@endsection
