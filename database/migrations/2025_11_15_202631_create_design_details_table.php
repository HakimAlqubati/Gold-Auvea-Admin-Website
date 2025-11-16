<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('design_details', function (Blueprint $table) {
            $table->id();
            // المفتاح الخارجي للربط بجدول designs
            $table->foreignId('design_id')->constrained('designs')->onDelete('cascade');
            
            $table->string('gold_karat', 10)->nullable();
            $table->decimal('estimated_weight', 8, 2)->nullable()->comment('Weight in grams');
            $table->integer('stone_count')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('design_details');
    }
};