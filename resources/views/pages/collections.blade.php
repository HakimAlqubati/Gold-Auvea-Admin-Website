<x-layout.app>
    <x-shared.header />

    <div class="collections-page-container">
        {{-- Sidebar --}}
        <aside class="collections-sidebar">
            <h3 class="sidebar-title">{{ __('header.collections_title') }}</h3>
            <ul class="category-list">
                <li class="category-item {{ request()->route('category') == 'all' || !request()->route('category') ? 'active' : '' }}">
                    <a href="{{ route('designs.index') }}" style="display: block; width: 100%; height: 100%;">
                        {{ __('header.collections_all_designs') }}
                    </a>
                </li>
                @foreach($categories as $category)
                <li class="category-item {{ request()->route('category') == $category->slug ? 'active' : '' }}">
                    <a href="{{ route('designs.index', ['category' => $category->slug]) }}" style="display: block; width: 100%; height: 100%;">
                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                    </a>
                </li>
                @endforeach
            </ul>
        </aside>

        {{-- Main Content --}}
        <main class="collections-main">
            <div class="collections-header">
                <h1 class="page-title">{{ __('header.collections_title') }}</h1>
                <p class="page-description">{{ __('header.collections_description') }}</p>
            </div>

            <div id="designs-grid-container" class="collections-grid">
                @include('partials.designs-grid', ['designs' => $designs])
            </div>
        </main>
    </div>

    @push('scripts')
    @endpush

    <x-shared.footer />
</x-layout.app>