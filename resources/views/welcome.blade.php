<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section class="books">
    <div class="container">
        <h1>Книги</h1>
        <ul class="books__list">
            @foreach($books as $book)
                <li>
                    <h2>{{$book->name}}</h2>
                    <img src="{{asset('public/storage/' . $book->image)}}" alt="{{$book->name}}">
                    <p>Автор:</p>
                    <p>{{$book->author}}</p>
                    <p>Жанр:</p>
                    <p>{{$book->genre}}</p>
                    <p>rack</p>
                    <p>{{$book->rack}}</p>
                    <p>shelf</p>
                    <p>{{$book->shelf}}</p>
                    <p>row</p>
                    <p>{{$book->row}}</p>
                    <p>Описание:</p>
                    <p>{{$book->description}}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>


</body>
</html>
