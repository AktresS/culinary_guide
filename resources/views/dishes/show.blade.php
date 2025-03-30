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
<h2>{{$dish ? $dish->category->name." - ".$dish->name : "Неверный ID блюда" }}</h2>
@if($dish)
    <table border="1">
        <thead>
        <tr>
            <td>id</td>
            <td>Наименование</td>
            <td>Категория</td>
            <td>Способ приготовления</td>
            <td>Время приготовления</td>
        </tr>
        </thead>
            <tr>
                <td>{{$dish->id}}</td>
                <td>{{$dish->name}}</td>
                <td>{{$dish->category->name}}</td>
                <td>{{$dish->cooking_method}}</td>
                <td>{{$dish->cooking_time}}</td>
            </tr>
    </table>
@endif

</body>
</html>
