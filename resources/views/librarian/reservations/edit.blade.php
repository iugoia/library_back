@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Редактирование бронирования
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Редактирование Бронирования</h1>
                </div>
                <form action="{{route('librarian.reservations.update', $reservation)}}" method="post">
                    @method('patch')
                    <div class="edit_reservation_form">
                        <img src="{{asset('storage/' . $book->image)}}" alt="" class="edit_reservation_img">
                        <div class="edit_reservation_column">
                            <div class="edit_reservation_row">
                                <label class="edit_reservation_label" for="book_name">Название книги</label>
                                <input class="edit_reservation_input input" disabled type="text" placeholder="{{$book->name}}" id="book_name">
                            </div>
                            <div class="edit_reservation_row">
                                <label class="edit_reservation_label" for="book_author">Автор</label>
                                <input class="edit_reservation_input input" disabled type="text" placeholder="{{\App\Models\Author::find($book->author_id)->name}}" id="book_author">
                            </div>
                        </div>
                        <div class="edit_reservation_column">
                            <div class="edit_reservation_row">
                                <label class="edit_reservation_label" for="book_user">Пользователь</label>
                                <input class="edit_reservation_input input" disabled type="text" placeholder="{{$user->name}} {{$user->surname}}" id="book_user">
                            </div>
                            <div class="edit_reservation_row">
                                <p class="edit_reservation_label">Статус бронирования</p>
                                <div>
                                    <select class="add_form_item_input" name="status" style="width: 100%">
                                        @if($reservation->status === "Забронировано")
                                            <option value="Выдано">Выдано</option>
                                            <option value="Возвращено">Возвращено</option>
                                        @else
                                            <option value="Возвращено">Возвращено</option>
                                        @endif
                                    </select>
                                </div>
                                <!--
                                <label class="edit_reservation_label" for="reservation_status">Статус бронирования</label>
                                <select class="select edit_reservation_input" name="reservation_status" id="reservation_status">
                                    <option disabled>Выбрать</option>
                                    <option value="booked">Забронировано</option>
                                    <option value="issued">Выдано</option>
                                    <option value="returned">Возвращено</option>
                                </select>-->
                            </div>

                        </div>
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
                    <div class="comment_form_rating_input_control">

                        <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit edit_book" value="Сохранить изменения">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
