<?php $title = 'Каталог книг' ?>
@extends('layouts.main')
@section('content')
    <style>
        .catalog__search{
            display: flex;
        }
        .catalog__search > * {
            padding: 10px;
        }
        .catalog__input__search{
            border-radius: 0 !important;
        }
        .catalog__input__button{
            border: 0;
            background: #0072A3;
            color: #FFF;
        }
        .book__catalog__item a:hover{
            color: #FFF;
        }
        ol, ul{
            padding-left: 0;
        }
    </style>
<main>
        @livewire('search-books')
        </main>
    @livewireScripts
@endsection
