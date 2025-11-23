<section class="section-agta" id="agta">
    @if($agtaAward)
    <div class="agta-inner fade-in page-container">

        <div class="agta-images">
            {{-- 1. Drawing Card (Simulating the Hand Sketch/CAD wireframe) --}}
            <div class="agta-drawing-card">
                <img src="{{ $agtaAward->drawing_image }}"
                    alt="Hand-drawn sketch or CAD wireframe of the design concept" class="agta-drawing">
            </div>

            {{-- 2. Final Piece (Simulating the polished final product) --}}
            <img src="{{ $agtaAward->final_piece_image }}"
                alt="Final golden south sea pearl ring" class="agta-final-piece">
        </div>

        <div class="agta-content">
            @if($agtaAward->kicker || $agtaAward->kicker_ar)
            <div class="section-kicker" style="text-align: left;">
                {{ app()->getLocale() == 'ar' ? $agtaAward->kicker_ar : $agtaAward->kicker }}
            </div>
            @endif
            <h2 class="agta-heading">
                {{ app()->getLocale() == 'ar' ? $agtaAward->title_ar : $agtaAward->title }}
            </h2>

            <p class="agta-subheading">
                {!! \Illuminate\Support\Str::markdown(app()->getLocale() == 'ar' ? $agtaAward->description_top_ar : $agtaAward->description_top) !!}
            </p>

            @if($agtaAward->description_bottom || $agtaAward->description_bottom_ar)
            <p class="agta-subheading" style="margin-top: 15px;">
                {!! \Illuminate\Support\Str::markdown(app()->getLocale() == 'ar' ? $agtaAward->description_bottom_ar : $agtaAward->description_bottom) !!}
            </p>
            @endif

            @if($agtaAward->note || $agtaAward->note_ar)
            <div class="agta-note">
                {{ app()->getLocale() == 'ar' ? $agtaAward->note_ar : $agtaAward->note }}
            </div>
            @endif
        </div>
    </div>
    @endif
</section>