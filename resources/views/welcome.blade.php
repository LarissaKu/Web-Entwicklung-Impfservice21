<!DOCTYPE html>
<html>
<head>
    <title>Impfservice</title>
</head>
<body>
    <ul>
        @foreach($vacdates as $vacdate)
            <li>{{$vacdate}}</li>
        @endforeach
    </ul>
</body>
</html>
