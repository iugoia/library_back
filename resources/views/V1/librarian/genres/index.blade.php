<?php $title = 'Все жанры' ?>
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
                    <h1>Все жанры</h1>
                    <a href="{{route('librarian.genres.create')}}" class="btn btn-primary">Добавить жанр</a>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

                <div class="admin__users__table__wrapper">
                    <table class="admin__users__table__table table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Название жанра</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($genres as $genre)
                            <tr>
                                <td>{{$genre->id}}</td>
                                <td>{{$genre->name}}</td>
                                <td class="admin__users__nav">
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('librarian.genres.edit', $genre)}}">
                                            <i class="fa-solid fa-pen text-primary"></i>
                                        </a>
                                        <form class="form__icon" id="form_delete" action="{{route('librarian.genres.destroy', $genre)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </main>

@endsection
