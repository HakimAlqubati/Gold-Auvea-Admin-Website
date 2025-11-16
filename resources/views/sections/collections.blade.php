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
            <div class="section-kicker">Custom CAD Modeling & Manufacturing Files</div>
            <h2 class="section-title">Exclusive 3D Jewelry Collections for Yemen</h2>
            <div class="section-underline"></div>
            <p class="steps-subtext" style="max-width: 700px; margin-top: 15px;">
                Explore our distinct collection of 3D jewelry designs, ready for printing and casting in local workshops. We provide ultimate precision and designs that align with the latest gold and diamond trends in the region.
            </p>
        </div>

        {{-- 2. Filters (الآن يتم جلبها ديناميكيًا من جدول Categories) --}}
        <div class="filter-cards fade-in">
            <div class="filter-card active" data-filter="all">All Designs</div>
            
            @foreach($categories as $category)
                <div class="filter-card" data-filter="{{ $category->data_filter }}">
                    {{ $category->name_en }}
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
                            alt="{{ $design->name_en }}" 
                            class="collection-img-placeholder @if($design->is_round_image) round @endif"
                        >
                    </div>
                    
                    <div class="collection-content">
                        {{-- استخدام name_en لاسم التصميم --}}
                        <div class="collection-name-tag">{{ $design->name_en }}</div>
                        
                        <p class="collection-subtext">
                            {{ $design->description_ar }}
                        </p>
                        
                        {{-- مثال لعرض بعض التفاصيل التقنية (اختياري) --}}
                        @if($design->details)
                            <p class="collection-metadata">
                                الوزن: {{ number_format($design->details->estimated_weight, 2) }} جرام | عيار: {{ $design->details->gold_karat }}
                            </p>
                        @endif
                    </div>
                </article>
            @empty
                {{-- رسالة تظهر إذا لم يتم العثور على أي تصاميم --}}
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500">No designs found in the database.</p>
                </div>
            @endforelse
            
        </div>
    </div>
</section>