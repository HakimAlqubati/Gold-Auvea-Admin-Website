<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesignDetail extends Model
{
    use HasFactory;

    protected $fillable = ['design_id', 'gold_karat', 'estimated_weight', 'stone_count'];

    /**
     * العلاقة: تفاصيل واحدة (DesignDetail) تنتمي إلى تصميم واحد (Design).
     */
    public function design(): BelongsTo
    {
        return $this->belongsTo(Design::class);
    }
}