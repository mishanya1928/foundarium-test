<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/script.js')}}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Автомобиль</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="action-cell">
                            @if($car = $user->getCar)
                                {{$car->brand}} {{$car->model}} <a class="remove" href="/api/clear/{{ $car->id }}" title="Удалить автомобиль">&times;</a>
                            @else
                                <select name="select-car" data-uid="{{ $user->id }}">
                                    <option selected disabled>Выберете автомобиль</option>
                                    @foreach($cars as $car)
                                        <option value="{{$car->id}}">{{$car->brand}} {{$car->model}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
