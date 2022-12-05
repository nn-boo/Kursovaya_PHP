<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Поздравляем с резервированием билетов на сайте 2sim!
    @foreach($body as $type)
        <p>
        <br>{{$type['name']}}
        <br>{{$type['desc']}}
        <br>{{$type['address']}}
        <br>{{$type['count']}}
        </p>
    @endforeach
</body>
</html>





