@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все книги
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Книги</h1>
                    <a href="{{route('librarian.books.create')}}" class="primary_btn">
                        Добавить книгу
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success mb-3">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-error mb-3">
                        {{session()->get('error')}}
                    </div>
                @endif
                @livewire('search-books-librarian')
            </div>
        </div>
    </section>
@livewireScripts
@endsection
