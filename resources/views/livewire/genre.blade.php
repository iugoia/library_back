<div>
    <div class="lk_filters">
        <div class="lk_filter">
            <label for="search" class="lk_filter_label">Поиск</label>
            <input id="search" name="search" wire:model.debounce.500ms="name" class="input" placeholder="По названию...">
            <div class="preloader-bg" wire:loading>
                <div class="spinner">
                    <img src="{{asset('storage/spinner.svg')}}" alt="spinner">
                </div>
            </div>
        </div>
    </div>
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
    <!--<input type="text" class="input search" placeholder="Поиск по названию...">-->
    <table class="main_table">
        <tr class="main_table_heading">
            <th>#ID</th>
            <th class="left_alignment">Название жанра</th>
            <th>Действия</th>
        </tr>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{$genre->id}}</td>
                <td class="left_alignment">
                    {{$genre->name}}
                </td>
                <td>
                    <div class="table_actions">
                        <a href="{{route('librarian.genres.edit', $genre)}}" class="text-primary">
                            <i class="fa fa-pen fa-solid"></i>
                        </a>
                        <form action="{{route('librarian.genres.destroy', $genre)}}" method="post" class="form_destroy">
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
    <div class="paginator-center">
        {{$paginator->links()}}
    </div>
</div>
