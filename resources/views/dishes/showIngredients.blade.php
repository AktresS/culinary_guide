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
<h2>{{$dish ? "Блюдо - ".$dish->name : "Неверный ID блюда" }}</h2>
<table border="1">
    <thead>
    <tr>
        <td>id</td>
        <td>Ингредиент</td>
        <td>Количество</td>
        <td>Ед. измерения</td>
    </tr>
    </thead>

    @foreach($dish->ingredient as $ingredient)
        <tr>
            <td>{{$ingredient->id}}</td>
            <td>{{$ingredient->name}}</td>
            <td>{{$ingredient->pivot->amount}}</td>
            <td>{{$ingredient->unit}}</td>
        </tr>
    @endforeach

</table>

</body>
</html>
