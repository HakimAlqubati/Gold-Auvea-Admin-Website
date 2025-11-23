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
        Schema::table('digital_prototyping_features', function (Blueprint $table) {
            $table->string('section_heading_ar')->nullable()->after('section_heading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('digital_prototyping_features', function (Blueprint $table) {
            //
        });
    }
};
