<section class="catalog element_pad">
    <div class="container">
        <header class="catalog_heading">
            <div class="catalog_heading_row">
                <div class="heading_col heading_col_nav">
                    <h1>Книги</h1>
                    <ul class="nav_heading">
                        <li class="nav_heading_item">
                            <a href="{{route('index')}}">Главная</a>
                        </li>
                        <li class="nav_heading_item">
                            <a href="{{route('catalog')}}">Каталог</a>
                        </li>
                    </ul>
                </div>
                <div class="heading_col heading_col_info">
                    <h2>Показано
                        @if(count($books) == 0)
                            0
                        @else
                            1
                        @endif
                        - {{count($books)}} из {{count($books)}} результатов</h2>
                    <div class="catalog_sort">
                        <p class="sort_row sort_icon" id="sortRow">
                            <img src="{{asset('storage/icons/sortRow.png')}}" alt="" width="30" height="13">
                        </p>
                        <p class="sort_list sort_icon active" id="sortList">
                            <img src="{{asset('storage/icons/sortList.png')}}" alt="">
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <div class="catalog_row">
            <div class="filter_search catalog_col">
                <h2 class="title_custom">Поиск</h2>
                <input type="text" class="form_control" wire:model.debounce.500ms="name" placeholder="Автор, название..">
                <div class="preloader-bg" wire:loading>
                    <div class="spinner">
                        <img src="{{asset('storage/spinner.svg')}}" alt="spinner">
                    </div>
                </div>
                <h2 class="title_custom">Жанр</h2>
                <form action="{{route('catalog')}}" class="catalog_form" method="get">
                    @csrf
                    @foreach($genres as $genre)
                        <fieldset class="catalog_checkbox_field">
                            <input type="checkbox" name="genre_id[]" value="{{$genre->id}}" class="checkbox_control" id="{{$genre->name}}">
                            <label for="{{$genre->name}}" class="checkbox_label">{{$genre->name}}</label>
                            <p class="checkbox_result">
                                ({{\App\Models\Book::all()->where('genre_id', '=', $genre->id)->count()}})
                            </p>
                        </fieldset>
                    @endforeach
                    <button class="primary_btn" type="submit">Найти</button>
                </form>
            </div>

            <div class="catalog_row catalog_index">
                <div class="catalog_index_ctn">
                    <ul class="catalog_list">
                        @foreach($books as $book)
                            <li class="catalog_item">
                                <div class="catalog_item_ctn">
                                    <div class="catalog_item_row">
                                        <div class="catalog_item_image_ctn">
                                            <a href="{{route('book', $book->id)}}">
                                                <img src="{{asset('storage/' . $book->image)}}" alt="{{$book->name}}">
                                            </a>
                                        </div>
                                        <div class="catalog_item_info">
                                            <h3>{{$book->name}}</h3>
                                            @php
                                                $author = \App\Models\Author::find($book->author_id);
                                                $feedbacks = \App\Models\Feedback::all()->where('book_id', '=', $book->id);
                                                if(!$feedbacks->isEmpty()){
                                                    $countFeedbacks = $feedbacks->count();
                                                    $sum = 0;
                                                    foreach ($feedbacks as $feedback){
                                                        $sum += $feedback->score;
                                                    }
                                                    $sumAvg = $sum / $countFeedbacks;
                                                    $widthRating = ($sumAvg * 22) + (floor($sumAvg) * 3);
                                                } else {
                                                    $widthRating = 122;
                                                }
                                            @endphp
                                            <a href="dsadasdasd" class="author_link">{{$author->name}}</a>
                                            @if(!$feedbacks->isEmpty())
                                                <div class="book_stars_par">
                                                    <div class="book_stars_unfill">
                                                        <img src="{{asset('storage/unfilled_stars.png')}}" alt="">
                                                    </div>
                                                    <div class="book_stars_fill" style="width: {{$widthRating}}px">
                                                        <img src="{{asset('storage/filled_stars.png')}}" alt="">
                                                    </div>
                                                </div>
                                            @endif
                                            <p class="book_desc">
                                                {{$book->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="paginator-center">
        {{$paginator->links()}}
    </div>
</section>
