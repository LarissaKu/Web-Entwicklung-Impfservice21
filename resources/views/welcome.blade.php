<!DOCTYPE html>
<html>
<head>
    <title>Impfservice</title>
</head>
<body>
    <ul>
        @foreach($vacdates as $vacdate)
            <li>{{$vacdate->vacday}} {{$vacdate->start}} - {{$vacdate->end}}</li>
        @endforeach
    </ul>
</body>
</html>
