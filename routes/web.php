<?php

use App\Http\Controllers\DesignController;
use App\Http\Controllers\HomeController; // استدعاء Controller الجديد
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

// المسار الجذر (/) الآن يستخدم HomeController لجلب البيانات
Route::get('/', [HomeController::class, 'index'])->name('home');

// المسار الخاص بصفحة المجموعات الكاملة (إذا كانت منفصلة)
Route::get('/collections', [DesignController::class, 'index'])->name('designs.index');

// Language switcher route
Route::get('/locale/{locale}', function ($locale) {
    // Validate locale
    if (!in_array($locale, ['ar', 'en'])) {
        abort(400);
    }
    
    // Store locale in session
    Session::put('locale', $locale);
    
    // Set app locale for current request
    App::setLocale($locale);
    
    // Redirect back to previous page
    return redirect()->back();
})->name('locale.switch');