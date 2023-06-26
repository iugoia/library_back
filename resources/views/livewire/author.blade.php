<div>
    <div class="lk_filters">
        <div class="lk_filter">
            <label for="search" class="lk_filter_label">Поиск</label>
            <input type="text" id="search" wire:model.debounce.500ms="search" class="input" placeholder="По имени, описанию...">
            <span wire:loading>Searching...</span>
        </div>
    </div>
    <table class="main_table authors_table">
        <thead>
        <tr class="main_table_heading">
            <th>#ID</th>
            <th>Автор</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        </thead>

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
