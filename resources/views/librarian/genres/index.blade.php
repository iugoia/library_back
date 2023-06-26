@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все жанры
@endsection

@section('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Жанры</h1>
                    <a href="{{route('librarian.genres.create')}}" class="primary_btn">
                        Добавить жанр
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                @livewire('genre')
            </div>
        </div>
    </section>
    @livewireScripts
@endsection
