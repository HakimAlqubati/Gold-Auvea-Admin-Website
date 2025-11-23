<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgtaAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'kicker',
        'kicker_ar',
        'title',
        'title_ar',
        'description_top',
        'description_top_ar',
        'description_bottom',
        'description_bottom_ar',
        'note',
        'note_ar',
        'drawing_image',
        'final_piece_image',
        'is_active',
    ];
}
