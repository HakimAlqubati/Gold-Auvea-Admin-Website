<?php

namespace Database\Seeders;

use App\Models\DigitalPrototypingFeature;
use Illuminate\Database\Seeder;

class DigitalPrototypingFeatureSeeder extends Seeder
{
    public function run()
    {
        DigitalPrototypingFeature::create([
            // English fields
            'kicker_text' => 'CAD & Production Planning',
            'main_title' => 'Digital Prototyping: Visualize Your Masterpiece',
            'section_heading' => 'From Sketch to Solid File',
            'paragraph_1_en' => 'We translate your creative vision into reality through three crucial digital stages. This meticulous process guarantees absolute accuracy, perfect geometry for casting, and empowers you to present a stunning, realistic preview to your client long before any physical gold is utilized.',
            'paragraph_2_en' => 'The final delivery package includes all necessary manufacturing files (STL, 3DM) to ensure your local workshop can immediately commence printing or mold making without encountering any structural errors or design compromises.',

            // Arabic fields
            'kicker_text_ar' => 'تصميم CAD وتخطيط الإنتاج',
            'main_title_ar' => 'النماذج الرقمية: تصور تحفتك الفنية',
            'section_heading_ar' => 'من الرسم إلى الملف الصلب',
            'paragraph_1_ar' => 'نترجم رؤيتك الإبداعية إلى واقع من خلال ثلاث مراحل رقمية حاسمة. تضمن هذه العملية الدقيقة دقة مطلقة، وهندسة مثالية للصب، وتمكنك من تقديم معاينة واقعية مذهلة لعميلك قبل وقت طويل من استخدام أي ذهب فعلي.',
            'paragraph_2_ar' => 'تتضمن حزمة التسليم النهائية جميع ملفات التصنيع الضرورية (STL، 3DM) لضمان أن ورشتك المحلية يمكنها البدء فوراً في الطباعة أو صنع القوالب دون مواجهة أي أخطاء هيكلية أو تنازلات في التصميم.',

            // Image URLs
            'image_hero_url' => 'https://picsum.photos/1200/600?random=88',
            'image_detail_url' => 'https://picsum.photos/1200/600?random=89',
            'image_production_url' => 'https://picsum.photos/1200/600?random=90',
        ]);
    }
}
