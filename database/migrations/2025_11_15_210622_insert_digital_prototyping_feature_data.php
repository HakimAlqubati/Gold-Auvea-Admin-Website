<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('digital_prototyping_features')->insert([
            'kicker_text' => 'CAD & Production Planning',
            'main_title' => 'Digital Prototyping: Visualize Your Masterpiece',
            'section_heading' => 'From Sketch to Solid File',
            'paragraph_1_en' => "We translate your creative vision into reality through three crucial digital stages. This meticulous process guarantees absolute accuracy, perfect geometry for casting, and empowers you to present a stunning, realistic preview to your client long before any physical gold is utilized.",
            'paragraph_2_en' => "The final delivery package includes all necessary manufacturing files (STL, 3DM) to ensure your local workshop can immediately commence printing or mold making without encountering any structural errors or design compromises.",
            
            // حقول الصور المحدثة باستخدام روابط Picsum
            'image_hero_url' => 'https://picsum.photos/1200/600?random=88',
            'image_detail_url' => 'https://picsum.photos/1200/600?random=89',
            'image_production_url' => 'https://picsum.photos/1200/600?random=90',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('digital_prototyping_features')->where('main_title', 'Digital Prototyping: Visualize Your Masterpiece')->delete();
    }
};