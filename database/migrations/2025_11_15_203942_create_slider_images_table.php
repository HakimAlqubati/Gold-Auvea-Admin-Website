<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('slider_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('alt_text', 255);
            $table->string('title_ar', 150)->nullable();
            $table->text('caption_ar')->nullable();
            $table->string('link_url')->nullable();
            $table->integer('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slider_images');
    }
};