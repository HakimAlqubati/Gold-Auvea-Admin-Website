@php
// هذا الكود يمكن وضعه في الـ Controller، لكن نضعه هنا للتأكد من وجود المتغيرات
// في حال عدم تمريرها، نستخدم مصفوفة فارغة لتجنب الأخطاء
$categories = $categories ?? [];
$designs = $designs ?? [];
@endphp

<section class="section section-dark" id="collections">
    <div class="section-inner page-container">

        {{-- 1. Title and Kicker --}}
        <div class="section-title-wrap fade-in">
            <div class="section-kicker">{{ __('header.collections_kicker') }}</div>
            <h2 class="section-title">{{ __('header.collections_title') }}</h2>
            <div class="section-underline"></div>
            <p class="steps-subtext" style="max-width: 700px; margin-top: 15px;">
                {{ __('header.collections_description') }}
            </p>
        </div>

        {{-- 2. Filters (الآن يتم جلبها ديناميكيًا من جدول Categories) --}}
        <div class="filter-cards fade-in">
            <div class="filter-card active" data-filter="all">{{ __('header.collections_all_designs') }}</div>

            @foreach($categories as $category)
            <div class="filter-card" data-filter="{{ $category->data_filter }}">
                {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
            </div>
            @endforeach

        </div>

        {{-- 3. Collections Grid - يتم تكرار بطاقات التصميم بناءً على البيانات --}}
        <div class="collections-grid" id="collectionGrid">

            @forelse($designs as $design)
            {{-- data-category يستخدم data_filter من الفئة المرتبطة --}}
            <article class="collection-card fade-in" data-category="{{ optional($design->category)->data_filter }}">

                <div class="collection-img-wrap">
                    {{-- تحديد فئة 'round' بناءً على الحقل is_round_image في قاعدة البيانات --}}
                    <img
                        src="{{ $design->preview_image }}"
                        alt="{{ app()->getLocale() == 'ar' ? $design->name_ar : $design->name_en }}"
                        class="collection-img-placeholder @if($design->is_round_image) round @endif">
                </div>

                <div class="collection-content">
                    {{-- استخدام name_en أو name_ar حسب اللغة --}}
                    <div class="collection-name-tag">
                        {{ app()->getLocale() == 'ar' ? $design->name_ar : $design->name_en }}
                    </div>

                    <p class="collection-subtext">
                        {{ app()->getLocale() == 'ar' ? $design->description_ar : $design->description_en }}
                    </p>

                    {{-- مثال لعرض بعض التفاصيل التقنية (اختياري) --}}
                    @if($design->details)
                    <p class="collection-metadata">
                        {{ __('header.collections_weight') }}: {{ number_format($design->details->estimated_weight, 2) }} جرام | {{ __('header.collections_karat') }}: {{ $design->details->gold_karat }}
                    </p>
                    @endif

                    {{-- زر إضافة إلى السلة --}}
                    <button
                        class="add-to-cart-btn"
                        data-design-id="{{ $design->id }}"
                        data-design-name="{{ app()->getLocale() == 'ar' ? $design->name_ar : $design->name_en }}">
                        <span class="cart-icon">🛒</span>
                        <span class="cart-text">{{ __('header.add_to_cart') }}</span>
                    </button>
                </div>
            </article>
            @empty
            {{-- رسالة تظهر إذا لم يتم العثور على أي تصاميم --}}
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500">{{ __('header.collections_no_designs') }}</p>
            </div>
            @endforelse

        </div>
    </div>
</section>