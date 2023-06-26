<div class="search_pagination">
    <div class="lk_filters">
        <div class="lk_filter">
            <label for="search" class="lk_filter_label">Поиск</label>
            <input id="search" name="search" wire:model="query" class="input" placeholder="По названию, автору, жанру...">
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
                @if($book->count > 0)
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
                        <a href="{{route('book', $book->id)}}" target="_blank" class="eye_icon">
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
    <div class="paginator-center">
        {{$paginator->links()}}
    </div>
</div>
