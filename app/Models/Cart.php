<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /**
     * العلاقة: السلة تنتمي لمستخدم (اختياري)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * العلاقة: السلة تحتوي على عدة عناصر
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * حساب إجمالي السلة
     */
    public function getTotalAttribute(): float
    {
        return $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }

    /**
     * حساب عدد العناصر في السلة
     */
    public function getItemsCountAttribute(): int
    {
        return $this->items->sum('quantity');
    }
}
