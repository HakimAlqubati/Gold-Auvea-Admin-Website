 <section class="section section-request" id="request">
        <div class="section-inner page-container">
            <div class="section-title-wrap fade-in">
                <div class="section-kicker">{{ __('header.request_kicker') }}</div>
                <h2 class="section-title">{{ __('header.request_title') }}</h2>
                <div class="section-underline"></div>
            </div>

            <div class="request-grid">
                <div class="request-info fade-in">
                    <p>
                        {{ __('header.request_intro') }}
                    </p>
                    <ul>
                        <li>{{ __('header.request_feature_1') }}</li>
                        <li>{{ __('header.request_feature_2') }}</li>
                        <li>{{ __('header.request_feature_3') }}</li>
                    </ul>
                    <p class="form-note">
                        <strong>{{ __('header.request_note') }}</strong> {{ __('header.request_note_text') }}
                    </p>
                </div>

                <form class="request-form fade-in"
                    onsubmit="event.preventDefault(); alert('This is a demo form. Connect it to your backend or WhatsApp link.');">
                    
                    {{-- إضافة حقل CSRF Token مطلوب في Laravel --}}
                    @csrf 

                    <div class="request-form-title">{{ __('header.request_form_title') }}</div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">{{ __('header.request_full_name') }}</label>
                            <input type="text" class="form-input" placeholder="{{ __('header.request_full_name_placeholder') }}" name="full_name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{ __('header.request_city') }}</label>
                            <input type="text" class="form-input" placeholder="{{ __('header.request_city_placeholder') }}" name="city">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">{{ __('header.request_whatsapp') }}</label>
                            <input type="text" class="form-input" placeholder="{{ __('header.request_whatsapp_placeholder') }}" name="whatsapp">
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{ __('header.request_metal') }}</label>
                            <select class="form-select" name="metal_type">
                                <option>{{ __('header.request_metal_gold_18k') }}</option>
                                <option>{{ __('header.request_metal_gold_21k') }}</option>
                                <option>{{ __('header.request_metal_gold_22k') }}</option>
                                <option>{{ __('header.request_metal_gold_24k') }}</option>
                                <option>{{ __('header.request_metal_silver') }}</option>
                                <option>{{ __('header.request_metal_mixed') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('header.request_design_type') }}</label>
                        <input type="text" class="form-input"
                            placeholder="{{ __('header.request_design_type_placeholder') }}" name="design_type">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('header.request_details') }}</label>
                        <textarea class="form-textarea"
                            placeholder="{{ __('header.request_details_placeholder') }}" name="details"></textarea>
                    </div>

                    <button type="submit" class="btn-primary form-submit">{{ __('header.request_submit') }}</button>
                </form>
            </div>
        </div>
    </section>