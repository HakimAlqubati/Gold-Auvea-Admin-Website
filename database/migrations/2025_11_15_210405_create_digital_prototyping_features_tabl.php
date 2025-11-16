<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('digital_prototyping_features', function (Blueprint $table) {
            $table->id();
            
            // بيانات العنوان الرئيسي (من: {{-- Enhanced Title and Kicker --}})
            $table->string('kicker_text')->default('CAD & Production Planning');
            $table->string('main_title')->default('Digital Prototyping: Visualize Your Masterpiece');
            
            // بيانات محتوى النص (من: {{-- Text Content --}})
            $table->string('section_heading')->default('From Sketch to Solid File');
            $table->text('paragraph_1_en'); // "We translate your creative vision..."
            $table->text('paragraph_2_en'); // "The final delivery package includes..."
            
            // حقول الصور الثابتة الثلاثة (من: {{-- Image Stack --}})
            $table->string('image_hero_url');        // Layer 1: The Final Render
            $table->string('image_detail_url')->nullable(); // Layer 2: Close-up Wireframe/Detail
            $table->string('image_production_url')->nullable(); // Layer 3: Wax Print/File Preview
            
            // قد تحتاج إلى حقول عربية إذا كان الموقع متعدد اللغات
            $table->string('kicker_text_ar')->nullable();
            $table->string('main_title_ar')->nullable();
            $table->text('paragraph_1_ar')->nullable();
            $table->text('paragraph_2_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_prototyping_features');
    }
};