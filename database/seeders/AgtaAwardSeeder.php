<?php

namespace Database\Seeders;

use App\Models\AgtaAward;
use Illuminate\Database\Seeder;

class AgtaAwardSeeder extends Seeder
{
    public function run()
    {
        AgtaAward::create([
            'kicker' => 'Showcase of Expertise & Artistry',
            'kicker_ar' => 'معرض الخبرة والفن',
            'title' => 'My AGTA Spectrum Award-Winning Piece.',
            'title_ar' => 'قطعتي الفائزة بجائزة AGTA Spectrum.',
            'description_top' => 'This prestigious 2017 award-winning piece featured a **Fabulous Golden South Seas Pearl** masterfully set in a combination of **Platinum and 18K gold**, accented with white and yellow diamonds.',
            'description_top_ar' => 'تميزت هذه القطعة المرموقة الحائزة على جائزة عام 2017 بـ **لؤلؤة بحر الجنوب الذهبية الرائعة** مثبتة ببراعة في مزيج من **البلاتين والذهب عيار 18 قيراط**، ومزينة بالألماس الأبيض والأصفر.',
            'description_bottom' => 'This design showcases the high level of detail, precision, and artistry we bring to every CAD project, ensuring the final piece matches the original vision exactly.',
            'description_bottom_ar' => 'يعرض هذا التصميم المستوى العالي من التفاصيل والدقة والفن الذي نقدمه لكل مشروع CAD، مما يضمن تطابق القطعة النهائية مع الرؤية الأصلية تماماً.',
            'note' => 'From initial concept and design to the final, finished masterpiece.',
            'note_ar' => 'من المفهوم الأولي والتصميم إلى التحفة النهائية المكتملة.',
            'drawing_image' => 'https://picsum.photos/300/450?random=21&grayscale&blur=1',
            'final_piece_image' => 'https://picsum.photos/500/500?random=22&sig=goldpiece',
            'is_active' => true,
        ]);
    }
}
