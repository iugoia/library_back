<div>
    <div class="search-role">
        <input type="text" wire:model="searchTerm" class="form-control" placeholder="Поиск...">
    </div>
    <div class="admin__users__table__wrapper">
        <table class="admin__users__table__table table align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>#ID</th>
                <th>Книга</th>
                <th>Автор</th>
                <th>Жанр</th>
                <th>Стеллаж</th>
                <th>Ряд</th>
                <th>Полка</th>
                <th>Статус для бронирования</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="product-box border">
                                <img src="{{asset('storage/' . $book->image)}}" alt="{{$book->name}}">
                            </div>
                            <div class="product-info">
                                <h6 class="product-name mb-1">{{$book->name}}</h6>
                            </div>
                        </div>
                    </td>
                    <td>{{$book->author}}</td>
                    <td>
                        {{\App\Models\Genre::find($book->genre_id)->name}}
                    </td>
                    <td>{{$book->rack}}</td>
                    <td>{{$book->row}}</td>
                    <td>{{$book->shelf}}</td>
                    <td>
                        @if(!$book->is_available)
                            Недоступно
                        @endif
                        @if($book->is_available)
                            Доступно
                        @endif
                    </td>
                    <td class="admin__users__nav">
                        <div class="d-flex align-items-center gap-3 fs-6">
                            <a href="{{route('librarian.books.edit', $book)}}">
                                <i class="fa-solid fa-pen text-primary"></i>
                            </a>
                            <a target="_blank" href="{{route('showPageBook', $book)}}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <form class="form__icon" id="form_delete" action="{{route('librarian.books.destroy', $book)}}" method="post">
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
        <div class="paginator-center">
            {{$paginator->onEachSide(5)->links()}}
        </div>
    </div>
</div>
