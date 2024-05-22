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
    <h2 style="margin-top: 50px;text-align: center;">Prediksi Anemia</h2><br>
    @if (session('predictedLabel'))
    <div>
        <h2 align="center">Hasil:</h2>
        <p align="center">{{ session('predictedLabel') }}</p>
    </div>
@endif
    <div class="container" >
        <form method="POST" action="{{ route('predict') }}">
            @csrf
            <div class="form-group row mb-3">
                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Pilih Gender</option>
                        <option value="0">Laki-laki</option>
                        <option value="1">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="hemoglobin" class="col-sm-4 col-form-label">Hemoglobin</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="hemoglobin" name="hemoglobin" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="mchc" class="col-sm-4 col-form-label">MCHC</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="mchc" name="mchc" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="mcv" class="col-sm-4 col-form-label">MCV</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="mcv" name="mcv" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="mch" class="col-sm-4 col-form-label">MCH</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="mch" name="mch" required>
                </div>
            </div>

            <div style="margin-top: 50px">
                <button type="submit" class="btn btn-danger w-100" margin-top="100px"></i> KIRIM</button>
            </div>
        </form>
    </div>
    </div>

</body>

</html>


@endsection