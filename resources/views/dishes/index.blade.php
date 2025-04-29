<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>609-21</title>
</head>
<body>
<h2>Список блюд: </h2>

<table border="1">
    <thead>
        <tr>
            <td>id</td>
            <td>Наименование</td>
            <td>Категория</td>
            <td>Способ приготовления</td>
            <td>Время <br>приготовления</td>
            <td>Действия</td>
        </tr>
    </thead>
    @foreach($dishes as $dish)
        <tr>
            <td>{{$dish->id}}</td>
            <td>{{$dish->name}}</td>
            <td>{{$dish->category->name}}</td>
            <td>{{$dish->cooking_method}}</td>
            <td>{{$dish->cooking_time}}</td>

            <td>
                <a href="{{route('dishes.edit', $dish->id)}}">Редактировать</a>

                <form action="{{route('dishes.destroy', $dish->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <br>
                    <input type="submit" value="Удалить">
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br>
<div>
    <a href="{{route('dishes.create')}}">Добавить блюдо</a>
</div>
<div>
    {{$dishes->links()}}
</div>
</body>
</html>
