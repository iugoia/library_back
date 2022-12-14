<?php $title = 'Главная страница' ?>
@extends('layouts.main')
@section('content')
<main>
    <section class="preview">
        <div class="preview-bg">
            <div class="container">
                <div class="preview-content">
                    <h1>Библиотека</h1>
                    <p>Познай дзен читателя и насладись
                        лучшими произведениями лучших авторов в
                        нашей библиотеке</p>
                    <a href="{{route('catalog')}}">Посмотреть книги</a>
                </div>
            </div>
        </div>
    </section>

    <section class="main__page__content">
        <div class="container">
            <h2>Книги в библиотеках НЧПК</h2>
            <ul class="features">

                <li>
                    <img src="{{asset('public/storage/img/feature1.png')}}" alt="">
                    <div>
                        <p>Все библиотечные книги — в одном сервисе</p>
                        <p>Сервис «Библиотеки НЧПК» — это онлайн-витрина, где собраны все книги библиотеки
                            Набережночелнинского педагогического колледжа. Найдите нужную и закажите не выходя из
                            дома.
                            Вы сами выбирайте, когда книгу можно будет забрать, и мы вовремя напомним, что её пора
                            вернуть.</p>
                    </div>

                </li>
                <li>
                    <div>
                        <p>Единый читательский билет</p>
                        <p>Оформите единый читательский билет онлайн или в нашей библиотеки, и он появится в вашем
                            личном кабинете. С этим билетом вы сможете брать понравившиеся книги в библиотеке.</p>
                    </div>
                    <img src="{{asset('public/storage/img/feature2.png')}}" alt="">
                </li>
                <li>
                    <img src="{{asset('public/storage/img/feature3.png')}}" alt="">
                    <div>
                        <p>Информация о ваших книгах — в личном кабинете</p>
                        <p>Кабинет читателя — это ваша "книжная онлайн-полка". На ней размещены книги, которые вы
                            бронировали, а также книги, которые вы уже читаете или прочитали. Вы будете знать, когда
                            можно забрать забронированную книгу и когда вернуть книгу, у которой заканчивается срок
                            хранения. Если Вам нужно больше времени для работы с книгой, зайдите в кабинет читателя
                            и
                            продлите срок хранения издания на месяц.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="main__page__content">
        <div class="container">
            <h2>Наши отзывы</h2>
            <ul class="reviews">
                <li>
                    <img src="{{asset('public/storage/img/stars1.png')}}" alt="">
                    <p>Дарина Полегешко</p>
                    <p>Лучшая библиотека в мире! Я счастлива, что живу в Набережных Челнах! Спасибо!!!</p>
                </li>
                <li>
                    <img src="{{asset('public/storage/img/stars2.png')}}" alt="">
                    <p>Марин Мокрый</p>
                    <p>Честно говоря, я не очень люблю читать книги, но когда узнал об этой библиотеке, пришлось
                        зачисляться на первый курс.</p>
                </li>
                <li>
                    <img src="{{asset('public/storage/img/stars3.png')}}" alt="">
                    <p>Александра Витяз</p>
                    <p>Прихожу каждый понедельник, дабы насладиться приятным набором книг, да и с помощью онлайн
                        сервиса легко их бронировать, всегда так хотела, но иногда книг не хватает, за это минус
                        звезда, а так, всё идеально, надеюсь у вас всё будет чудесно!</p>
                </li>
            </ul>
        </div>
    </section>

    <section class="main__page__content">
        <div class="container">
            <h2>Контактная информация</h2>
            <div class="contacts">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.7303543432395!2d52.40935561538992!3d55.728438101339044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ff1e0aa00315b%3A0xd1c88d987edf6261!2z0J3QsNCx0LXRgNC10LbQvdC-0YfQtdC70L3QuNC90YHQutC40Lkg0L_QtdC00LDQs9C-0LPQuNGH0LXRgdC60LjQuSDQutC-0LvQu9C10LTQtg!5e0!3m2!1sru!2sru!4v1669992777266!5m2!1sru!2sru"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="contacts-few">
                    <div>
                        <p>Адрес:</p>
                        <p>пр-т. P. Беляева, 3, Набережные Челны, Респ. Татарстан, 423812</p>
                    </div>
                    <div>
                        <p>Контакты:</p>
                        <p>Телефон: 88552583022</p>
                    </div>
                    <div>
                        <p>Официальный сайт</p>
                        <a href="https://pedcollchelny.ru/" target="_blank">https://pedcollchelny.ru/</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
