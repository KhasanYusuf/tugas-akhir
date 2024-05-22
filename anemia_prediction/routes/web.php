<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Training;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/train', [Training::class, 'naiveBayes'])->name('train');
Route::post('/predict', [Training::class, 'predict'])->name('predict');
