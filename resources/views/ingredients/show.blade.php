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
<h2>{{$ingredient ? "Ингредиент - ".$ingredient->name : "Неверный ID ингредиент" }}</h2>
    <table border="1">
        <thead>
        <tr>
            <td>id</td>
            <td>Блюдо</td>
            <td>Количество (ингредиента)</td>
            <td>Ед. измерения</td>
        </tr>
        </thead>

            @foreach($ingredient->dish as $dish)
                <tr>
                    <td>{{$dish->id}}</td>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->pivot->amount}}</td>
                    <td>{{$ingredient->unit}}</td>
                </tr>
            @endforeach

    </table>

</body>
</html>
