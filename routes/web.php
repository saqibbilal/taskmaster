<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/completed', function () {
    return view('completed');
});


Route::get('/pending', function () {
    return view('pending');
});
