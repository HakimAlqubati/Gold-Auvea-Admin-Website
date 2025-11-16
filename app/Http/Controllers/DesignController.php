<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * عرض صفحة مجموعات التصاميم.
     */
    public function index()
    {
        // 1. جلب الفئات (Categories) لاستخدامها في فلاتر الصفحة
        $categories = Category::select('name_en', 'data_filter')->where('is_active', true)->get();

        // 2. جلب جميع التصاميم مع العلاقة الخاصة بالفئة
        // نستخدم eager loading (with('category')) لتقليل عدد استعلامات قاعدة البيانات
        $designs = Design::with('category')->get();

        return view('collections.index', compact('categories', 'designs'));
    }
}