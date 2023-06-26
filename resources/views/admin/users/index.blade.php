@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все пользователи
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Пользователи</h1>
                    <a href="{{route('admin.users.create')}}" class="primary_btn">
                        Добавить пользователя
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                @livewire('user')
            </div>
        </div>
    </section>
    @livewireScripts
@endsection
