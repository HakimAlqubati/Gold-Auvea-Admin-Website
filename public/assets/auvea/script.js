// Sticky header & to-top button
const header = document.getElementById('mainHeader');
const toTopBtn = document.getElementById('toTopBtn');

window.addEventListener('scroll', () => {
    const scrolled = window.scrollY || window.pageYOffset;

    if (scrolled > 40) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }

    if (scrolled > 300) {
        toTopBtn.classList.add('visible');
    } else {
        toTopBtn.classList.remove('visible');
    }
});

toTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Simple fade-in on scroll for elements with .fade-in
const fadeItems = document.querySelectorAll('.fade-in');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.18
});

fadeItems.forEach(el => observer.observe(el));

// Tiny random animation for metal prices to look "live"
const metalValues = document.querySelectorAll('.metal-value');

setInterval(() => {
    metalValues.forEach(span => {
        const base = parseFloat(span.getAttribute('data-base'));
        const delta = (Math.random() - 0.5) * 2; // -1 to +1
        const value = (base + delta).toFixed(2);
        span.textContent = '$' + value;
    });
}, 3500);

// SLIDER
let slideIndex = 1;
showSlides(slideIndex);

// Next/Prev
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Dots
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("slide");
    const dotsWrap = document.getElementById("sliderDots");

    // Create dots only once
    if (dotsWrap && dotsWrap.children.length === 0) {
        for (let a = 0; a < slides.length; a++) {
            const dot = document.createElement("span");
            dot.classList.add("dot");
            dot.onclick = () => currentSlide(a + 1);
            dotsWrap.appendChild(dot);
        }
    }

    const dots = dotsWrap ? dotsWrap.children : [];

    if (n > slides.length) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;

    for (i = 0; i < slides.length; i++) slides[i].style.display = "none";
    for (i = 0; i < dots.length; i++) dots[i].classList.remove("active-dot");

    if (slides[slideIndex - 1]) {
        slides[slideIndex - 1].style.display = "block";
    }
    if (dots[slideIndex - 1]) {
        dots[slideIndex - 1].classList.add("active-dot");
    }
}

// Auto change slides
setInterval(() => plusSlides(1), 5000);

// NEW: Collection Filter Logic
const filterCards = document.querySelectorAll('.filter-card');
const collectionCards = document.querySelectorAll('.collection-card');

filterCards.forEach(card => {
    card.addEventListener('click', function () {
        const filter = this.getAttribute('data-filter');

        // Update active class
        filterCards.forEach(f => f.classList.remove('active'));
        this.classList.add('active');

        // Filter items
        collectionCards.forEach(item => {
            const category = item.getAttribute('data-category');
            item.classList.remove('hidden'); // Show by default to handle opacity animation

            if (filter === 'all' || category === filter) {
                // Use setTimeout for display block after transition is complete to allow fade-in transition
                setTimeout(() => {
                    // Ensure it is not set to 'block' until transition starts to reverse 
                    item.style.display = 'block';
                    // Re-trigger fade-in on visible elements (optional, but good UX)
                    if (!item.classList.contains('visible')) {
                        item.classList.add('visible');
                    }
                }, 10);
                item.opacity = '1';
            } else {
                item.style.opacity = '0';
                // Hide after transition
                setTimeout(() => {
                    item.classList.add('hidden');
                }, 300); // Wait for opacity transition (0.3s)
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Smooth scrolling + activating filter when clicking nav items
    const header = document.getElementById('mainHeader');

    document.querySelectorAll('.header-nav .nav-link[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1); // without the #
            const targetEl = document.getElementById(targetId);

            // Smooth scroll with header height compensation
            if (targetEl) {
                const headerHeight = header ? header.offsetHeight : 0;
                const offsetTop = targetEl.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth',
                });
            }

            // Activate collections filter based on data-filter attribute
            const filterName = this.dataset.filter;
            if (filterName) {
                const filterCard = document.querySelector('.filter-card[data-filter="' + filterName + '"]');
                if (filterCard) {
                    filterCard.click(); // Assumes filter logic is tied to the card click event
                }
            }
        });
    });

    // DARK MODE LOGIC
    const themeToggle = document.getElementById('themeToggle');

    if (themeToggle) {
        // Set initial button icon based on current theme
        const isDarkMode = document.documentElement.classList.contains('dark-mode');
        themeToggle.textContent = isDarkMode ? '🌙' : '☀️';

        // Event listener for the toggle button
        themeToggle.addEventListener('click', () => {
            const isDark = document.documentElement.classList.toggle('dark-mode');
            const newTheme = isDark ? 'dark' : 'light';
            localStorage.setItem('theme', newTheme);
            themeToggle.textContent = isDark ? '🌙' : '☀️';
        });
    }
});