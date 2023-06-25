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
                @foreach($arrDataList as $item)
                    <?php
                        $ratingWidth = $item['feedback']->score * 20 + $item['feedback']->score * 4;
                        ?>
                    @if($item['answer']->isEmpty())
                        <div class="comment_shadow">
                            <div class="comment_border">
                                <div class="comment_button">
                                    <?php
                                        $book = \App\Models\Book::find($item['feedback']->book_id);
                                        ?>
                                    <a href="{{route('book', $book)}}" class="but_eye" target="_blank">
                                        <i class="fa fa-eye fa-solid"></i>
                                    </a>
                                    <form action="{{route('support.feedbacks.destroy', $item['feedback'])}}" method="post" class="but_destroy">
                                        @method('delete')
                                        <button type="submit" class="btn_icon text-danger">
                                            <i class="fa fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="comment_inner">
                                    <div class="comment_image">
                                        @if($item['user']->avatar)
                                        <img src="{{asset('storage/' . $item['user']->avatar)}}" alt="book">
                                        @else
                                            <img src="{{asset('storage/human.png')}}" alt="book">
                                        @endif
                                    </div>
                                    <div class="comment_info">
                                        <p class="comment_name">{{$item['user']->name}} {{$item['user']->surname}}</p>
                                        <p class="comment_phone">{{$item['user']->phone}}</p>
                                        <div class="comment_star">
                                            <div class="book_stars_par" style="margin: 0">
                                                <div class="book_stars_unfill">
                                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="prev_btn">
                                                </div>
                                                <div class="book_stars_fill" style="width: {{$ratingWidth}}px">
                                                    <img src="{{asset('storage/filled_stars.png')}}" alt="prev_btn">
                                                </div>
                                            </div>
                                            <p class="comment_date">{{date('d.m.Y', strtotime($item['feedback']->updated_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="comment_text">
                                    {{$item['feedback']->message}}
                                </p>
                                <a href="{{route('support.answers.create', [$item['feedback'], $item['user']])}}" class="primary_btn btn_comment">Ответить</a>
                            </div>
                        </div>
                    @else
                        <div class="comment_shadow">
                            <div class="comment_border">
                                <div class="comment_button">
                                    <p class="comment_heading">Отзыв пользователя</p>
                                    <a href="#" class="but_eye">
                                        <i class="fa fa-eye fa-solid"></i>
                                    </a>
                                    <form action="{{route('support.feedbacks.destroy', $item['feedback'])}}" method="post" class="but_destroy">
                                        @method('delete')
                                        <button type="submit" class="btn_icon text-danger">
                                            <i class="fa fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="comment_inner">
                                    <div class="comment_image">
                                        @if($item['user']->avatar)
                                            <img src="{{asset('storage/' . $item['user']->avatar)}}" alt="book">
                                        @else
                                            <img src="{{asset('storage/human.png')}}" alt="book">
                                        @endif
                                    </div>
                                    <div class="comment_info">
                                        <p class="comment_name">{{$item['user']->name}} {{$item['user']->surname}}</p>
                                        <p class="comment_phone">{{$item['user']->phone}}</p>
                                        <div class="comment_star">
                                            <div class="book_stars_par" style="margin: 0">
                                                <div class="book_stars_unfill">
                                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="prev_btn">
                                                </div>
                                                <div class="book_stars_fill" style="width: {{$ratingWidth}}px">
                                                    <img src="{{asset('storage/filled_stars.png')}}" alt="prev_btn">
                                                </div>
                                            </div>
                                            <p class="comment_date">{{date('d.m.Y', strtotime($item['feedback']->updated_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="comment_text">
                                    {{$item['feedback']->message}}
                                </p>
                            </div>
                        </div>
                        <!--ответ-->
                        @foreach($item['answer'] as $answer)
                            <?php
                                $support = \App\Models\User::find($answer->user_id);
                            ?>
                            <div class="comment_shadow comment_answer">
                                <div class="comment_border">
                                    <div class="comment_button">
                                        <p class="comment_heading">Ответ Тех.Поддержки</p>
                                        <a href="{{route('support.answers.edit', [$item['feedback'], $item['user'], $answer])}}" class="text-primary">
                                            <i class="fa fa-pen fa-solid"></i>
                                        </a>
                                        <form action="{{route('support.answers.destroy', $answer)}}" method="post" class="but_destroy" style="margin-left: 10px">
                                            @method('delete')
                                            <button type="submit" class="btn_icon text-danger">
                                                <i class="fa fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="comment_inner">
                                        <div class="comment_image">
                                            @if($item['user']->avatar)
                                                <img src="{{asset('storage/' . $item['user']->avatar)}}" alt="book">
                                            @else
                                                <img src="{{asset('storage/human.png')}}" alt="book">
                                            @endif
                                        </div>
                                        <div class="comment_info">
                                            <p class="comment_name">{{$support->name}} {{$support->surname}}</p>
                                            <p class="comment_date">{{date('d.m.Y', strtotime($answer->updated_at))}}</p>
                                        </div>
                                    </div>
                                    <p class="comment_text">{{$answer->comment}}</p>
                                </div>
                            </div>
                        @endforeach

                    @endif
                @endforeach

            </div>
        </div>
    </section>
@endsection
