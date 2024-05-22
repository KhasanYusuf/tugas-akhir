@extends('navbar')

@section('konten')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Results</title>
    
</head>
<body>
    <h1 align="center">Prediction Results</h1>
    
    <h2 align="center">Predicted Label (hanya dari satu instances)</h2>
    <p align="center">{{ $predictedLabel }}</p>

    <h2 align="center">Accuracy</h2>
    <p align="center">{{ $accuracy }}</p>
    <h1 align="center">Confusion Matrix</h1>
    <table border="2" align="center">
        <tr>
            <th></th>
            @foreach ($classes as $class)
                <th>original {{ $class }}</th>
            @endforeach
        </tr>
        @foreach ($confusionMatrix as $trueClass => $row)
            <tr>
                <td><b>predicted {{ $classes[$trueClass] }}</b></td>
                @foreach ($row as $predictedClass => $count)
                    <td>{{ $count }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
@endsection