@extends('layouts.main')

@section('title')
    НЧПК | Библиотека | Как это работает
@endsection

@section('content')
    <main class="main">
        <h1 class="hidden">Главная страница сайта НЧПК Библиотека</h1>
        <section class="promo element_pad">
            <div class="container">
                <div class="promo_row">
                    <div class="promo_col promo_col_info">
                        <div class="promo_col_info_ctn">
                            <p class="badge">Все твои любимые книги уже здесь</p>
                            <div class="promo_animation_ctn">
                                <p class="promo_heading"><span class="purple">Чтение</span> это увлекательно</p>
                                <p class="promo_desc">удовольствие от чтения может помочь человеку в профилактике
                                    душевного и физического здоровья</p>
                                <a href="{{route('catalog')}}" class="primary_btn">Выбрать книгу</a>
                            </div>
                        </div>
                    </div>
                    <div class="promo_col promo_bg">
                        <div class="promo_bg_ctn">
                            <div class="animation_book_fly">
                                <img src="{{asset('storage/promo_book.png')}}" width="783" height="784"
                                     alt="летающая книжка">
                            </div>
                        </div>
                        <div class="promo_bg_ctn">
                            <img src="{{asset('storage/promo_right_book.png')}}" alt="книга справа" width="783" height="784">
                        </div>
                        <div class="promo_bg_ctn">
                            <img src="{{asset('storage/promo_orange_line.png')}}" alt="оранжевая линия">
                        </div>
                        <div class="promo_bg_ctn">
                            <img src="{{asset('storage/promo_ellipse_lines.png')}}" alt="круг из линий">
                        </div>
                        <div class="promo_bg_ctn">
                            <img src="{{asset('storage/promo_purple_line.png')}}" alt="фиолетовая линия">
                        </div>
                        <div class="promo_bg_ctn">
                            <img src="{{asset('storage/promo_ellipse.png')}}" alt="круг фиолетовый" width="680" height="680">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="choose element_pad">
            <div class="container">
                <h2 class="main_title">Выбирайте нас</h2>
                <div class="desc_aft_title">Наш интернет-сервис имеет множество преимуществ</div>
                <ul class="choose_list">
                    <li class="choose_item_1 fadeLeft">
                        <div class="choose_item_work1">

                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p class="text_work">Вы заходите на наш сайт и регистрируетесь</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="choose_item_2 fadeLeft">
                        <div class="choose_item_work2">

                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p class="text_work">Выбираете нужную Вам книгу из каталога библиотеки</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="choose_item_3 fadeBottom">
                        <div class="choose_item_work3">

                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p class="text_work_big">Если книга доступна, то можете забронировать ее на определенное время, указав дату и время, когда Вы сможете забрать книгу в библиотеке</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="choose_item_4 fadeLeft">
                        <div class="choose_item_work4">

                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p class="text_work">Вы заходите на наш сайт и регистрируетесь</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="choose_item_5 fadeLeft">
                        <div class="choose_item_work5">

                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p class="text_work">Выбираете нужную Вам книгу из каталога библиотеки</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </main>
@endsection
