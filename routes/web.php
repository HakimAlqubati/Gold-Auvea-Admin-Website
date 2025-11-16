<?php

use App\Http\Controllers\DesignController;
use App\Http\Controllers\HomeController; // استدعاء Controller الجديد
use Illuminate\Support\Facades\Route;

// المسار الجذر (/) الآن يستخدم HomeController لجلب البيانات
Route::get('/', [HomeController::class, 'index'])->name('home');

// المسار الخاص بصفحة المجموعات الكاملة (إذا كانت منفصلة)
Route::get('/collections', [DesignController::class, 'index'])->name('designs.index');