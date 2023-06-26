@extends('layouts.main')

@section('title')
    НЧПК | Библиотека | Как это работает
@endsection

@section('content')
    <main class="main">
        <h1 class="hidden">Дестяки доступных книг для бронирования</h1>
        <section class="promo element_pad">
            <div class="container">
                <div class="promo_row">
                    <div class="promo_col promo_col_info">
                        <div class="promo_col_info_ctn">
                            <p class="badge">Все твои любимые книги уже здесь</p>
                            <div class="promo_animation_ctn">
                                <p class="promo_heading"><span class="purple">Забронируй</span> прямо сейчас</p>
                                <a href="{{route('catalog')}}" class="primary_btn">Выбрать книгу</a>
                            </div>
                        </div>
                    </div>
                    <div class="promo_col promo_bg">
                        <img src="{{asset('storage/works_bg.png')}}" width="75%" alt="Девушка">
                    </div>
                </div>
            </div>
        </section>


        <section class="choose element_pad">
            <div class="container">
                <h2 class="main_title">Как это работает?</h2>
                <div class="desc_aft_title">Вы можете забронировать книгу в пару кликов</div>
                <ul class="steps_list">
                    <li class="category_item fadeRight animateFade">
                        <div class="choose_item_work">
                            <p class="text_container">Вы заходите на наш сайт и регистрируетесь</p>
                            <img src="{{asset('storage/choose_work1.png')}}" alt="Шаг1">
                        </div>
                    </li>
                    <li class="category_item fadeRight animateFade">
                        <div class="choose_item_work">
                            <p class="text_container">Выбираете нужную Вам книгу из каталога библиотеки</p>
                            <img src="{{asset('storage/choose_work2.png')}}" alt="Шаг1">
                        </div>
                    </li>
                    <li class="category_item fadeLeft">
                        <div class="choose_item_work">
                            <p class="text_container">Если книга доступна, то можете забронировать ее на определенное время, указав дату и время, когда Вы сможете забрать книгу в библиотеке</p>
                            <img src="{{asset('storage/choose_work3.png')}}" alt="Шаг1">
                        </div>
                    </li>
                    <li class="category_item fadeBottom AnimateFade">
                        <div class="choose_item_work">
                            <p class="text_container">Система подтверждает бронирование и отправляет Вам уведомление о том, что запрос был успешно обработан</p>
                            <img src="{{asset('storage/choose_work4.png')}}" alt="Шаг1">
                        </div>
                    </li>
                    <li class="category_item fadeBottom AnimateFade">
                        <div class="choose_item_work">
                            <p class="text_container">Вы приходите в библиотеку в назначенное время и забираете забронированную книгу, предъявив свой читательский билет и подтверждение бронирования</p>
                            <img src="{{asset('storage/choose_work5.png')}}" alt="Шаг1">
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </main>
@endsection
