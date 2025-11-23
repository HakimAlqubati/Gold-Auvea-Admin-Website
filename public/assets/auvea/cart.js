/**
 * Shopping Cart JavaScript
 * Handles Add to Cart functionality with AJAX
 */

document.addEventListener('DOMContentLoaded', function () {
    // Initialize cart count on page load
    updateCartCount();

    // Check which items are already in cart and update button states
    updateCartButtonStates();

    // Add event listeners to all "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // Don't allow clicking if already added
            if (this.classList.contains('already-added')) {
                return;
            }

            const designId = this.dataset.designId;
            const designName = this.dataset.designName;

            addToCart(designId, designName, this);
        });
    });
});

/**
 * Add item to cart via AJAX
 */
function addToCart(designId, designName, buttonElement) {
    // Disable button during request
    buttonElement.disabled = true;
    const originalText = buttonElement.querySelector('.cart-text').textContent;
    buttonElement.querySelector('.cart-text').textContent = '...';

    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            design_id: designId,
            quantity: 1
        })
    })
        .then(response => {
            // Check if the response is not ok (e.g., 400 for already in cart)
            if (!response.ok) {
                return response.json().then(data => {
                    // If item is already in cart, update button state
                    if (data.already_in_cart) {
                        markButtonAsAdded(buttonElement);
                        updateCartCountValue(data.cart_count);
                    }
                    throw new Error(data.message || 'حدث خطأ أثناء الإضافة');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Update cart count
                updateCartCountValue(data.cart_count);

                // Show success feedback
                showNotification(data.message, 'success');

                // Mark button as added
                markButtonAsAdded(buttonElement);

                // Add animation to cart icon
                animateCartIcon();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification(error.message || 'حدث خطأ أثناء الإضافة إلى السلة', 'error');

            // If not already added, reset button
            if (!buttonElement.classList.contains('already-added')) {
                buttonElement.querySelector('.cart-text').textContent = originalText;
                buttonElement.disabled = false;
            }
        });
}

/**
 * Update cart count from server
 */
function updateCartCount() {
    fetch('/cart/count', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateCartCountValue(data.count);
            }
        })
        .catch(error => {
            console.error('Error fetching cart count:', error);
        });
}

/**
 * Fetch cart item IDs and update button states
 */
function updateCartButtonStates() {
    fetch('/cart/items', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.design_ids) {
                const cartDesignIds = data.design_ids;

                // Update all buttons
                const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
                addToCartButtons.forEach(button => {
                    const designId = parseInt(button.dataset.designId);
                    if (cartDesignIds.includes(designId)) {
                        markButtonAsAdded(button);
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error fetching cart items:', error);
        });
}

/**
 * Mark a button as already added to cart
 */
function markButtonAsAdded(buttonElement) {
    // Get the current language from HTML lang attribute
    const currentLang = document.documentElement.lang || 'en';

    // Set the appropriate text based on language
    const alreadyAddedText = currentLang === 'ar' ? 'مضاف بالفعل' : 'Already Added';

    // Update button state
    buttonElement.classList.add('already-added');
    buttonElement.disabled = true;
    buttonElement.querySelector('.cart-text').textContent = alreadyAddedText;

    // Add visual styling
    buttonElement.style.opacity = '0.6';
    buttonElement.style.cursor = 'not-allowed';
}

/**
 * Update cart count badge in header
 */
function updateCartCountValue(count) {
    const cartIcon = document.querySelector('.header-icon-btn[title*="السلة"], .header-icon-btn[title*="Cart"]');

    if (!cartIcon) return;

    // Remove existing badge if any
    let badge = cartIcon.querySelector('.cart-badge');

    if (count > 0) {
        if (!badge) {
            badge = document.createElement('span');
            badge.className = 'cart-badge';
            cartIcon.style.position = 'relative';
            cartIcon.appendChild(badge);
        }
        badge.textContent = count;
    } else {
        if (badge) {
            badge.remove();
        }
    }
}

/**
 * Animate cart icon when item is added
 */
function animateCartIcon() {
    const cartIcon = document.querySelector('.header-icon-btn[title*="السلة"], .header-icon-btn[title*="Cart"]');

    if (cartIcon) {
        cartIcon.classList.add('pulse-animation');
        setTimeout(() => {
            cartIcon.classList.remove('pulse-animation');
        }, 500);
    }
}

/**
 * Show notification message
 */
function showNotification(message, type = 'success') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `cart-notification cart-notification-${type}`;
    notification.textContent = message;

    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 80px;
        right: 20px;
        background: ${type === 'success' ? 'linear-gradient(135deg, #2ecc71, #27ae60)' : 'linear-gradient(135deg, #e74c3c, #c0392b)'};
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        z-index: 9999;
        font-size: 0.9rem;
        font-weight: 600;
        animation: slideIn 0.3s ease;
    `;

    document.body.appendChild(notification);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
    
    .pulse-animation {
        animation: pulse 0.5s ease !important;
    }
`;
document.head.appendChild(style);
