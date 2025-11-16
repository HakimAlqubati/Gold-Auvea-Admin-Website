<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SliderImage;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * تشغيل الهجرة (إضافة البيانات).
     */
    public function up(): void
    {
        $sliderData = [
            [
                'image_path' => 'https://picsum.photos/1200/600?random=11',
                'alt_text' => 'High-End Diamond Necklace CAD',
                'title_ar' => 'تصاميم مجوهرات مخصصة',
                'caption_ar' => 'نقدم نماذج CAD ثلاثية الأبعاد بجودة عالية تناسب الأسواق اليمنية.',
                'link_url' => '/designs',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=22',
                'alt_text' => 'Luxury Diamond Rings Collection',
                'title_ar' => 'خواتم ماس فاخرة',
                'caption_ar' => 'اكتشف مجموعتنا الحصرية من خواتم الخطوبة بتصاميم عصرية.',
                'link_url' => '/collections?filter=rings',
                'sort_order' => 20,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=33',
                'alt_text' => 'Traditional Yemeni Gold Sets',
                'title_ar' => 'أطقم ذهب تقليدية يمنية',
                'caption_ar' => 'تصاميم بأوزان مثالية ومعايير هندسية دقيقة لورش العمل المحلية.',
                'link_url' => '/collections?filter=bridal',
                'sort_order' => 30,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=44',
                'alt_text' => 'Detailed 3D Pave Setting Model',
                'title_ar' => 'تقنية ترصيع البافيه الدقيقة',
                'caption_ar' => 'تفاصيل هندسية تضمن ثبات الأحجار الصغيرة وجودة المنتج النهائي.',
                'link_url' => '/details/pave-model',
                'sort_order' => 40,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=55',
                'alt_text' => 'Custom Arabic Calligraphy Jewelry',
                'title_ar' => 'مجوهرات خط عربي فريدة',
                'caption_ar' => 'تصميمات أسماء ونقوش عربية جاهزة للقطع بالليزر بأقصى دقة.',
                'link_url' => '/collections?filter=names',
                'sort_order' => 50,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=66',
                'alt_text' => 'Gents Silver Ring with Stone CAD',
                'title_ar' => 'خواتم فضة رجالية',
                'caption_ar' => 'موديلات عصرية وكلاسيكية لخواتم الفضة الرجالية والأحجار الكريمة.',
                'link_url' => '/collections?filter=silver',
                'sort_order' => 60,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=77',
                'alt_text' => 'Lightweight Kids Jewelry Models',
                'title_ar' => 'تصاميم مجوهرات الأطفال',
                'caption_ar' => 'إكسسوارات خفيفة وآمنة للأطفال، أقراط ومعلقات بأسعار مناسبة.',
                'link_url' => '/collections?filter=kids',
                'sort_order' => 70,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=88',
                'alt_text' => 'High Polish Gold Bangle Design',
                'title_ar' => 'أساور ذهبية لامعة',
                'caption_ar' => 'نماذج ثلاثية الأبعاد لأساور الذهب بتصميمات مريحة وتلميع عالي.',
                'link_url' => '/collections?filter=bridal',
                'sort_order' => 80,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=99',
                'alt_text' => 'Gemstone Cluster Ring CAD',
                'title_ar' => 'خواتم مرصعة بالأحجار الكريمة',
                'caption_ar' => 'تصاميم عنقودية تجمع بين الذهب الأبيض والأحجار الملونة.',
                'link_url' => '/collections?filter=rings',
                'sort_order' => 90,
                'is_active' => true,
            ],
            [
                'image_path' => 'https://picsum.photos/1200/600?random=101',
                'alt_text' => 'CAD Service Landing Page Banner',
                'title_ar' => 'خدمة النمذجة المخصصة',
                'caption_ar' => 'أرسل لنا فكرتك، وسنتولى تحويلها إلى ملف CAD جاهز للتصنيع.',
                'link_url' => '/request-design',
                'sort_order' => 100,
                'is_active' => true,
            ],
        ];

        foreach ($sliderData as $data) {
            SliderImage::create($data);
        }
    }

    /**
     * التراجع عن الهجرة (حذف البيانات).
     */
    public function down(): void
    {
        // لحذف البيانات المضافة فقط دون حذف الجدول نفسه
        DB::table('slider_images')->truncate();
    }
};