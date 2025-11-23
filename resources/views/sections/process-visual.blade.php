<section class="section section-process" id="process">
    <div class="section-inner page-container">

        {{-- تحقق من وجود البيانات قبل العرض --}}
        @if ($prototypingFeature)

        {{-- Enhanced Title and Kicker --}}
        <div class="section-title-wrap fade-in">
            <div class="section-kicker">
                {{ app()->getLocale() == 'ar' ? $prototypingFeature->kicker_text_ar : $prototypingFeature->kicker_text }}
            </div>
            <h2 class="section-title">
                {{ app()->getLocale() == 'ar' ? $prototypingFeature->main_title_ar : $prototypingFeature->main_title }}
            </h2>
            <div class="section-underline"></div>
        </div>

        <div class="process-grid">

            {{-- Text Content --}}
            <div class="process-text fade-in">
                <h3>
                    {{ app()->getLocale() == 'ar' ? $prototypingFeature->section_heading_ar : $prototypingFeature->section_heading }}
                </h3>
                <p>
                    {{-- الفقرة الأولى --}}
                    {{ app()->getLocale() == 'ar' ? $prototypingFeature->paragraph_1_ar : $prototypingFeature->paragraph_1_en }}
                </p>
                <p>
                    {{-- الفقرة الثانية --}}
                    {{ app()->getLocale() == 'ar' ? $prototypingFeature->paragraph_2_ar : $prototypingFeature->paragraph_2_en }}
                </p>

                {{-- القائمة (نفترض هنا أنها ثابتة أو تمثل تفاصيل الخدمة) --}}
                <ul style="padding-left: 20px; color: var(--text-muted); font-size: 0.9rem;">
                    {{-- *ملاحظة: إذا كنت قد أنشأت جدول Phases أو FeatureItems للقائمة، يجب استخدام حلقة @foreach هنا بدلاً من النصوص الثابتة.* --}}
                    <li>{{ __('header.process_list_item_1') }}</li>
                    <li>{{ __('header.process_list_item_2') }}</li>
                    <li>{{ __('header.process_list_item_3') }}</li>
                </ul>
            </div>

            {{-- Image Stack (Visual Storytelling) --}}
            <div class="agta-images">
                <div style="position: relative; width: 100%; max-width: 520px; margin: 0 auto;">

                    {{-- Layer 1: The Final Render (Hero Image) --}}
                    <img src="{{ $prototypingFeature->image_hero_url }}"
                        alt="{{ __('header.process_alt_hero') }}"
                        style="display: block; border-radius: 20px; background:#f5f5f5; 
                                box-shadow: 0 22px 70px rgba(0,0,0,0.18);">

                    {{-- Layer 2: Close-up Wireframe/Detail (Detail Image) --}}
                    <img src="{{ $prototypingFeature->image_detail_url }}"
                        alt="{{ __('header.process_alt_detail') }}"
                        style="position: absolute; top: 6%; right: -8%;;
                                border-radius: 18px; background:#ffffff; filter: brightness(1.1);
                                box-shadow: 0 18px 55px rgba(0,0,0,0.18);">

                    {{-- Layer 3: Wax Print/File Preview (Production Ready Image) --}}
                    <img src="{{ $prototypingFeature->image_production_url }}"
                        alt="{{ __('header.process_alt_production') }}"
                        style="position: absolute; bottom: -12%; left: -6%; width: 46%;
                                border-radius: 16px; background:#ffffff; 
                                box-shadow: 0 16px 45px rgba(0,0,0,0.16); filter: grayscale(100%) brightness(1.5);">
                </div>
            </div>

        </div>
        @endif
    </div>
</section>