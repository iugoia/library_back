@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все авторы
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Авторы</h1>
                    <a href="{{route('librarian.authors.create')}}" class="primary_btn">
                        Добавить автора
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
                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По имени, описанию...">
                    </div>
                </div>
                <!--<input type="text" class="input search" placeholder="Поиск по имени...">-->
                <table class="main_table authors_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th>Автор</th>
                        <th>Описание</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{$author->id}}</td>
                            @if($author->photo)
                                <td class="table_image_text">
                                    <div class="table_image_ctn author">
                                        @if($author->photo)
                                            <img src="{{asset('storage/' . $author->photo)}}" alt="author">
                                        @else
                                            <img src="{{asset('storage/authors/author1.png')}}" alt="author">
                                        @endif
                                    </div>
                                    <p>
                                        {{$author->name}}
                                    </p>
                                </td>
                            @else
                                <td>
                                    <p>
                                        {{$author->name}}
                                    </p>
                                </td>
                            @endif

                            <td class="author_description">
                                {{$author->description}}
                            </td>
                            <td>
                                <div class="table_actions">
                                    <a href="#" class="eye_icon">
                                        <i class="fa fa-eye fa-solid"></i>
                                    </a>
                                    <a href="{{route('librarian.authors.edit', $author)}}" class="text-primary">
                                        <i class="fa fa-pen fa-solid"></i>
                                    </a>
                                    <form action="{{route('librarian.authors.destroy', $author)}}" method="post" class="form_destroy">
                                        @method('delete')
                                        <button type="sumbit" class="btn_icon text-danger">
                                            <i class="fa fa-solid fa-trash-can"></i>
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
@endsection
