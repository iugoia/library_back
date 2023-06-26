@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Все Бронирования</h1>
                @livewire('reservation-librarian')
            </div>
        </div>
    </section>
    @livewireScripts
@endsection
