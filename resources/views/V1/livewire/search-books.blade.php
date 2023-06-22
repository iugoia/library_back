<section class="allBooks">
    <div class="container">
        <div class="books__title__search">
            <h1>Каталог книг</h1>
            <div class="d1">
                <input wire:model="name" type="text" class="search" placeholder="автор, название..">
            </div>
        </div>
        <div class="books__col _books" id="books__catalog__list">
            <ul class="books__catalog__list">
                @foreach ($books as $book)
                    <li class="book__catalog__item @if (!$book->is_available) book_unavailable @endif">
                        <div class="container__catalog__book">
                            <div class="book__catalog__container__image">
                                <img src="{{asset('storage/' . $book->image)}}" alt="">
                            </div>
                            <div class="book__catalog__info">
                                <p>{{$book->name}}</p>
                                <p>{{$book->author}}</p>
                                <p>
                                    {{\App\Models\Genre::find($book->genre_id)->name}}
                                </p>
                            </div>
                                <div class="btn__container">
                                    <a href="{{route('showPageBook', $book->id)}}" class="btn__default">Забронировать</a>
                                </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="paginator-center">
                {{$paginator->links()}}
            </div>
        </div>
    </div>
</section>
