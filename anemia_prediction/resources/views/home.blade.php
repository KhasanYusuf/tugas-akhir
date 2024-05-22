@extends('navbar')

@section('konten')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anemia Prediction</title>
    <link rel="stylesheet" href="css/new_home.css">
    <link rel="stylesheet" href="css/logreg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body>
    <form action="{{route('accuracy')}}" method="get"><button type="submit">train dataset</button></form>
    <a href="/prediksi">Laman Prediksi</a>
</body>

</html>


@endsection
