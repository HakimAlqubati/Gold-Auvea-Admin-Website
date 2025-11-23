<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalPrototypingFeature extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'digital_prototyping_features';

    protected $fillable = [
        'kicker_text',
        'main_title',
        'section_heading',
        'paragraph_1_en',
        'paragraph_2_en',
        // حقول الصور
        'image_hero_url',
        'image_detail_url',
        'image_production_url',
        // الحقول العربية
        'kicker_text_ar',
        'main_title_ar',
        'section_heading_ar',
        'paragraph_1_ar',
        'paragraph_2_ar',
    ];

    /**
     * الميزة لا تحتاج إلى علاقات خارجية في هذا التصميم البسيط، 
     * ولكنها جاهزة للاستخدام في المتحكم (Controller).
     */
}
