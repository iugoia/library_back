<?php $title = 'Мои бронирования' ?>
@extends('user.layout.main')

@section('content')
    <style>
        .form__icon button{
            border: none;
        }
    </style>
    <main>
        <section class="admin__users__table user-profile__container">
            <div class="container">
                <div class="admin__user__title__ctn">
                    <h1>Мои бронирования</h1>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="admin__users__table__wrapper">
                    <table class="admin__users__table__table table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>Книга</th>
                            <th>Статус</th>
                            <th>Дата бронирования</th>
                            <th>Дата конца бронирования</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrDataList as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="product-box border">
                                            <img src="{{asset('public/storage/' . $item['book']->image)}}" alt="">
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-name mb-1">{{$item['book']->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$item['reservation']->status}}</td>
                                <td>{{$item['reservation']->created_at}}</td>
                                <td>{{$item['reservation']->received_time}}</td>
                                <td class="admin__users__nav">
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('showPageBook', $item['book'])}}" target="_blank">
                                            <i class="fa-solid fa-eye text-secondary"></i>
                                        </a>
                                        <a href="{{route('user.feedbacks.create', $item['book'])}}" class="text-primary">
                                            <i class="fa-solid fa-comment"></i>
                                        </a>
                                        @if($item['reservation']->status === 'Забронировано')
                                        <form class="form__icon" id="form_delete" action="{{route('user.reservations.destroy', $item['reservation'])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection
