<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name_ar', 'name_en', 'description_ar', 
        'cad_file_path', 'preview_image', 'is_round_image'
    ];
    
    // لضمان تحويل القيمة is_round_image إلى قيمة منطقية (Boolean)
    protected $casts = [
        'is_round_image' => 'boolean',
    ];

    /**
     * العلاقة: تصميم واحد (Design) ينتمي إلى فئة واحدة (Category).
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * العلاقة: تصميم واحد (Design) لديه تفاصيل واحدة (DesignDetail).
     */
    public function details(): HasOne
    {
        return $this->hasOne(DesignDetail::class);
    }
}