{{-- 1. استخدام مكون التخطيط (يحتوي على <html>, <head>, <body>, CSS, JS) --}}
<x-layout.app>

    {{-- 2. تضمين مكون الرأس (Top Ticker + Header) --}}
    <x-shared.header />

    {{-- 3. تضمين أقسام الصفحة --}}
    
    @include('sections.hero-slider')
    
    {{-- قسم AGTA (استخرج محتواه إلى sections/agta-award.blade.php) --}}
    @include('sections.agta-award') 

    {{-- قسم الخطوات (استخرج محتواه إلى sections/steps-process.blade.php) --}}
    @include('sections.steps-process')

    {{-- قسم المجموعات (استخرج محتواه إلى sections/collections.blade.php) --}}
    @include('sections.collections')

    {{-- قسم التصور الرقمي (استخرج محتواه إلى sections/process-visual.blade.php) --}}
    @include('sections.process-visual')

    {{-- قسم نموذج الطلب (استخرج محتواه إلى sections/design-request.blade.php) --}}
    @include('sections.design-request')

    {{-- 4. تضمين مكون التذييل --}}
    <x-shared.footer />

</x-layout.app>