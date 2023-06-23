@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Мои бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Мои бронирования</h1>
                <ul class="reservation_grid">
                    <li class="reservation-grid-item">
                        <div class="reservation_header">
                            <p class="reservation_heading">Бронь</p>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="{{route('user.feedbacks.create')}}" class="text-primary">
                                    <i class="fa fa-comment fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="reservation_body">
                            <img src="{{asset('storage/books/1.png')}}" alt="Книга">
                            <div class="reservation_body_inner">
                                <div>
                                    <p class="reservation_label">Название книги</p>
                                    <span class="reservation_span">Избранница весны</span>
                                </div>
                                <div>
                                    <p class="reservation_label">Статус</p>
                                    <span class="reservation_span text-danger">Забронировано</span>
                                </div>
                                <div>
                                    <p class="reservation_label">Период бронирования</p>
                                    <span class="reservation_span reservation_date_start">23.11.2022</span>
                                    <span> - </span>
                                    <span class="reservation_span reservation_date_end">06.12.2022</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
