<!DOCTYPE html>
<html>
<head>
    <title>Impfservice</title>
</head>
<body>
<ul>
    @foreach($vacdates as $vacdate)
        <li><a href="vacdates/{{$vacdate->id}}">{{$vacdate->vacday}} {{$vacdate->start}} - {{$vacdate->end}}</a></li>
    @endforeach
</ul>
</body>
</html>
