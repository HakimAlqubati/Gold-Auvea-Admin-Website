<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Design;
use App\Models\DesignDetail;

return new class extends Migration
{
    /**
     * تشغيل الهجرة (إضافة البيانات).
     */
    public function up(): void
    {
        // 1. إنشاء بيانات الفئات (Categories)
        $categoriesData = [
            ['name_ar' => 'مجموعات الزفاف الفاخرة', 'name_en' => 'Luxury Bridal Sets', 'slug' => 'luxury-bridal-sets', 'data_filter' => 'bridal'],
            ['name_ar' => 'خواتم الخطوبة والزواج', 'name_en' => 'Engagement & Bands', 'slug' => 'engagement-bands', 'data_filter' => 'rings'],
            ['name_ar' => 'مجوهرات الأسماء العربية', 'name_en' => 'Arabic Name Jewelry', 'slug' => 'arabic-name-jewelry', 'data_filter' => 'names'],
            ['name_ar' => 'خواتم الرجال والفضة', 'name_en' => 'Men’s Rings & Silver', 'slug' => 'men-silver', 'data_filter' => 'silver'],
            ['name_ar' => 'مجوهرات الأطفال والسحر', 'name_en' => 'Kid\'s Jewelry & Charms', 'slug' => 'kids-jewelry', 'data_filter' => 'kids'],
        ];

        // يتم حفظ الفئات واستردادها لربطها بالتصاميم
        $categories = [];
        foreach ($categoriesData as $data) {
            $category = Category::create($data);
            $categories[$data['data_filter']] = $category->id;
        }


        // 2. إنشاء بيانات التصاميم (Designs)
        $designsData = [
            [
                'category_filter' => 'bridal',
                'name_ar' => 'مجموعات الزفاف الفاخرة', 
                'name_en' => 'Luxury Bridal Sets', 
                'description_ar' => 'أطقم زفاف يمنية كاملة تشمل العقود والأساور والخواتم بأوزان وأبعاد متوازنة تمامًا.',
                'preview_image' => 'https://picsum.photos/350/280?random=11&sig=bridal',
                'is_round_image' => false,
            ],
            [
                'category_filter' => 'rings',
                'name_ar' => 'خواتم الخطوبة (CAD)', 
                'name_en' => 'Engagement Rings (CAD)', 
                'description_ar' => 'تصاميم مفصلة لخواتم الخطوبة والماس مع إعداد دقيق للأحجار ومقاس مريح.',
                'preview_image' => 'https://picsum.photos/350/280?random=12&sig=ring',
                'is_round_image' => true,
            ],
            [
                'category_filter' => 'names',
                'name_ar' => 'مجوهرات الأسماء العربية', 
                'name_en' => 'Arabic Name Jewelry', 
                'description_ar' => 'تصاميم خط عربي معقدة للقلائد والأساور، مُحسّنة بالكامل لورش العمل بالليزر.',
                'preview_image' => 'https://picsum.photos/350/280?random=13&sig=arabicname',
                'is_round_image' => false,
            ],
            [
                'category_filter' => 'silver',
                'name_ar' => 'خواتم الرجال والفضة', 
                'name_en' => 'Men’s Rings & Silver', 
                'description_ar' => 'نماذج ثلاثية الأبعاد دقيقة لخواتم وإكسسوارات الفضة للرجال بهيكل قوي وأشكال جذابة.',
                'preview_image' => 'https://picsum.photos/350/280?random=14&sig=silver',
                'is_round_image' => false,
            ],
            [
                'category_filter' => 'rings',
                'name_ar' => 'حلقات بافيه الحديثة', 
                'name_en' => 'Modern Pave Bands', 
                'description_ar' => 'تصاميم بافيه حديثة والماس العنقودي، مُحسّنة لضمان تثبيت آمن للأحجار الصغيرة.',
                'preview_image' => 'https://picsum.photos/350/280?random=15&sig=diamond',
                'is_round_image' => false,
            ],
            [
                'category_filter' => 'kids',
                'name_ar' => 'مجوهرات الأطفال والسحر', 
                'name_en' => 'Kid\'s Jewelry & Charms', 
                'description_ar' => 'نماذج ثلاثية الأبعاد مخصصة لإكسسوارات الأطفال الآمنة والخفيفة، بما في ذلك الأقراط والمعلقات.',
                'preview_image' => 'https://picsum.photos/350/280?random=16&sig=kids',
                'is_round_image' => false,
            ],
            [
                'category_filter' => 'bridal',
                'name_ar' => 'الزخارف الذهبية التقليدية', 
                'name_en' => 'Traditional Gold Motifs', 
                'description_ar' => 'تصاميم للمجوهرات الذهبية التقليدية الثقيلة والنقوش الكلاسيكية، مع الحفاظ على معايير CAD الحديثة.',
                'preview_image' => 'https://picsum.photos/350/280?random=17&sig=traditional',
                'is_round_image' => false,
            ],
            [
                'category_filter' => 'rings',
                'name_ar' => 'المعلقات الراقية', 
                'name_en' => 'High-End Pendants', 
                'description_ar' => 'تصاميم لقلادات الماس والأحجار الكريمة الفاخرة، جاهزة للطباعة التقنية عالية الجودة.',
                'preview_image' => 'https://picsum.photos/350/280?random=18&sig=luxury',
                'is_round_image' => false,
            ],
        ];

        // حفظ التصاميم وتفاصيلها
        foreach ($designsData as $data) {
            $design = Design::create([
                'category_id' => $categories[$data['category_filter']],
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'description_ar' => $data['description_ar'],
                'preview_image' => $data['preview_image'],
                'is_round_image' => $data['is_round_image'],
            ]);

            // 3. إنشاء تفاصيل التصميم (DesignDetails)
            DesignDetail::create([
                'design_id' => $design->id,
                'gold_karat' => '21k',
                'estimated_weight' => rand(5, 50) + (rand(0, 99) / 100), // وزن عشوائي بين 5.00 و 50.99
                'stone_count' => rand(0, 50),
            ]);
        }
    }

    /**
     * التراجع عن الهجرة (حذف البيانات فقط، لأن الجداول تبقى في ملفات الهجرة الأخرى).
     */
    public function down(): void
    {
        // لحذف البيانات المضافة فقط دون حذف الجداول نفسها
        DB::table('design_details')->truncate();
        DB::table('designs')->truncate();
        DB::table('categories')->truncate();
    }
};