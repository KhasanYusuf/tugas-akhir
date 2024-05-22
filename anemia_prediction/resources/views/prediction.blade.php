<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Form</title>
</head>
<body>
    <h1>Prediction Form</h1>
    <form method="POST" action="{{ route('predict') }}">
        @csrf
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value=0 >Male</option>
            <option value=1 >Female</option>
        </select><br><br>
        <label for="hemoglobin">Hemoglobin:</label>
        <input type="text" name="hemoglobin" id="hemoglobin"><br><br>
        <label for="mch">MCH:</label>
        <input type="text" name="mch" id="mch"><br><br>
        <label for="mchc">MCHC:</label>
        <input type="text" name="mchc" id="mchc"><br><br>
        <label for="mcv">MCV:</label>
        <input type="text" name="mcv" id="mcv"><br><br>
        <button type="submit">Predict</button>
    </form>
    <br>
    @if (session('predictedLabel'))
        <div>
            <h2>Predicted Result:</h2>
            <p>{{ session('predictedLabel') }}</p>
        </div>
    @endif
    @if (session('accuracy'))
        <div>
            <h2>Accuracy:</h2>
            <p>{{ session('accuracy') }}</p>
        </div>
    @endif
</body>
</html>
