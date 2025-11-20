<footer class="footer">
    <div class="footer-top-note page-container">
        {{ __('header.footer_intro') }}
    </div>

    <div class="footer-columns page-container">
        <div class="footer-newsletter">
            <div class="footer-heading">{{ __('header.newsletter_heading') }}</div>
            <p>{{ __('header.newsletter_text') }}</p>
            <form class="newsletter-form" onsubmit="event.preventDefault();">
                <input type="email" placeholder="{{ __('header.newsletter_placeholder') }}">
                <button type="submit">{{ __('header.newsletter_button') }}</button>
            </form>
        </div>

        <div>
            <div class="footer-heading">{{ __('header.services_heading') }}</div>
            <ul class="footer-list">
                <li><a href="#">{{ __('header.service_custom_ring') }}</a></li>
                <li><a href="#">{{ __('header.service_bridal') }}</a></li>
                <li><a href="#">{{ __('header.service_silver_mens') }}</a></li>
                <li><a href="#">{{ __('header.service_name_jewelry') }}</a></li>
            </ul>
        </div>

        <div>
            <div class="footer-heading">{{ __('header.yemen_heading') }}</div>
            <ul class="footer-list">
                <li><a href="#">{{ __('header.yemen_workshops') }}</a></li>
                <li><a href="#">{{ __('header.yemen_retail') }}</a></li>
                <li><a href="#">{{ __('header.yemen_delivery') }}</a></li>
                <li><a href="#">{{ __('header.yemen_payment') }}</a></li>
            </ul>
        </div>

        <div>
            <div class="footer-heading">{{ __('header.support_heading') }}</div>
            <ul class="footer-list">
                <li><a href="#">{{ __('header.support_how_works') }}</a></li>
                <li><a href="#">{{ __('header.support_formats') }}</a></li>
                <li><a href="#">{{ __('header.support_contact') }}</a></li>
                <li><a href="#">{{ __('header.support_faq') }}</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-inner page-container">
            <div>{{ __('header.copyright') }}</div>
            <div class="footer-links">
                <a href="#">{{ __('header.sitemap') }}</a>|
                <a href="#">{{ __('header.privacy') }}</a>|
                <a href="#">{{ __('header.terms') }}</a>
            </div>
            <div class="footer-socials">
                <a href="#" class="social-btn">f</a>
                <a href="#" class="social-btn">X</a>
                <a href="#" class="social-btn">▶</a>
                <a href="#" class="social-btn">◎</a>
            </div>
            <div class="footer-designer">
                {{ __('header.designer') }}
            </div>
        </div>
    </div>
</footer>

