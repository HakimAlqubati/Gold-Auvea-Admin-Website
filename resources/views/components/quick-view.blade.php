{{-- Quick View Modal Component --}}
<div id="quickViewModal" class="quick-view-modal">
    <div class="quick-view-overlay"></div>
    <div class="quick-view-content">
        {{-- زر الإغلاق --}}
        <button class="quick-view-close" id="closeQuickView">✕</button>

        {{-- محتوى Modal --}}
        <div class="quick-view-body">
            {{-- صورة التصميم --}}
            <div class="quick-view-image">
                <img id="qvImage" src="" alt="Design">
            </div>

            {{-- تفاصيل التصميم --}}
            <div class="quick-view-details">
                <h2 id="qvName" class="qv-design-name"></h2>

                <div class="qv-meta">
                    <span class="qv-category-label">{{ __('header.category') }}:</span>
                    <span id="qvCategory" class="qv-category-value"></span>
                </div>

                <div class="qv-price">
                    <span class="qv-price-label">{{ __('header.price') }}:</span>
                    <span id="qvPrice" class="qv-price-value"></span>
                </div>

                <button class="qv-close-btn" id="closeQuickViewBtn">
                    {{ __('header.close') }}
                </button>
            </div>
        </div>
    </div>
</div>