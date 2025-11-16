<?php
// database/migrations/..._insert_initial_workflow_data.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // استخدام واجهة DB لإدخال البيانات

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. إدخال بيانات Workflow الرئيسي (جدول workflows)
        // نستخدم DB::table() لإدخال البيانات مباشرة
        $workflowId = DB::table('workflows')->insertGetId([
            'kicker' => 'DIGITAL PRECISION FROM CONCEPT TO PRODUCTION',
            'title' => 'Seamless 4-Step 3D Design Workflow',
            'description' => 'We ensure a clear and optimized digital workflow tailored to meet the needs of jewelry workshops and shops across Yemen. From initial concept to final casting files, we deliver the necessary speed and accuracy.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. إدخال بيانات مراحل Workflow الأربع (جدول workflow_phases)
        $phases = [
            [
                'workflow_id' => $workflowId,
                'index' => 1,
                'title' => 'Design Brief & Specifications',
                'tags' => 'WhatsApp • Sketch • Reference Image',
                'description' => 'You provide your design concept (photo, sketch, or sample) along with precise details: metal karat (18K-24K), estimated weights, stone information, and required sizes. We confirm the scope and delivery timeline.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'workflow_id' => $workflowId,
                'index' => 2,
                'title' => 'High-Accuracy CAD Modeling',
                'tags' => 'Rhino • MatrixGold Optimization',
                'description' => 'We build a dimensionally perfect 3D model, fully optimized for casting and 3D printing. We guarantee correct metal thickness and precise geometry for stone settings and durability.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'workflow_id' => $workflowId,
                'index' => 3,
                'title' => 'Realistic Client Presentation',
                'tags' => 'Hyper-Realistic Renders & 360°',
                'description' => 'You receive stunning, hyper-realistic images and optional turntable previews to present to your client. We handle minor modifications swiftly until the design receives final approval.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'workflow_id' => $workflowId,
                'index' => 4,
                'title' => 'Production-Ready Files',
                'tags' => 'STL • 3DM • Weight Calculation',
                'description' => 'We deliver clean STL and 3DM files ready for immediate printing or molding. We provide technical support for the casting process and future adjustments to weight or size as needed.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('workflow_phases')->insert($phases);
    }

    /**
     * Reverse the migrations (Delete data on rollback).
     */
    public function down(): void
    {
        // لحذف البيانات عند التراجع، نعتمد على محتوى Title لسير العمل الرئيسي
        $workflowId = DB::table('workflows')
            ->where('title', 'Seamless 4-Step 3D Design Workflow')
            ->value('id');

        if ($workflowId) {
            // حذف المراحل المرتبطة بسير العمل
            DB::table('workflow_phases')->where('workflow_id', $workflowId)->delete();
            // حذف سجل سير العمل الرئيسي
            DB::table('workflows')->where('id', $workflowId)->delete();
        }
    }
};
