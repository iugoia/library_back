<?php $title = 'Подтверждение почты' ?>
@extends('layouts.main')

@section('content')
    <div class="container">
        <p>На вашу почту ({{$user->email}}) пришло письмо с подтверждением аккаунта</p>
    </div>
@endsection
