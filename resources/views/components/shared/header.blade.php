<div class="top-ticker">
    <div class="top-ticker-left">
        <span class="phone">{{ __('header.phone') }}</span>
        <span>{{ __('header.design_production_delivery') }}</span>
        <span class="region">{{ __('header.regions') }}</span>
    </div>
    <div class="top-ticker-right" id="metalTicker">
        <div class="metal-price">
            <span class="metal-label">{{ __('header.gold') }}</span>
            <span class="metal-value" data-base="4181.2">$4181.2</span>
            <span class="metal-change up">0.23% (9.51)</span>
        </div>
        <div class="metal-price">
            <span class="metal-label">{{ __('header.silver') }}</span>
            <span class="metal-value" data-base="52.4">$52.4</span>
            <span class="metal-change up">0.35% (0.18)</span>
        </div>
        <div class="metal-price">
            <span class="metal-label">{{ __('header.platinum') }}</span>
            <span class="metal-value" data-base="1591.3">$1591.3</span>
            <span class="metal-change down">-0.12% (-2.1)</span>
        </div>
    </div>
</div>

<header class="main-header" id="mainHeader">
    <div class="main-header-inner">
        <div class="logo">
            <!-- <a href="/"> -->

                {{-- التعديل هنا: استخدام دالة asset() --}}
               <a href="/">
                   <img src="{{ asset('assets/auvea/logo.png') }}" width="60" alt="Auvea Logo">
               </a>
                <div>
                <a href="/">
                    <span class="text-main">{{ __('header.logo_main') }}</span>
                </a>   
                    <span class="logo-sub">{{ __('header.logo_sub') }}</span>
                </div>
            <!-- </a> -->
        </div>

        <nav class="header-nav">
            <a href="#collections" class="nav-link">{{ __('header.nav_collections') }}</a>
            <a href="#process" class="nav-link">{{ __('header.nav_process') }}</a>
            <a href="#request" class="nav-link">{{ __('header.nav_request') }}</a>
            <a href="#steps" class="nav-link">{{ __('header.nav_steps') }}</a>
        </nav>
        <div class="header-icons">
            <button class="theme-toggle" id="themeToggle" aria-label="{{ __('header.theme_toggle') }}">☀️</button>

            {{-- Language Switcher --}}
            <div class="language-switcher">
                <a href="{{ route('locale.switch', ['locale' => app()->getLocale() === 'ar' ? 'en' : 'ar']) }}"
                    class="header-icon-btn"
                    title="{{ __('header.language') }}">
                    <span class="lang-code">{{ strtoupper(app()->getLocale()) }}</span>
                </a>
            </div>

            <!-- <div class="header-icon-btn" title="{{ __('header.wishlist') }}">♡</div> -->
            <div class="header-icon-btn" title="{{ __('header.account') }}">👤</div>
            <a href="{{ route('cart.index') }}" class="header-icon-btn" title="{{ __('header.cart') }}">🛒</a>
        </div>
    </div>
</header>