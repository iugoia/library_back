<div>
    <style>
        .input{
            margin-bottom: 0;
        }
        .__select__title{
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 0;
        }
        .select_download{
            max-width: 70px;
        }
        .__select__title::before, .__select__title::after{
            content: unset;
        }
    </style>
    <div class="lk_filters">
        <div class="lk_filter">
            <label for="search" class="lk_filter_label">Поиск</label>
            <input id="search" name="search" wire:model.debounce.500ms="search" class="input" placeholder="По книге, статусу, пользователю...">
        </div>
        <div class="preloader-bg" wire:loading>
            <div class="spinner">
                <img src="{{asset('storage/spinner.svg')}}" alt="spinner">
            </div>
        </div>

        <div class="lk_filter">
            <label for="start" class="lk_filter_label">Начало бронирования</label>
            <input type="date" id="start" wire:model="created_at" name="start" class="input">
        </div>
        <div class="lk_filter">
            <label for="end" class="lk_filter_label">Конец бронирования</label>
            <input type="date" id="end" name="end" class="input" wire:model="received_at">
        </div>
        <div class="__select select_download" data-state="">
            <div class="__select__title" data-default="great"><i class="fa-solid fa-arrow-down-to-line fa-xl"></i></div>
            <div class="__select__content">
                <a class="__select__label" href="{{route('librarian.reservations.export', ['array' => $arrDataList])}}">Excel</a>
                <a class="__select__label" href="{{route('librarian.reservations.exportToHtml', ['array' => $arrDataList])}}">HTML</a>
            </div>
        </div>
    </div>


    @if(session()->has('success'))
        <div class="alert alert-success mb-5">
            {{session()->get('success')}}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-error mb-5">
            {{session()->get('error')}}
        </div>
    @endif
    <table class="main_table">
        <tr class="main_table_heading">
            <th>#ID</th>
            <th>Книга</th>
            <th>
                <a href="{{ route('librarian.reservations.index', ['sort' => 'status', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">
                    Статус
                    <i class="fa fa-solid fa-sort"></i>
                </a>
            </th>
            <th>
                <a href="{{ route('librarian.reservations.index', ['sort' => 'created_at', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">
                    Начало бронирования
                    <i class="fa fa-solid fa-sort"></i>
                </a>
            </th>
            <th>
                <a href="{{ route('librarian.reservations.index', ['sort' => 'received_time', 'direction' => $direction == 'asc' ? 'desc' : 'asc']) }}">
                    Конец бронирования
                    <i class="fa fa-solid fa-sort"></i>
                </a>
            </th>
            <th>Пользователь</th>
            <th>Действия</th>
        </tr>
        <tbody>
        @foreach($arrDataList as $item)
            @php
                $user = \App\Models\User::find($item['user_id']);
                $book = \App\Models\Book::find($item['book_id']);
                $reservation = \App\Models\Reservation::find($item['reservation_id']);
            @endphp
            <tr>
                <td>{{$reservation->id}}</td>
                <td class="table_image_text">
                    <div class="table_image_ctn">
                        <img src="{{asset('storage/' . $book->image)}}" alt="book">
                    </div>
                    <p>
                        {{$book->name}}
                    </p>
                </td>
                <td class="text-danger">
                    @if($reservation->status === 'Возвращено')
                        <span class=" text-succes">{{$reservation->status}}</span>
                    @elseif($reservation->status === 'Забронировано')
                        <span class=" text-danger">{{$reservation->status}}</span>
                    @else
                        <span class=" text-warning">{{$reservation->status}}</span>
                    @endif
                </td>
                <td>
                    {{date('d.m.Y', strtotime($reservation->created_at))}}
                </td>
                <td>
                    {{date('d.m.Y', strtotime($reservation->received_time))}}
                </td>
                <td>{{$user->name}} {{$user->surname}} | <strong>{{$user->login}}</strong></td>
                <td>
                    <div class="table_actions">
                        <a href="#" class="eye_icon">
                            <i class="fa fa-eye fa-solid"></i>
                        </a>
                        <a href="{{route('librarian.reservations.edit', [$reservation, $book, $user])}}" class="text-primary">
                            <i class="fa fa-pen fa-solid"></i>
                        </a>
                        <form action="{{route('librarian.reservations.destroy', $reservation)}}" method="post" class="form_destroy">
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
