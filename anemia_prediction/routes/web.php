<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Training;

Route::get('/', function () {
    return view('home');
});
Route::get('/beranda', function () {
    return view('home');
});
Route::get('/prediksi', function () {
    return view('predict');
});
Route::get('/data-latih', function () {
    return view('data');
});
Route::get('/hasil', function () {
    return view('output');
});

Route::get('/accuracy', [Training::class, 'naiveBayes'])->name('accuracy');
Route::post('/predict', [Training::class, 'predict'])->name('predict');
