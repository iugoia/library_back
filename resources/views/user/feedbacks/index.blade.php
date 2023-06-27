@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Мои отзывы
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Мои отзывы</h1>
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
                @foreach($feedbacks as $feedback)
                    <?php
                        $ratingWidth = $feedback->score * 22 + $feedback->score * 3;
                        $book = \App\Models\Book::find($feedback->book_id);
                        $author = \App\Models\Author::find($book->author_id);
                    ?>
                    <div class="comment_shadow">
                        <div class="comment_border">
                            <div class="comment_button">
                                <a href="{{route('book', $book->id)}}" target="_blank" class="but_eye">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="{{route('user.feedbacks.edit', $feedback)}}" class="but_pen">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="{{route('user.feedbacks.destroy', $feedback)}}" method="post" class="but_destroy">
                                    @method('delete')
                                    <button type="submit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>

                            <div class="comment_book">
                                <a href="{{route('book', $book->id)}}" class="comment_book_img_ctn" target="_blank">
                                    <img src="{{asset('storage/' . $book->image)}}" alt="">
                                </a>
                                <div class="comment_book_content">
                                    <h3 class="comment_book_title">{{$book->name}}</h3>
                                    <a target="_blank" href="{{route('catalog', ['author_id' => $author->id])}}" class="comment_book_author">{{$author->name}}</a>
                                </div>
                            </div>

                            <div class="comment_after_book">
                                <p>Ваш отзыв:</p>
                            </div>

                            <div class="comment_info">
                                <div class="comment_inner">
                                    <div class="comment_image">
                                        @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                                            <img src="{{asset('storage/' . \Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="Аватарка пользователя">
                                        @else
                                            <img src="{{asset('storage/human.jpg')}}" alt="Аватарка пользователя">
                                        @endif
                                    </div>
                                    <div class="comment_info">
                                        <p class="comment_name">{{ \Illuminate\Support\Facades\Auth::user()->name }} {{\Illuminate\Support\Facades\Auth::user()->surname}}</p>
                                        <div class="comment_star">
                                            <div class="book_stars_par" style="margin: 0">
                                                <div class="book_stars_unfill">
                                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="prev_btn">
                                                </div>
                                                <div class="book_stars_fill" style="width: {{$ratingWidth}}px">
                                                    <img src="{{asset('storage/filled_stars.png')}}" alt="prev_btn">
                                                </div>
                                            </div>
                                            <p class="comment_date">
                                                {{date('d.m.Y', strtotime($feedback->updated_at))}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="comment_text">
                                    {{$feedback->message}}
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
