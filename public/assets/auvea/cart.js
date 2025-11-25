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

/* ========================================
   CART PAGE FUNCTIONALITY
   ======================================== */

// Initialize cart page functionality if on cart page
if (document.querySelector('.cart-page')) {
    initializeCartPage();
}

function initializeCartPage() {
    // Quantity controls
    const qtyIncreaseButtons = document.querySelectorAll('.qty-increase');
    const qtyDecreaseButtons = document.querySelectorAll('.qty-decrease');
    const qtyInputs = document.querySelectorAll('.qty-input');

    qtyIncreaseButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const itemId = this.dataset.itemId;
            const input = document.querySelector(`.qty-input[data-item-id="${itemId}"]`);
            const newQty = parseInt(input.value) + 1;
            input.value = newQty;
            updateItemQuantity(itemId, newQty);
        });
    });

    qtyDecreaseButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const itemId = this.dataset.itemId;
            const input = document.querySelector(`.qty-input[data-item-id="${itemId}"]`);
            const currentQty = parseInt(input.value);
            if (currentQty > 1) {
                const newQty = currentQty - 1;
                input.value = newQty;
                updateItemQuantity(itemId, newQty);
            }
        });
    });

    qtyInputs.forEach(input => {
        input.addEventListener('change', function () {
            const itemId = this.dataset.itemId;
            let newQty = parseInt(this.value);
            if (newQty < 1 || isNaN(newQty)) {
                newQty = 1;
                this.value = 1;
            }
            updateItemQuantity(itemId, newQty);
        });
    });

    // Remove item buttons
    const removeButtons = document.querySelectorAll('.remove-item-btn');
    removeButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const itemId = this.dataset.itemId;
            removeCartItem(itemId);
        });
    });

    // Clear cart button
    const clearCartBtn = document.querySelector('.clear-cart-btn');
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', function () {
            if (confirm('هل أنت متأكد من إفراغ السلة؟ / Are you sure you want to clear the cart?')) {
                clearCart();
            }
        });
    }

    // Quick view buttons
    const quickViewButtons = document.querySelectorAll('.quick-view-btn');
    quickViewButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const designData = {
                id: this.dataset.designId,
                name: this.dataset.designName,
                image: this.dataset.designImage,
                category: this.dataset.designCategory,
                price: this.dataset.designPrice
            };
            openQuickView(designData);
        });
    });

    // Quick view modal close buttons
    const closeQuickViewBtn = document.getElementById('closeQuickView');
    const closeQuickViewBtn2 = document.getElementById('closeQuickViewBtn');
    const quickViewOverlay = document.querySelector('.quick-view-overlay');

    if (closeQuickViewBtn) {
        closeQuickViewBtn.addEventListener('click', closeQuickView);
    }
    if (closeQuickViewBtn2) {
        closeQuickViewBtn2.addEventListener('click', closeQuickView);
    }
    if (quickViewOverlay) {
        quickViewOverlay.addEventListener('click', closeQuickView);
    }
}

/**
 * Update item quantity
 */
function updateItemQuantity(itemId, quantity) {
    fetch(`/cart/update/${itemId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ quantity: quantity })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update cart count
                updateCartCountValue(data.cart_count);

                // Reload page to update totals
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error updating quantity:', error);
            showNotification('حدث خطأ أثناء تحديث الكمية / Error updating quantity', 'error');
        });
}

/**
 * Remove item from cart
 */
function removeCartItem(itemId) {
    fetch(`/cart/remove/${itemId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');

                // Remove item from DOM
                const cartItem = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
                if (cartItem) {
                    cartItem.style.animation = 'slideOut 0.3s ease';
                    setTimeout(() => {
                        cartItem.remove();

                        // Check if cart is empty
                        const remainingItems = document.querySelectorAll('.cart-item');
                        if (remainingItems.length === 0) {
                            location.reload();
                        } else {
                            // Update cart count and totals
                            updateCartCountValue(data.cart_count);
                            location.reload();
                        }
                    }, 300);
                }
            }
        })
        .catch(error => {
            console.error('Error removing item:', error);
            showNotification('حدث خطأ أثناء حذف العنصر / Error removing item', 'error');
        });
}

/**
 * Clear entire cart
 */
function clearCart() {
    fetch('/cart/clear', {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        })
        .catch(error => {
            console.error('Error clearing cart:', error);
            showNotification('حدث خطأ أثناء إفراغ السلة / Error clearing cart', 'error');
        });
}

/**
 * Open quick view modal
 */
function openQuickView(designData) {
    const modal = document.getElementById('quickViewModal');
    const image = document.getElementById('qvImage');
    const name = document.getElementById('qvName');
    const category = document.getElementById('qvCategory');
    const price = document.getElementById('qvPrice');

    if (modal && image && name && category && price) {
        // Set design data
        image.src = designData.image ? `/storage/${designData.image}` : '';
        image.alt = designData.name;
        name.textContent = designData.name;
        category.textContent = designData.category;
        price.textContent = `$${parseFloat(designData.price).toFixed(2)}`;

        // Show modal
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

/**
 * Close quick view modal
 */
function closeQuickView() {
    const modal = document.getElementById('quickViewModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Close modal on ESC key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeQuickView();
    }
});
