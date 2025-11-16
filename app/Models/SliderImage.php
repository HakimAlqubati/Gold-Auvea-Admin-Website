<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'alt_text',
        'title_ar',
        'caption_ar',
        'link_url',
        'sort_order',
        'is_active',
    ];
    
    // لضمان تحويل القيمة is_active إلى قيمة منطقية (Boolean)
    protected $casts = [
        'is_active' => 'boolean',
    ];
}