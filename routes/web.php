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

// Cart routes
use App\Http\Controllers\CartController;

Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::put('/update/{itemId}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{itemId}', [CartController::class, 'remove'])->name('remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    Route::get('/', [CartController::class, 'getCart'])->name('get');
    Route::get('/count', [CartController::class, 'getCount'])->name('count');
    Route::get('/items', [CartController::class, 'getCartItemIds'])->name('items');
});
