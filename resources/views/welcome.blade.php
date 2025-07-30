<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>I Libri Inseriti</h2>

    <ul>
        @foreach ($libri as $libro)
            <li>{{ $libro->name }}</li>
        @endforeach
    </ul>
</body>

</html>
