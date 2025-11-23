<section class="section section-steps" id="steps">
    <div class="section-inner page-container">

        @if(isset($workflow))
        {{-- عرض العنوان الرئيسي والوصف من موديل Workflow --}}
        <div class="section-title-wrap fade-in">
            <div class="section-kicker">
                {{ app()->getLocale() == 'ar' ? $workflow->kicker_ar : $workflow->kicker }}
            </div>
            <h2 class="section-title">
                {{ app()->getLocale() == 'ar' ? $workflow->title_ar : $workflow->title }}
            </h2>
            <div class="section-underline"></div>
            <p class="steps-subtext">
                {{ app()->getLocale() == 'ar' ? $workflow->description_ar : $workflow->description }}
            </p>
        </div>
        @endif

        <div class="steps-grid">

            {{-- استخدام علاقة phases التي تم تحميلها مسبقًا --}}
            @if(isset($workflow) && $workflow->phases->count() > 0)
            @foreach($workflow->phases as $phase)
            <article class="step-card fade-in">
                {{-- استخدام حقل index لترتيب وعرض المرحلة --}}
                <div class="step-index">
                    {{ app()->getLocale() == 'ar' ? 'المرحلة' : 'Phase' }} {{ $phase->index }}
                </div>
                <div class="step-title">
                    {{ app()->getLocale() == 'ar' ? $phase->title_ar : $phase->title }}
                </div>
                <div class="step-tag">
                    {{ app()->getLocale() == 'ar' ? $phase->tags_ar : $phase->tags }}
                </div>
                <p class="step-text">
                    {{ app()->getLocale() == 'ar' ? $phase->description_ar : $phase->description }}
                </p>
            </article>
            @endforeach
            @endif

        </div>
    </div>
</section>