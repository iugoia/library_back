<?php $title = 'Личный кабинет' ?>
@extends('user.layout.main')
@section('content')
    <main class="user-profile__container">
        <div class="container">
            <div>
                <h1>Профиль</h1>
                <div class="profile">
                    <div class="account_image">
                        <img src="{{asset('public/storage/' . \Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="avatar" class="avatar">
                    </div>
                    <div class="profile__info">
                        <p>Имя: <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span></p>
                        <p>Фамилия: <span>{{\Illuminate\Support\Facades\Auth::user()->surname}}</span></p>
                        <p>Логин: <span>{{\Illuminate\Support\Facades\Auth::user()->login}}</span></p>
                        <p>Почта: <span>{{\Illuminate\Support\Facades\Auth::user()->email}}</span></p>
                        <p>Телефон: <span>{{\Illuminate\Support\Facades\Auth::user()->phone}}</span></p>
                        <a class="btn btn-primary" href="{{route('profile-edit')}}">Редактировать профиль</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
