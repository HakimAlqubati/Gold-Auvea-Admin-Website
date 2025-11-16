<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'slug', 'data_filter', 'is_active'];

    /**
     * العلاقة: فئة واحدة (Category) لديها العديد من التصاميم (Designs).
     */
    public function designs(): HasMany
    {
        return $this->hasMany(Design::class);
    }
}