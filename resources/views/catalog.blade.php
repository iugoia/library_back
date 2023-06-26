@extends('layouts.main')

@section('title')
    НЧПК | Библиотека | Каталог
@endsection

@section('content')
    <style>
        footer{
            display: none;
        }
    </style>
    <main class="main">
        @livewire('search-catalog')
    </main>
    @livewireScripts
@endsection
