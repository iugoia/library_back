@extends('layouts.main')

@section('title')
    НЧПК | Библиотека
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
                                <a href="#" class="primary_btn">Выбрать книгу</a>
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

        <section class="categories element_pad">
            <div class="container">
                <h2 class="main_title">Категории</h2>
                <p class="desc_aft_title">В ассортименте библиотеки имеется множество категорий книг</p>
                <ul class="categories_list">
                    <li class="category_item fadeRight">
                        <div class="category_item_bg">
                            <div class="category_item_ctn">
                                <h3>Психология и эзотерика</h3>
                            </div>
                        </div>
                    </li>
                    <li class="category_item fadeRight">
                        <div class="category_item_bg">
                            <div class="category_item_ctn">
                                <h3>Подросткам</h3>
                            </div>
                        </div>
                    </li>
                    <li class="category_item fadeRight">
                        <div class="category_item_bg">
                            <div class="category_item_ctn">
                                <h3>Криминальные романы, действие которых происходит во времена эпидемии</h3>
                                <a href="#" class="secondary_btn">Каталог</a>
                            </div>
                        </div>
                    </li>
                    <li class="category_item fadeRight">
                        <div class="category_item_bg">
                            <div class="category_item_ctn">
                                <h3>Художественная литература</h3>
                            </div>
                        </div>
                    </li>
                    <li class="category_item fadeLeft">
                        <div class="category_item_bg">
                            <div class="category_item_ctn">
                                <h3>Биография
                                    и мемуары</h3>
                            </div>
                        </div>
                    </li>
                    <li class="category_item fadeBottom">
                        <div class="category_item_bg">
                            <div class="category_item_ctn">
                                <h3>Фантастика</h3>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="choose element_pad">
            <div class="container">
                <h2 class="main_title">Выбирайте нас</h2>
                <div class="desc_aft_title">Наш интернет-сервис имеет множество преимуществ</div>
                <ul class="choose_list">
                    <li class="choose_item fadeLeft">
                        <div class="choose_item_ctn">
                            <header class="choose_item_head">
                                <h3>
                                    <span class="strong">Все библиотечные книги — </span> в одном сервисе
                                </h3>
                            </header>
                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p>Здесь <span class="purple">вы найдете все произведения</span> из богатой
                                        коллекции библиотеки Набережночелнинского педагогического колледжа. Без
                                        необходимости выхода из дома, вы можете выбрать нужную книгу и оформить её
                                        бронирование. <span class="purple">Вы сами решаете, когда будете готовы
                                                забрать произведение</span>, а
                                        мы своевременно напомним вам о дате возврата.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="choose_item fadeLeft">
                        <div class="choose_item_ctn">
                            <header class="choose_item_head">
                                <h3>
                                    <span class="strong">Единый</span> читательский билет
                                </h3>
                            </header>
                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p>Вы можете оформить единый читательский билет в онлайн-режиме или лично
                                        посетив нашу библиотеку. Этот билет будет автоматически добавлен в ваш
                                        личный кабинет. Он <span class="purple">позволит вам свободно выбирать
                                                интересующие произведения</span> из нашего ассортимента.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="choose_item fadeBottom">
                        <div class="choose_item_ctn">
                            <header class="choose_item_head">
                                <h3>
                                    <span class="strong">Информация о ваших книгах — </span>в личном кабинете
                                </h3>
                            </header>
                            <div class="choose_item_row">
                                <div class="choose_item_col choose_item_img">

                                </div>
                                <div class="choose_item_col choose_item_info">
                                    <p>Личный кабинет читателя - это ваша "книжная онлайн-полка". <span
                                            class="purple">Здесь вы найдете перечень зарезервированных
                                                произведений</span>, а также список тех, которые уже были прочитаны или
                                        находятся в процессе чтения. Ваш кабинет читателя будет содержать информацию
                                        о том, когда можно получить зарезервированное издание и когда нужно вернуть
                                        книгу, приближающуюся к дате окончания срока хранения. Если вам нужно
                                        дополнительное время для работы с произведением, <span class="purple">вы
                                                можете продлить срок его хранения на месяц</span>, зайдя в свой личный
                                        кабинет.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        @if($bookScores !== [])
            <section class="carusel element_pad">
                <div class="container">
                    <header class="index_catalog_heading">
                        <h2 class="title_custom2"><span class="strong">Высокооцененные</span> Книги</h2>
                        <hr>
                        <div class="aux_carousel_navigation">
                            <button class="aux_prev_btn"></button>
                            <button class="aux_next_btn"></button>
                        </div>
                    </header>
                    <ul class="aux_carousel">
                        @for($i = 0; $i < 6; $i++)
                            @if(isset($bookScores[$i]))
                                <li class="aux_carousel_item fadeLeft">
                                    <div class="aux_carousel_item_ctn">
                                        <div class="auxshp-entry-main">
                                            <div class="book_stars_par">
                                                <div class="book_stars_unfill">
                                                    <img src="{{asset('storage/unfilled_stars.png')}}" alt="prev_btn">
                                                </div>
                                                <div class="book_stars_fill" style="width: {{$bookScores[$i]['ratingWidth']}}px">
                                                    <img src="{{asset('storage/filled_stars.png')}}" alt="prev_btn">
                                                </div>
                                            </div>
                                            <h3 class="aux_carousel_item_heading">{{$bookScores[$i]['book']->name}}</h3>
                                            <p class="aux_carousel_item_author">{{\App\Models\Author::find($bookScores[$i]['book']->author_id)->name}}</p>
                                            <p class="aux_carousel_item_description">{{$bookScores[$i]['book']->description}}</p>
                                            <a href="{{route('book', $bookScores[$i]['book'])}}" class="aux_item_book_btn">Забронировать</a>
                                        </div>
                                        <div class="carousel_book_ctn">
                                            <img class="aux_carousel_item_image" src="{{asset('storage/' . $bookScores[$i]['book']->image)}}" alt="1">
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </section>
        @endif



        <section class="index_catalog element_pad">
            <div class="container">
                <div class="catalog_ctn">
                    <header class="index_catalog_heading">
                        <h2 class="title_custom2"><span class="strong">Каталог</span> Книг</h2>
                        <hr>
                        <a href="catalog.html" class="primary_btn">Посмотреть все</a>
                    </header>
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
        </section>

        <section class="map element_pad">
            <div class="container">
                <div class="map_ctn">
                    <h2 class="fadeTop"><span class="strong">Контактная</span> Информация</h2>
                    <iframe class="fadeBottom"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1889.2693082550672!2d52.41019510704237!3d55.72840075347918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ff1e0aa00315b%3A0xd1c88d987edf6261!2z0J3QsNCx0LXRgNC10LbQvdC-0YfQtdC70L3QuNC90YHQutC40Lkg0L_QtdC00LDQs9C-0LPQuNGH0LXRgdC60LjQuSDQutC-0LvQu9C10LTQtg!5e0!3m2!1sru!2sru!4v1686446068413!5m2!1sru!2sru"
                            width="100%" height="550" style="border-radius: 15px; border: 0; outline: 0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
@endsection
