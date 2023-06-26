@extends('layouts.main')

@section('title')
    НЧПК | Библиотека
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
