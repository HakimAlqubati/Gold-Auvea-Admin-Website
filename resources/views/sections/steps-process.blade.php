<section class="section section-steps" id="steps">
    <div class="section-inner page-container">

        @if(isset($workflow))
            {{-- عرض العنوان الرئيسي والوصف من موديل Workflow --}}
            <div class="section-title-wrap fade-in">
                <div class="section-kicker">{{ $workflow->kicker }}</div>
                <h2 class="section-title">{{ $workflow->title }}</h2>
                <div class="section-underline"></div>
                <p class="steps-subtext">
                    {{ $workflow->description }}
                </p>
            </div>
        @endif

        <div class="steps-grid">

            {{-- استخدام علاقة phases التي تم تحميلها مسبقًا --}}
            @if(isset($workflow) && $workflow->phases->count() > 0)
                @foreach($workflow->phases as $phase)
                    <article class="step-card fade-in">
                        {{-- استخدام حقل index لترتيب وعرض المرحلة --}}
                        <div class="step-index">Phase {{ $phase->index }}</div>
                        <div class="step-title">{{ $phase->title }}</div>
                        <div class="step-tag">{{ $phase->tags }}</div>
                        <p class="step-text">{{ $phase->description }}</p>
                    </article>
                @endforeach
            @endif

        </div>
    </div>
</section>