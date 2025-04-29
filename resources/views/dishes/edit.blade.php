<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>609-21</title>
    <style> .is-invalid {
            color: red;
        }
    </style>

</head>
<body>
<h2>Добавление блюда</h2>
<form action="{{ route('dishes.update', $dish->id) }}" method="post">
    @csrf
    @method('patch')
    <div>
        <label>Название блюда</label>
        <input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$dish->name}} @endif">
        @error('name')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Категория</label>
        <select name="category_id">
            <option style="display:none">
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                        @if(old('category_id'))
                            @if(old('category_id') == $category->id) selected @endif
                        @else
                            @if($dish->category_id == $category->id) selected @endif
                        @endif >{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Способ приготовления</label>
        <textarea name="cooking_method">@if (old('cooking_method')) {{old('cooking_method')}} @else {{$dish->cooking_method}} @endif</textarea>
        @error('cooking_method')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Время приготовления</label>
        <input type="text" name="cooking_time" value="@if (old('cooking_time')) {{old('cooking_time')}} @else {{$dish->cooking_time }} @endif">
        @error('cooking_time')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    </div>
    <br>
    <div>
        <input type="submit" style="margin-right: 10px">
        <a href="{{route('dishes.index')}}">Назад</a>
    </div>
</form>
</body>
</html>
