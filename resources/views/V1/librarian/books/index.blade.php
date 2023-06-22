<?php $title = 'Все книги' ?>
@extends('user.layout.main')

@section('content')
    <style>
        @if (\Illuminate\Support\Facades\DB::table('books')->count() < 9)
            footer{
            position: absolute;
            bottom: 0;
        }
        @endif
        @if (\Illuminate\Support\Facades\DB::table('books')->count() >= 9)
            footer{
            position: unset;
        }
        @endif
        .admin__users__table h1{
            margin: 20px 0;
        }
        .admin__users__table__wrapper{
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        .admin__user__title__ctn{
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .admin__user__title__ctn a{
            width: unset;
            margin-left: 20px;
            display: unset;
        }
        .admin__icons__a button{
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .form__icon button{
            border: none;
        }
        @media (max-width: 737px) {
            .admin__users__table{
                margin-left: 0;
            }
        }
        @media (max-width: 820px) {
            .admin__user__title__ctn > h1{
                flex: 0 0 100%;
            }
            .admin__user__title__ctn a{
                margin-left: 0;
                margin-bottom: 20px;
            }
        }
    </style>
    <main>
        <section class="admin__users__table user-profile__container">
            <div class="container">
                <div class="admin__user__title__ctn d-flex">
                    <h1>Все книги</h1>
                    <a href="{{route('librarian.books.create')}}" class="btn btn-primary">Добавить книгу</a>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @livewire('search-books-librarian')
            </div>
        </section>
    </main>

    @livewireScripts
@endsection
