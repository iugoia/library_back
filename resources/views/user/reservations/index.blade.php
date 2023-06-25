@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Мои бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Мои бронирования</h1>
                @if(session()->has('error'))
                    <div class="alert alert-error mb-5">
                        {{session()->get('error')}}
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success mb-5">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(!$arrDataList)
                    <h2>Здесь пока пусто :(</h2><br>
                    <a href="{{route('catalog')}}" class="primary_btn">Перейти в каталог</a>
                @endif
                <ul class="reservation_grid">
                    @foreach($arrDataList as $reservation)
                        <li class="reservation-grid-item">
                            <div class="reservation_header">
                                <p class="reservation_heading">Бронь</p>
                                <div class="table_actions">
                                    <a href="#" class="eye_icon">
                                        <i class="fa fa-eye fa-solid"></i>
                                    </a>
                                    <a href="{{route('user.feedbacks.create', $reservation['book']->id)}}" class="text-primary">
                                        <i class="fa fa-comment fa-solid"></i>
                                    </a>
                                    <form action="{{route('user.reservations.destroy', $reservation['reservation']->id)}}" method="post" class="form_destroy">
                                        @method('delete')
                                        <button type="submit" class="btn_icon text-danger">
                                            <i class="fa fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="reservation_body">
                                <img src="{{asset('storage/' . $reservation['book']->image)}}" alt="Книга">
                                <div class="reservation_body_inner">
                                    <div>
                                        <p class="reservation_label">Название книги</p>
                                        <span class="reservation_span">{{$reservation['book']->name}}</span>
                                    </div>
                                    <div>
                                        <p class="reservation_label">Статус</p>
                                        <span class="reservation_span text-danger">{{$reservation['reservation']->status}}</span>
                                    </div>
                                    <div>
                                        <p class="reservation_label">Период бронирования</p>
                                        <span class="reservation_span reservation_date_start">{{date('d.m.Y', strtotime($reservation['reservation']->created_at))}}</span>
                                        <span> - </span>
                                        <span class="reservation_span reservation_date_end">{{date('d.m.Y', strtotime($reservation['reservation']->received_time))}}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
@endsection
