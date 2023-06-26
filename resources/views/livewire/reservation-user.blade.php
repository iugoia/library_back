<div>
    <div class="lk_filter">
        <label for="search" class="lk_filter_label">Поиск</label>
        <input id="search" name="search" wire:model.debounce.500ms="search" class="input" placeholder="По книге, автору, статусу...">
        <div class="preloader-bg" wire:loading>
            <div class="spinner">
                <img src="{{asset('storage/spinner.svg')}}" alt="spinner">
            </div>
        </div>
    </div>

    <ul class="reservation_grid">
        @foreach($arrDataList as $item)
            <li class="reservation-grid-item">
                <div class="reservation_header">
                    <p class="reservation_heading">Бронь</p>
                    <div class="table_actions">
                        <a href="{{route('book', $item['book']->id)}}" target="_blank" class="eye_icon">
                            <i class="fa fa-eye fa-solid"></i>
                        </a>
                        <a href="{{route('user.feedbacks.create', $item['book']->id)}}" class="text-primary">
                            <i class="fa fa-comment fa-solid"></i>
                        </a>
                        <form action="{{route('user.reservations.destroy', $item['reservation']->id)}}" method="post" class="form_destroy">
                            @method('delete')
                            <button type="submit" class="btn_icon text-danger">
                                <i class="fa fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="reservation_body">
                    <img src="{{asset('storage/' . $item['book']->image)}}" alt="Книга">
                    <div class="reservation_body_inner">
                        <div>
                            <p class="reservation_label">Название книги</p>
                            <span class="reservation_span">{{$item['book']->name}}</span>
                        </div>
                        <div>
                            <p class="reservation_label">Статус</p>
                            @if($item['reservation']->status === 'Возвращено')
                                <span class="reservation_span text-succes">{{$item['reservation']->status}}</span>
                            @elseif($item['reservation']->status === 'Забронировано')
                                <span class="reservation_span text-danger">{{$item['reservation']->status}}</span>
                            @else
                                <span class="reservation_span text-warning">{{$item['reservation']->status}}</span>
                            @endif

                        </div>
                        <div>
                            <p class="reservation_label">Период бронирования</p>
                            <span class="reservation_span reservation_date_start">{{date('d.m.Y', strtotime($item['reservation']->created_at))}}</span>
                            <span> - </span>
                            <span class="reservation_span reservation_date_end">{{date('d.m.Y', strtotime($item['reservation']->received_time))}}</span>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>
