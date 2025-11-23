@forelse($designs as $design)
<article class="collection-card fade-in" data-category="{{ optional($design->category)->data_filter }}">
    <div class="collection-img-wrap">
        <img
            src="{{ $design->preview_image }}"
            alt="{{ app()->getLocale() == 'ar' ? $design->name_ar : $design->name_en }}"
            class="collection-img-placeholder @if($design->is_round_image) round @endif">

        <div class="collection-overlay">
            <button
                class="quick-add-btn"
                data-design-id="{{ $design->id }}"
                data-design-name="{{ app()->getLocale() == 'ar' ? $design->name_ar : $design->name_en }}">
                <span class="icon">+</span>
            </button>
        </div>
    </div>

    <div class="collection-content">
        <h3 class="collection-title">
            {{ app()->getLocale() == 'ar' ? $design->name_ar : $design->name_en }}
        </h3>

        <p class="collection-subtext">
            {{ app()->getLocale() == 'ar' ? $design->description_ar : $design->description_en }}
        </p>

        @if($design->details)
        <div class="collection-specs">
            <div class="spec-item">
                <span class="spec-label">{{ __('header.collections_weight') }}</span>
                <span class="spec-value">{{ number_format($design->details->estimated_weight, 2) }} g</span>
            </div>
            <div class="spec-divider"></div>
            <div class="spec-item">
                <span class="spec-label">{{ __('header.collections_karat') }}</span>
                <span class="spec-value">{{ $design->details->gold_karat }}</span>
            </div>
        </div>
        @endif

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
<div class="col-span-full text-center py-10">
    <p class="text-gray-500">{{ __('header.collections_no_designs') }}</p>
</div>
@endforelse