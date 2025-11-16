<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Design;
use App\Models\SliderImage;
use App\Models\Workflow; 
use App\Models\DigitalPrototypingFeature; // ⬅️ استدعاء الموديل الجديد
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. جلب بيانات السلايدر (Slider Images)
        $sliderImages = SliderImage::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // 2. جلب الفئات (Categories)
        $categories = Category::select('name_en', 'data_filter')->where('is_active', true)->get();

        // 3. جلب التصاميم (Designs)
        $designs = Design::with('category')->limit(8)->get();
        
        // 4. جلب بيانات سير العمل (Workflow) ومراحله (Phases)
        $workflow = Workflow::with('phases')->first();
        
        // 5. جلب بيانات قسم Digital Prototyping ⬅️ إضافة جديدة
        $prototypingFeature = DigitalPrototypingFeature::first();
        
        // تمرير جميع البيانات إلى ملف home.blade.php
        return view('home', compact('categories', 'designs', 'sliderImages', 'workflow', 'prototypingFeature')); // ⬅️ تم تمرير المتغير الجديد
    }
}