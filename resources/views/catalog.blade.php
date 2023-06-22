@extends('layouts.main')

@section('title')
    НЧПК | Библиотека
@endsection

@section('content')
    <main class="main">
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
                            <h2>Показано 1-16 из 18 результатов</h2>
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
                        <input type="text" class="form_control" placeholder="Название..">
                        <h2 class="title_custom">Жанр</h2>
                        <form action="#" class="catalog_form">
                            <fieldset class="catalog_checkbox_field">
                                <input type="checkbox" class="checkbox_control" id="detective">
                                <label for="detective" class="checkbox_label">Детективы</label>
                                <p class="checkbox_result">(6)</p>
                            </fieldset>
                            <fieldset class="catalog_checkbox_field">
                                <input type="checkbox" class="checkbox_control" id="novel">
                                <label for="novel" class="checkbox_label">Романы</label>
                                <p class="checkbox_result">(6)</p>
                            </fieldset>
                            <fieldset class="catalog_checkbox_field">
                                <input type="checkbox" class="checkbox_control" id="literature">
                                <label for="literature" class="checkbox_label">Художественная литература</label>
                                <p class="checkbox_result">(6)</p>
                            </fieldset>
                            <fieldset class="catalog_checkbox_field">
                                <input type="checkbox" class="checkbox_control" id="phs">
                                <label for="phs" class="checkbox_label">Психология</label>
                                <p class="checkbox_result">(6)</p>
                            </fieldset>
                            <button class="primary_btn">Найти</button>
                        </form>
                    </div>

                    <div class="catalog_row catalog_index">
                        <div class="catalog_index_ctn">
                            <ul class="catalog_list">
                                <li class="catalog_item">
                                    <div class="catalog_item_ctn">
                                        <div class="catalog_item_row">
                                            <div class="catalog_item_image_ctn">
                                                <a href="book.html">
                                                    <img src="{{asset('storage/books/1.png')}}" alt="boook">
                                                </a>
                                            </div>
                                            <div class="catalog_item_info">
                                                <h3>103 Home Cooked meals</h3>
                                                <a href="" class="author_link">Kristi Lee</a>
                                                <div class="book_stars_par">
                                                    <div class="book_stars_unfill">
                                                        <img src="{{asset('storage/unfilled_stars.png')}}" alt="">
                                                    </div>
                                                    <div class="book_stars_fill" style="width: 122px">
                                                        <img src="{{asset('storage/filled_stars.png')}}" alt="">
                                                    </div>
                                                </div>
                                                <p class="book_desc">
                                                    Укрывшись от погони в академии Лютвидж, Оз и его компания рассказывают Лейму о предательстве герцога Бальмы. Однако вскоре выясняется, что не все так просто, ведь именно Бальма отправил своего подчиненного на помощь Озу. Какую же цель преследует взбалмошный герцог?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
