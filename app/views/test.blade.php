<html>
<head>
</head>
<body>
@foreach($user as $data)
    {{ $data->username }}
@endforeach
</body>
</html>