<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Design;
use App\Models\DigitalPrototypingFeature;
use App\Models\SliderImage;
use App\Models\Workflow;
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
        $categories = Category::select('name_en', 'name_ar', 'data_filter')->where('is_active', true)->get();

        // 3. جلب التصاميم (Designs)
        $designs = Design::with('category')->limit(8)->get();

        // 4. جلب بيانات سير العمل (Workflow) ومراحله (Phases)
        $workflow = Workflow::with('phases')->first();

        // 5. جلب بيانات قسم Digital Prototyping ⬅️ إضافة جديدة
        $prototypingFeature = DigitalPrototypingFeature::query()->first();

        // 6. جلب بيانات جائزة AGTA ⬅️ إضافة جديدة
        $agtaAward = \App\Models\AgtaAward::where('is_active', true)->first();

        // تمرير جميع البيانات إلى ملف home.blade.php
        return view('home', compact('categories', 'designs', 'sliderImages', 'workflow', 'prototypingFeature', 'agtaAward')); // ⬅️ تم تمرير المتغير الجديد
    }
}
