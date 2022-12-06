<?php $title = 'Подтверждение почты' ?>
@extends('layouts.main')

@section('content')
    <style>
        body{
            position: relative;
        }
        footer{
            position: absolute;
            bottom: 0;
            left: 0;
        }
        .verify h1{
            text-align: center;
        }
        .verify > div > *{
            margin: 30px 0;
        }
    </style>
    <section class="verify">
        <div class="container">
            <h1>Ожидается подтверждение Email-адреса</h1>
            <p>Пожалуйста, проверьте электронную почту, указанную Вами при регистрации учетной записи. В ближайшее время Вы получите письмо, содержащее ссылку на страницу подтверждения почты.</p>
        </div>
    </section>
@endsection
