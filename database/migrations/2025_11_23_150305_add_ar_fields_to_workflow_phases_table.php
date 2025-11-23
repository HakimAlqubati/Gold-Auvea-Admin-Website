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
        Schema::table('workflow_phases', function (Blueprint $table) {
            $table->string('title_ar')->nullable()->after('title');
            $table->string('tags_ar')->nullable()->after('tags');
            $table->text('description_ar')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workflow_phases', function (Blueprint $table) {
            //
        });
    }
};
