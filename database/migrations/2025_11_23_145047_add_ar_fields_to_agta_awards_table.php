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
        Schema::table('agta_awards', function (Blueprint $table) {
            $table->string('kicker_ar')->nullable()->after('kicker');
            $table->string('title_ar')->nullable()->after('title');
            $table->text('description_top_ar')->nullable()->after('description_top');
            $table->text('description_bottom_ar')->nullable()->after('description_bottom');
            $table->string('note_ar')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agta_awards', function (Blueprint $table) {
            //
        });
    }
};
