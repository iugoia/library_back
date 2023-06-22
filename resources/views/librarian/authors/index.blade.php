@extends('layouts.auth')

@section('title')
    НЧПК | Библиотека | Все авторы
@endsection

@section('content')
    <section class="main_block_lk element_pad">
        <div class="container">
            <div class="lk_inner_block">
                <div class="lk_caption_row">
                    <h1>Все Авторы</h1>
                    <a href="{{route('librarian.authors.create')}}" class="primary_btn">
                        Добавить автора
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <div class="lk_filters">
                    <div class="lk_filter">
                        <label for="search" class="lk_filter_label">Поиск</label>
                        <input id="search" name="search" class="input" placeholder="По имени...">
                    </div>
                </div>
                <!--<input type="text" class="input search" placeholder="Поиск по имени...">-->
                <table class="main_table authors_table">
                    <tr class="main_table_heading">
                        <th>#ID</th>
                        <th>Автор</th>
                        <th>Описание</th>
                        <th>Действия</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="table_image_text">
                            <div class="table_image_ctn author">
                                <img src="{{asset('storage/authors/author1.png')}}" alt="author">
                            </div>
                            <p>
                                Джулия Филлипс
                            </p>
                        </td>
                        <td class="author_description">
                            Американская писательница и кинопродюсер, первая женщина, получившая «Оскар» за «Лучший фильм».
                            Во время учебы в Москве Филлипс, впечатленная Россией, поняла, что хочет стать писательницей и написать книгу о
                            нашей стране. Получив стипендию Фулбрайта на создание романа, она год провела на Камчатке, чтобы прочувствовать
                            атмосферу отдаленного изолированного региона и передать особенности местного менталитета.
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="{{route('librarian.authors.edit')}}" class="text-primary">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="table_image_text">
                            <div class="table_image_ctn author">
                                <img src="{{asset('storage/authors/author1.png')}}" alt="author">
                            </div>
                            <p>
                                Джулия Филлипс
                            </p>
                        </td>
                        <td class="author_description">
                            Американская писательница и кинопродюсер, первая женщина, получившая «Оскар» за «Лучший фильм».
                            Во время учебы в Москве Филлипс, впечатленная Россией, поняла, что хочет стать писательницей и написать книгу о
                            нашей стране. Получив стипендию Фулбрайта на создание романа, она год провела на Камчатке, чтобы прочувствовать
                            атмосферу отдаленного изолированного региона и передать особенности местного менталитета.
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="#" class="text-primary">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="table_image_text">
                            <div class="table_image_ctn author">
                                <img src="{{asset('storage/authors/author1.png')}}" alt="author">
                            </div>
                            <p>
                                Джулия Филлипс
                            </p>
                        </td>
                        <td class="author_description">
                            Американская писательница и кинопродюсер, первая женщина, получившая «Оскар» за «Лучший фильм».
                            Во время учебы в Москве Филлипс, впечатленная Россией, поняла, что хочет стать писательницей и написать книгу о
                            нашей стране. Получив стипендию Фулбрайта на создание романа, она год провела на Камчатке, чтобы прочувствовать
                            атмосферу отдаленного изолированного региона и передать особенности местного менталитета.
                        </td>
                        <td>
                            <div class="table_actions">
                                <a href="#" class="eye_icon">
                                    <i class="fa fa-eye fa-solid"></i>
                                </a>
                                <a href="#" class="text-primary">
                                    <i class="fa fa-pen fa-solid"></i>
                                </a>
                                <form action="#" method="post" class="form_destroy">
                                    <button type="sumbit" class="btn_icon text-danger">
                                        <i class="fa fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
