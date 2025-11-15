<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home'); // 'home' يشير إلى الملف home.blade.php داخل resources/views
});
