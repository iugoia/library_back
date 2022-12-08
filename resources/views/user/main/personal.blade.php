<?php $title = 'Личный кабинет' ?>
@extends('user.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="user-profile__container">
                <h1>Профиль</h1>
                <div class="profile">
                    <div class="account_image">
                        <img src="{{asset('public/storage/avatars/E6vd4Nsb9Qa6AU9pufw5a4Tu8GET6mVv3rz7BDYr.jpg')}}" alt="avatar" class="avatar">
                    </div>
                    <div class="profile__info">
                        <p>Имя: <span>Name</span></p>
                        <p>Фамилия: <span>Second Name</span></p>
                        <p>Логин: <span>user123</span></p>
                        <p>Почта: <span>user@example.com</span></p>
                        <p>Телефон: <span>+7 (927) 426-24-66</span></p>
                        <a class="btn" href="edit_profile.html">Редактировать профиль</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
