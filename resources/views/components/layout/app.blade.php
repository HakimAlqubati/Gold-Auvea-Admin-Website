<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Auvea 3D Studio – Gold & Jewelry Design in Yemen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/auvea/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auvea/cart.css') }}">

    {{-- Apply dark mode immediately before page renders to prevent flash --}}
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.classList.add('dark-mode');
            }
        })();
    </script>
</head>

<body>
    {{-- يتم هنا تضمين محتوى الصفحة (home.blade.php) --}}
    {{ $slot }}

    <button class="to-top-btn" id="toTopBtn" aria-label="Back to top">↑</button>

    <script src="{{ asset('assets/auvea/script.js') }}"></script>
    <script src="{{ asset('assets/auvea/cart.js') }}"></script>
    @stack('scripts')
</body>

</html>