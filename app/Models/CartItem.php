<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'design_id',
        'quantity',
        'price',
        'customization',
    ];

    protected $casts = [
        'customization' => 'array',
        'price' => 'decimal:2',
    ];

    /**
     * العلاقة: العنصر ينتمي لسلة
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * العلاقة: العنصر ينتمي لتصميم
     */
    public function design(): BelongsTo
    {
        return $this->belongsTo(Design::class);
    }

    /**
     * حساب المجموع الفرعي للعنصر
     */
    public function getSubtotalAttribute(): float
    {
        return $this->price * $this->quantity;
    }
}
