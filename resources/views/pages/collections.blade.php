<x-layout.app>
    <x-shared.header />

    <div class="collections-page-container">
        {{-- Sidebar --}}
        <aside class="collections-sidebar">
            <h3 class="sidebar-title">{{ __('header.collections_title') }}</h3>
            <ul class="category-list">
                <li class="category-item active" data-category-id="all">
                    {{ __('header.collections_all_designs') }}
                </li>
                @foreach($categories as $category)
                <li class="category-item" data-category-id="{{ $category->id }}">
                    {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
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

            <div id="loading-spinner" class="loading-spinner" style="display: none;">
                <div class="spinner"></div>
            </div>
        </main>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryItems = document.querySelectorAll('.category-item');
            const gridContainer = document.getElementById('designs-grid-container');
            const loadingSpinner = document.getElementById('loading-spinner');

            categoryItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    categoryItems.forEach(i => i.classList.remove('active'));
                    // Add active class to clicked item
                    this.classList.add('active');

                    const categoryId = this.getAttribute('data-category-id');

                    // Show loading spinner, hide grid
                    loadingSpinner.style.display = 'flex';
                    gridContainer.style.opacity = '0.5';

                    // Fetch filtered designs
                    fetch(`{{ route('designs.filter') }}?category_id=${categoryId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text();
                        })
                        .then(html => {
                            if (html.trim() === '') {
                                gridContainer.innerHTML = '<div class="col-span-full text-center py-10"><p class="text-gray-500">{{ __("header.collections_no_designs") }}</p></div>';
                            } else {
                                gridContainer.innerHTML = html;
                            }
                            gridContainer.style.opacity = '1';
                            loadingSpinner.style.display = 'none';
                        })
                        .catch(error => {
                            console.error('Error fetching designs:', error);
                            gridContainer.innerHTML = '<div class="col-span-full text-center py-10 text-red-500">Error loading designs. Please try again.</div>';
                            gridContainer.style.opacity = '1';
                            loadingSpinner.style.display = 'none';
                        });
                });
            });
        });
    </script>
    @endpush

    <x-shared.footer />
</x-layout.app>