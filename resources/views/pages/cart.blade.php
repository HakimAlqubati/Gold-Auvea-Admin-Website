{{-- استخدام مكون التخطيط --}}
<x-layout.app>

    {{-- تضمين مكون الرأس --}}
    <x-shared.header />

    {{-- محتوى صفحة السلة --}}
    <main class="cart-page">
        <div class="cart-container">
            {{-- عنوان الصفحة --}}
            <div class="cart-header">
                <h1 class="cart-title">{{ __('header.cart_page_title') }}</h1>
                <p class="cart-count">
                    {{ $itemsCount }} {{ $itemsCount == 1 ? __('header.item') : __('header.items') }}
                </p>
            </div>

            @if($items->count() > 0)
            {{-- محتوى السلة --}}
            <div class="cart-content">
                {{-- قائمة العناصر --}}
                <div class="cart-items-section">
                    @foreach($items as $item)
                    <div class="cart-item" data-item-id="{{ $item->id }}">
                        {{-- صورة التصميم --}}
                        <div class="cart-item-image">
                            @if($item->design && $item->design->image_url)
                            <img src="{{ asset('storage/' . $item->design->image_url) }}"
                                alt="{{ $item->design->name }}">
                            @else
                            <div class="no-image">📷</div>
                            @endif
                        </div>

                        {{-- تفاصيل العنصر --}}
                        <div class="cart-item-details">
                            <h3 class="item-name">{{ $item->design->name ?? 'N/A' }}</h3>
                            <p class="item-category">
                                {{ __('header.category') }}:
                                <span>{{ $item->design->category->name ?? 'N/A' }}</span>
                            </p>
                            <button class="quick-view-btn"
                                data-design-id="{{ $item->design->id }}"
                                data-design-name="{{ $item->design->name }}"
                                data-design-image="{{ $item->design->image_url }}"
                                data-design-category="{{ $item->design->category->name ?? 'N/A' }}"
                                data-design-price="{{ $item->price }}">
                                👁️ {{ __('header.quick_view') }}
                            </button>
                        </div>

                        {{-- السعر --}}
                        <div class="cart-item-price">
                            <span class="price-label">{{ __('header.price') }}</span>
                            <span class="price-value">${{ number_format($item->price, 2) }}</span>
                        </div>

                        {{-- الكمية --}}
                        <div class="cart-item-quantity">
                            <label>{{ __('header.quantity') }}</label>
                            <div class="quantity-controls">
                                <button class="qty-btn qty-decrease" data-item-id="{{ $item->id }}">−</button>
                                <input type="number"
                                    class="qty-input"
                                    value="{{ $item->quantity }}"
                                    min="1"
                                    data-item-id="{{ $item->id }}">
                                <button class="qty-btn qty-increase" data-item-id="{{ $item->id }}">+</button>
                            </div>
                        </div>

                        {{-- المجموع الفرعي --}}
                        <div class="cart-item-subtotal">
                            <span class="subtotal-label">{{ __('header.subtotal') }}</span>
                            <span class="subtotal-value">${{ number_format($item->price * $item->quantity, 2) }}</span>
                        </div>

                        {{-- زر الحذف --}}
                        <button class="remove-item-btn" data-item-id="{{ $item->id }}" title="{{ __('header.remove') }}">
                            🗑️
                        </button>
                    </div>
                    @endforeach
                </div>

                {{-- ملخص السلة --}}
                <div class="cart-summary">
                    <h2 class="summary-title">{{ __('header.cart_total') }}</h2>

                    <div class="summary-row">
                        <span>{{ __('header.subtotal') }}</span>
                        <span class="summary-subtotal">${{ number_format($total, 2) }}</span>
                    </div>

                    <div class="summary-row summary-total">
                        <span>{{ __('header.cart_total') }}</span>
                        <span class="summary-total-value">${{ number_format($total, 2) }}</span>
                    </div>

                    <button class="checkout-btn">
                        {{ __('header.checkout') }}
                    </button>

                    <button class="clear-cart-btn">
                        {{ __('header.clear_cart') }}
                    </button>

                    <a href="{{ route('designs.index') }}" class="continue-shopping-link">
                        ← {{ __('header.continue_shopping') }}
                    </a>
                </div>
            </div>
            @else
            {{-- السلة فارغة --}}
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <h2>{{ __('header.empty_cart') }}</h2>
                <p>{{ __('header.empty_cart_message') }}</p>
                <a href="{{ route('designs.index') }}" class="continue-shopping-btn">
                    {{ __('header.continue_shopping') }}
                </a>
            </div>
            @endif
        </div>
    </main>

    {{-- مكون Quick View Modal --}}
    <x-quick-view />

    {{-- تضمين مكون التذييل --}}
    <x-shared.footer />

</x-layout.app>