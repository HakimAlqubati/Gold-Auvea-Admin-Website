<?php

namespace Database\Seeders;

use App\Models\Workflow;
use App\Models\WorkflowPhase;
use Illuminate\Database\Seeder;

class WorkflowSeeder extends Seeder
{
    public function run()
    {
        // Create the main workflow with English and Arabic content
        $workflow = Workflow::create([
            'kicker' => 'DIGITAL PRECISION FROM CONCEPT TO PRODUCTION',
            'kicker_ar' => 'دقة رقمية من المفهوم إلى الإنتاج',
            'title' => 'Seamless 4-Step 3D Design Workflow',
            'title_ar' => 'سير عمل تصميم ثلاثي الأبعاد سلس من 4 خطوات',
            'description' => 'We ensure a clear and optimized digital workflow tailored to meet the needs of jewelry workshops and shops across Yemen. From initial concept to final casting files, we deliver the necessary speed and accuracy.',
            'description_ar' => 'نضمن سير عمل رقمي واضح ومحسّن مصمم خصيصاً لتلبية احتياجات ورش ومحلات المجوهرات في جميع أنحاء اليمن. من المفهوم الأولي إلى ملفات الصب النهائية، نقدم السرعة والدقة اللازمة.',
        ]);

        // Create the 4 phases with English and Arabic content
        $phases = [
            [
                'workflow_id' => $workflow->id,
                'index' => 1,
                'title' => 'Design Brief & Specifications',
                'title_ar' => 'موجز التصميم والمواصفات',
                'tags' => 'WhatsApp • Sketch • Reference Image',
                'tags_ar' => 'واتساب • رسم تخطيطي • صورة مرجعية',
                'description' => 'You provide your design concept (photo, sketch, or sample) along with precise details: metal karat (18K-24K), estimated weights, stone information, and required sizes. We confirm the scope and delivery timeline.',
                'description_ar' => 'تقدم مفهوم التصميم الخاص بك (صورة أو رسم تخطيطي أو عينة) مع تفاصيل دقيقة: عيار المعدن (18-24 قيراط)، الأوزان المقدرة، معلومات الأحجار، والأحجام المطلوبة. نؤكد النطاق والجدول الزمني للتسليم.',
            ],
            [
                'workflow_id' => $workflow->id,
                'index' => 2,
                'title' => 'High-Accuracy CAD Modeling',
                'title_ar' => 'نمذجة CAD عالية الدقة',
                'tags' => 'Rhino • MatrixGold Optimization',
                'tags_ar' => 'راينو • تحسين MatrixGold',
                'description' => 'We build a dimensionally perfect 3D model, fully optimized for casting and 3D printing. We guarantee correct metal thickness and precise geometry for stone settings and durability.',
                'description_ar' => 'نبني نموذجاً ثلاثي الأبعاد مثالياً من حيث الأبعاد، محسّن بالكامل للصب والطباعة ثلاثية الأبعاد. نضمن سمك المعدن الصحيح والهندسة الدقيقة لإعدادات الأحجار والمتانة.',
            ],
            [
                'workflow_id' => $workflow->id,
                'index' => 3,
                'title' => 'Realistic Client Presentation',
                'title_ar' => 'عرض واقعي للعميل',
                'tags' => 'Hyper-Realistic Renders & 360°',
                'tags_ar' => 'عروض واقعية للغاية و360 درجة',
                'description' => 'You receive stunning, hyper-realistic images and optional turntable previews to present to your client. We handle minor modifications swiftly until the design receives final approval.',
                'description_ar' => 'تتلقى صوراً مذهلة وواقعية للغاية ومعاينات دوارة اختيارية لتقديمها لعميلك. نتعامل مع التعديلات الطفيفة بسرعة حتى يحصل التصميم على الموافقة النهائية.',
            ],
            [
                'workflow_id' => $workflow->id,
                'index' => 4,
                'title' => 'Production-Ready Files',
                'title_ar' => 'ملفات جاهزة للإنتاج',
                'tags' => 'STL • 3DM • Weight Calculation',
                'tags_ar' => 'STL • 3DM • حساب الوزن',
                'description' => 'We deliver clean STL and 3DM files ready for immediate printing or molding. We provide technical support for the casting process and future adjustments to weight or size as needed.',
                'description_ar' => 'نقدم ملفات STL و3DM نظيفة جاهزة للطباعة أو القولبة الفورية. نقدم الدعم الفني لعملية الصب والتعديلات المستقبلية على الوزن أو الحجم حسب الحاجة.',
            ],
        ];

        foreach ($phases as $phaseData) {
            WorkflowPhase::create($phaseData);
        }
    }
}
