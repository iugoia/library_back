@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Мои бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <h1>Мои бронирования</h1>
                @if(session()->has('error'))
                    <div class="alert alert-error mb-5">
                        {{session()->get('error')}}
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success mb-5">
                        {{session()->get('success')}}
                    </div>
                @endif

                @livewire('reservation-user')
            </div>
        </div>
    </section>
    @livewireScripts
@endsection
