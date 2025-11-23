<?php
// app/Models/Workflow.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workflow extends Model
{
    use HasFactory;

    // تحديد الأعمدة القابلة للتعبئة مباشرة (Fillable)
    protected $fillable = [
        'kicker',
        'kicker_ar',
        'title',
        'title_ar',
        'description',
        'description_ar',
    ];
    // تحديد العلاقة: سير العمل الواحد يحتوي على عدة مراحل (WorkflowPhase)
    public function phases(): HasMany
    {
        // استخدام orderBy('index') لضمان أن المراحل تظهر بالترتيب الصحيح (1، 2، 3، 4)
        return $this->hasMany(WorkflowPhase::class)->orderBy('index');
    }
}
