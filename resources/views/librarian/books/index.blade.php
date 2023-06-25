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
                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По названию, автору, жанру...">
                    </div>
                </div>
                <!--<input type="text" class="input search" placeholder="Поиск по названию, автору, жанру...">-->
                <table class="main_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th>Книга</th>
                        <th>Автор</th>
                        <th>Жанр</th>
                        <th>Кол-во экземпляров</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td class="table_image_text">
                                <div class="table_image_ctn">
                                    <img src="{{asset('storage/' . $book->image)}}" alt="{{$book->name}}">
                                </div>
                                <p>
                                    {{$book->name}}
                                </p>
                            </td>
                            <td>
                                {{ \App\Models\Author::find($book->author_id)->name}}

                            </td>
                            <td>
                                {{\App\Models\Genre::find($book->genre_id)->name}}
                            </td>
                            <td>
                                {{$book->count}}
                            </td>
                            @if($book->is_available)
                                <td class="text-succes">
                                    Доступно
                                </td>
                            @else
                                <td class="text-danger">
                                    Недоступно
                                </td>
                            @endif
                            <td>
                                <div class="table_actions">
                                    <a href="#" class="eye_icon">
                                        <i class="fa fa-eye fa-solid"></i>
                                    </a>
                                    <a href="{{route('librarian.books.edit', $book)}}" class="text-primary">
                                        <i class="fa fa-pen fa-solid"></i>
                                    </a>
                                    <form action="{{route('librarian.books.destroy', $book)}}" method="post" class="form_destroy">
                                        @method('delete')
                                        <button type="submit" class="btn_icon text-danger">
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
