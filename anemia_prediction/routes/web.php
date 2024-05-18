<?php

use Illuminate\Support\Facades\Route;

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
