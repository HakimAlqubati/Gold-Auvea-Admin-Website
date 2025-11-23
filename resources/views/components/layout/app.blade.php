<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>Auvea 3D Studio – Gold & Jewelry Design in Yemen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/auvea/style.css') }}">
</head>

<body>
    {{-- يتم هنا تضمين محتوى الصفحة (home.blade.php) --}}
    {{ $slot }}

    <button class="to-top-btn" id="toTopBtn" aria-label="Back to top">↑</button>

    <script src="{{ asset('assets/auvea/script.js') }}"></script>
</body>

</html>