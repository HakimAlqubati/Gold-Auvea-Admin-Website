<?php
// database/migrations/..._create_workflow_phases_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workflow_phases', function (Blueprint $table) {
            $table->id();
            // المفتاح الأجنبي يربط بجدول workflows، onDelete('cascade') لحذف المراحل تلقائياً عند حذف سير العمل
            $table->foreignId('workflow_id')->constrained('workflows')->onDelete('cascade');

            $table->unsignedTinyInteger('index')->comment('Phase number: 1, 2, 3, 4');
            $table->string('title', 255);
            $table->string('tags', 255)->nullable()->comment('Tools or key features like Rhino, STL');
            $table->text('description');
            $table->timestamps();

            // ضمان أن رقم المرحلة فريد ضمن نفس سير العمل
            $table->unique(['workflow_id', 'index']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workflow_phases');
    }
};
