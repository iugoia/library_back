<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Экспорт таблицы с бронированиями</title>
</head>
<body>
<main>
    <style>
        .main_table th, .main_table td {
            padding: 10px 30px;
        }
        .main_table {
            text-align: center;
            font-weight: 500;
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 5px 20px rgba(21, 37, 66, 0.15);
        }
        .main_table_heading {
            font-weight: 700;
            color: rgba(150, 144, 169, 1);
            background: #F9F8FC;
        }
        body {
            background-color: #F5F6F6;
            font-family: "Montserrat";
            color: #3D3D3D;
            font-weight: 500;
        }
        .table_image_ctn img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .table_image_ctn {
            width: 50px;
            height: 50px;
        }
        .table_image_text {
            display: flex;
            align-items: center;
        }
    </style>
    <section style="margin: 40px 0;">
            <h1 style="margin: 20px 0;">Все бронирования</h1>
            <table class="main_table">
                <tr class="main_table_heading">
                    <th>#ID</th>
                    <th>Книга</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Начало бронирования</th>
                    <th>Конец бронирования</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Телефон</th>
                    <th>Логин</th>
                    <th>Почта</th>
                </tr>

                <tdody>
                    @foreach($arrDataList as $item)
                        @php
                            $user = \App\Models\User::find($item['user_id']);
                            $book = \App\Models\Book::find($item['book_id']);
                            $author = \App\Models\Author::find($book->author_id);
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
                            <td>{{$author->name}}</td>
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
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->login}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                </tdody>
            </table>
    </section>
</main>
</body>
</html>
