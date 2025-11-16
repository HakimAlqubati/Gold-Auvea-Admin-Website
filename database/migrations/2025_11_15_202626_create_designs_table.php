<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            // المفتاح الخارجي للربط بجدول categories
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->string('cad_file_path')->nullable()->comment('Path to the STL or 3DM file');
            $table->string('preview_image')->nullable()->comment('Path to the visual image displayed on the card');
            $table->boolean('is_round_image')->default(false)->comment('Flag to apply round styling to the image');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};