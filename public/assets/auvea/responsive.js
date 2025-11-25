/**
 * Responsive.js - Mobile Navigation and Responsive Utilities
 * Handles mobile menu functionality and responsive behaviors
 */

(function () {
    'use strict';

    // Mobile Menu Elements
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileMenuBackdrop = document.getElementById('mobileMenuBackdrop');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    const body = document.body;

    // Check if elements exist
    if (!mobileMenuToggle || !mobileMenuOverlay || !mobileMenuBackdrop) {
        console.warn('Mobile menu elements not found');
        return;
    }

    /**
     * Toggle Mobile Menu
     */
    function toggleMobileMenu() {
        const isActive = mobileMenuOverlay.classList.contains('active');

        if (isActive) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    /**
     * Open Mobile Menu
     */
    function openMobileMenu() {
        mobileMenuToggle.classList.add('active');
        mobileMenuOverlay.classList.add('active');
        mobileMenuBackdrop.classList.add('active');
        body.classList.add('mobile-menu-open');

        // Set focus to close button for accessibility
        if (mobileMenuClose) {
            setTimeout(() => mobileMenuClose.focus(), 300);
        }
    }

    /**
     * Close Mobile Menu
     */
    function closeMobileMenu() {
        mobileMenuToggle.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
        mobileMenuBackdrop.classList.remove('active');
        body.classList.remove('mobile-menu-open');

        // Return focus to toggle button
        setTimeout(() => mobileMenuToggle.focus(), 300);
    }

    /**
     * Event Listeners
     */

    // Toggle button click
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);

    // Close button click
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }

    // Backdrop click
    mobileMenuBackdrop.addEventListener('click', closeMobileMenu);

    // Close menu when clicking on navigation links
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            // If it's an anchor link (starts with #), close menu after a short delay
            if (link.getAttribute('href').startsWith('#')) {
                setTimeout(closeMobileMenu, 300);
            } else {
                // For regular links, close immediately
                closeMobileMenu();
            }
        });
    });

    // Close menu on ESC key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenuOverlay.classList.contains('active')) {
            closeMobileMenu();
        }
    });

    /**
     * Handle Window Resize
     * Close mobile menu if window is resized to desktop size
     */
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            // Close menu if window width is greater than 992px (desktop)
            if (window.innerWidth > 992 && mobileMenuOverlay.classList.contains('active')) {
                closeMobileMenu();
            }
        }, 250);
    });

    /**
     * Smooth Scroll for Anchor Links (Mobile Menu)
     */
    mobileNavLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.startsWith('#')) {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // Close menu first
                    closeMobileMenu();

                    // Then scroll to target
                    setTimeout(() => {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 400);
                }
            });
        }
    });

    /**
     * Prevent Scroll When Menu is Open
     * Additional safeguard for iOS devices
     */
    let scrollPosition = 0;

    const preventScroll = () => {
        scrollPosition = window.pageYOffset;
        body.style.overflow = 'hidden';
        body.style.position = 'fixed';
        body.style.top = `-${scrollPosition}px`;
        body.style.width = '100%';
    };

    const allowScroll = () => {
        body.style.removeProperty('overflow');
        body.style.removeProperty('position');
        body.style.removeProperty('top');
        body.style.removeProperty('width');
        window.scrollTo(0, scrollPosition);
    };

    // Watch for mobile-menu-open class changes
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                if (body.classList.contains('mobile-menu-open')) {
                    preventScroll();
                } else {
                    allowScroll();
                }
            }
        });
    });

    observer.observe(body, {
        attributes: true,
        attributeFilter: ['class']
    });

    /**
     * Touch Swipe to Close (Optional Enhancement)
     * Swipe right (LTR) or left (RTL) to close menu
     */
    let touchStartX = 0;
    let touchEndX = 0;

    mobileMenuOverlay.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    mobileMenuOverlay.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const isRTL = document.documentElement.getAttribute('lang') === 'ar';
        const swipeThreshold = 50;

        if (isRTL) {
            // RTL: Swipe left to close
            if (touchStartX - touchEndX > swipeThreshold) {
                closeMobileMenu();
            }
        } else {
            // LTR: Swipe right to close
            if (touchEndX - touchStartX > swipeThreshold) {
                closeMobileMenu();
            }
        }
    }

    console.log('Responsive.js loaded successfully');
})();
