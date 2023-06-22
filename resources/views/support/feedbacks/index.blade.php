@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все отзывы
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Все отзывы</h1>

                <div class="lk_filters">
                    <div class="lk_filter">
                        <p class="lk_filter_label">Рейтинг</p>
                        <div class="__select" data-state="">
                            <div class="__select__title" data-default="great">Высокий</div>
                            <div class="__select__content">
                                <a href="#" class="__select__label" id="great">Высокий</a>
                                <a href="#" class="__select__label" id="good">Хороший</a>
                                <a href="#" class="__select__label" id="average">Средний</a>
                                <a href="#" class="__select__label" id="bad">Низкий</a>
                                <a href="#" class="__select__label" id="awful">Плохой</a>
                                <!--<input id="singleSelect0" class="__select__input" type="radio" name="singleSelect" checked />
                                <label for="singleSelect0" class="__select__label">Высокий</label>
                                <input id="singleSelect1" class="__select__input" type="radio" name="singleSelect" />
                                <label for="singleSelect1" class="__select__label">Хороший</label>
                                <input id="singleSelect2" class="__select__input" type="radio" name="singleSelect"/>
                                <label for="singleSelect2" class="__select__label">Средний</label>
                                <input id="singleSelect3" class="__select__input" type="radio" name="singleSelect"/>
                                <label for="singleSelect3" class="__select__label">Низкий</label>
                                <input id="singleSelect4" class="__select__input" type="radio" name="singleSelect"/>
                                <label for="singleSelect4" class="__select__label">Плохой</label>-->
                            </div>
                        </div>
                        <!--
                        <label for="rate" class="lk_filter_label">Рейтинг</label>
                        <select name="rate" id="rate" class="input">
                            <option value="great" selected>Высокий</option>
                            <option value="good">Хороший</option>
                            <option value="average">Средний</option>
                            <option value="bad">Низкий</option>
                            <option value="awful">Плохой</option>
                        </select>-->
                    </div>
                    <div class="lk_filter">
                        <p class="lk_filter_label">Дата создания</p>
                        <div class="__select" data-state="">
                            <div class="__select__title" data-default="new-created">Сначала новые</div>
                            <div class="__select__content">
                                <a href="#" class="__select__label" id="new-created">Сначала новые</a>
                                <a href="#" class="__select__label" id="old-created">Сначала старые</a>
                                <!--
                                <input id="singleSelect0" class="__select__input" type="radio" name="singleSelect" checked />
                                <label for="singleSelect0" class="__select__label">Сначала новые</label>
                                <input id="singleSelect1" class="__select__input" type="radio" name="singleSelect" />
                                <label for="singleSelect1" class="__select__label">Сначала старые</label>-->
                            </div>
                        </div>
                        <!--
                        <label for="create" class="lk_filter_label">Дата создания</label>
                        <select name="create" id="create" class="input">
                            <option value="old-created" selected>Сначала новые</option>
                            <option value="new-created">Сначала старые</option>
                        </select>-->
                    </div>
                    <div class="lk_filter">
                        <p class="lk_filter_label">Дата обновления</p>
                        <div class="__select" data-state="">
                            <div class="__select__title" data-default="new-created">Сначала новые</div>
                            <div class="__select__content">
                                <a href="#" class="__select__label" id="new-created">Сначала новые</a>
                                <a href="#" class="__select__label" id="old-created">Сначала старые</a>
                                <!--
                                <input id="singleSelect0" class="__select__input" type="radio" name="singleSelect" checked />
                                <label for="singleSelect0" class="__select__label">Сначала новые</label>
                                <input id="singleSelect1" class="__select__input" type="radio" name="singleSelect" />
                                <label for="singleSelect1" class="__select__label">Сначала старые</label>-->
                            </div>
                        </div>
                        <!--
                        <label for="edit" class="lk_filter_label">Дата обновления</label>
                        <select name="edit" id="edit" class="input">
                            <option value="old-edited" selected>Сначала новые</option>
                            <option value="new-edited">Сначала старые</option>
                        </select>-->
                    </div>
                </div>

                <div class="comment_shadow">
                    <div class="comment_border">
                        <div class="comment_button">
                            <a href="#" class="but_eye">
                                <i class="fa fa-eye fa-solid"></i>
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
                        <a href="answer_comment.html" class="primary_btn btn_comment">Ответить</a>
                    </div>
                </div>
                <div class="comment_shadow">
                    <div class="comment_border">
                        <div class="comment_button">
                            <a href="#" class="but_eye">
                                <i class="fa fa-eye fa-solid"></i>
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
                        <a href="answer_comment.html" class="primary_btn btn_comment">Ответить</a>
                    </div>
                </div>
                <!--<a href="#" class="primary_btn btn_comment">
                    Добавить книгу
                    <svg class="svg-inline--fa fa-plus fa-xl" style="color: #ffffff;" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>
                    </svg> <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                </a>-->
            </div>
        </div>
    </section>
@endsection
