@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Добавление пользователя
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Добавить пользователя</h1>
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
                <form action="{{route('admin.users.store')}}" method="post">
                    <div class="add_user_form">
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Имя *</label>
                                <input class="add_author_input input" id="genre_name" name="name" type="text" placeholder="Введите имя">
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Фамилия *</label>
                                <input class="add_author_input input" id="genre_name" name="surname" type="text" placeholder="Введите фамилию">
                                @error('surname')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Логин *</label>
                                <input class="add_author_input input" id="genre_name" name="login" type="text" placeholder="Введите логин">
                                @error('login')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">E-mail</label>
                                <input class="add_author_input input" id="genre_name" name="email" type="email" placeholder="Введите почту">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Телефон</label>
                                <input class="add_author_input input" id="genre_name" name="phone" type="tel" placeholder="Введите телефон">
                                @error('phone')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="add_form_item">
                                <p class="add_form_item_label">Выбор роли *</p>
                                <div class="__select" data-state="">
                                    <div class="__select__title" data-default="user">Пользователь</div>
                                    <div class="__select__content selectAll">
                                        <a href="#" class="__select__label" id="user">Пользователь</a>
                                        <a href="#" class="__select__label" id="support">Тех.поддержка</a>
                                        <a href="#" class="__select__label" id="librarian">Библиотекарь</a>
                                        <a href="#" class="__select__label" id="admin">Администратор</a>
                                    </div>
                                </div>
                                @error('role')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror

                                <label class="add_form_item_label hidden" for="role">Выбор роли *</label>
                                <select class="select input selectOptions" name="role" id="role" hidden>
                                    <option value="user">Пользователь</option>
                                    <option value="support">Тех.поддержка</option>
                                    <option value="librarian">Библиотекарь</option>
                                    <option value="admin">Администратор</option>
                                </select>
                            </div>
                        </div>

{{--                        <div class="add_form_row">--}}
{{--                            <div class="add_form_item">--}}
{{--                                <label class="add_author_label" for="genre_name">Текущий пароль *</label>--}}
{{--                                <input class="add_author_input input" id="genre_name" type="text">--}}
{{--                            </div>--}}
{{--                            <div class="add_form_item">--}}
{{--                                <label class="add_author_label" for="genre_name">Новый пароль *</label>--}}
{{--                                <input class="add_author_input input" id="genre_name" type="text">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="add_form_row">
                            <div class="add_form_item">
                                <label class="add_author_label" for="genre_name">Пароль *</label>
                                <input class="add_author_input input" id="genre_name" name="password" type="text">
                                @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="comment_form_rating_input_control">
                        <input name="submit" type="submit" id="submit" class="book_info_section_reviews_submit edit_book" value="Создать">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        const selectAll = document.querySelectorAll('.selectAll a')
        const selectOptions = document.querySelectorAll('.selectOptions option')

        for (let i = 0; i < selectAll.length; i++){
            selectAll[i].addEventListener('click', (e) => {
                selectOptions.forEach(option => {
                    option.removeAttribute('selected')
                })
                selectOptions[i].setAttribute('selected', 'selected')
            })
        }

        $(function(){
            $(".phone").mask("+ 7 (999) 999-99-99");
        });

    </script>
@endsection
