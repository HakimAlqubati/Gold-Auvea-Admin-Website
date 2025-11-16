<?php

// app/Models/WorkflowPhase.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkflowPhase extends Model
{
    use HasFactory;

    protected $fillable = [
        'workflow_id',
        'index',
        'title',
        'tags',
        'description',
    ];
    // تحديد العلاقة: المرحلة الواحدة تنتمي إلى سير عمل واحد (Workflow)
    public function workflow(): BelongsTo
    {
        return $this->belongsTo(Workflow::class);
    }
}
