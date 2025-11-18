@php
    // هذا الشرط لضمان عدم حدوث خطأ إذا لم يتم تمرير المتغير من Controller
    $sliderImages = $sliderImages ?? collect();
@endphp

<section class="hero-slider" id="hero">
    <div class="slider-container page-container">
        
        {{-- 1. تكرار الشرائح ديناميكيًا --}}
        @foreach($sliderImages as $key => $slide)
            <div class="slide fade @if($key === 0) active-slide @endif">
                
                {{-- إذا كان هناك رابط، نستخدم وسم <a> --}}
                @if($slide->link_url)
                    <a href="{{ $slide->link_url }}">
                @endif

                    <img src="{{ $slide->image_path }}" alt="{{ $slide->alt_text }}">

                    {{-- إضافة طبقة نصية فوق الصورة (Overlay Content) --}}
                    @if($slide->title_ar || $slide->caption_ar)
                        <div class="slide-overlay">
                            {{-- @if($slide->title_ar)
                                <h2 class="slide-title">{{ $slide->title_ar }}</h2>
                            @endif --}}
                            {{-- @if($slide->caption_ar)
                                <p class="slide-caption">{{ $slide->caption_ar }}</p>
                            @endif --}}
                            {{-- يمكن إضافة زر هنا أيضًا --}}
                        </div>
                    @endif
  
                @if($slide->link_url)
                    </a>
                @endif

            </div>
        @endforeach

        {{-- 2. مؤشرات التنقل (النقاط) --}}
        <div class="slider-dots" id="sliderDots">
            {{-- سيتم توليد النقاط ديناميكيًا باستخدام JavaScript بعدد الشرائح --}}
        </div>

      
    </div>
</section>

 