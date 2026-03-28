/**
 * Cart - localStorage
 * Luu gio hang vao localStorage, ton tai khi dong trinh duyet
 */
const Cart = {
    KEY: 'thu_huong_cart',

    getItems() {
        try {
            return JSON.parse(localStorage.getItem(this.KEY)) || [];
        } catch { return []; }
    },

    save(items) {
        localStorage.setItem(this.KEY, JSON.stringify(items));
        this.updateUI();
    },

    add(product) {
        // product: { id, name, price, sale_price, image, quantity, variation_id, variation_label }
        const items = this.getItems();
        const key = product.variation_id ? `${product.id}-${product.variation_id}` : `${product.id}`;
        const existing = items.find(i => i.key === key);

        if (existing) {
            existing.quantity += (product.quantity || 1);
        } else {
            items.push({
                key,
                id: product.id,
                name: product.name,
                price: product.price,
                sale_price: product.sale_price || null,
                image: product.image || '',
                quantity: product.quantity || 1,
                variation_id: product.variation_id || null,
                variation_label: product.variation_label || '',
            });
        }

        this.save(items);
        this.showNotification(product.name);
        return items;
    },

    update(key, quantity) {
        const items = this.getItems();
        const item = items.find(i => i.key === key);
        if (item) {
            item.quantity = Math.max(1, quantity);
            this.save(items);
        }
    },

    remove(key) {
        const items = this.getItems().filter(i => i.key !== key);
        this.save(items);
    },

    clear() {
        localStorage.removeItem(this.KEY);
        this.updateUI();
    },

    getTotal() {
        return this.getItems().reduce((sum, item) => {
            const price = item.sale_price || item.price;
            return sum + (price * item.quantity);
        }, 0);
    },

    getCount() {
        return this.getItems().reduce((sum, item) => sum + item.quantity, 0);
    },

    formatPrice(n) {
        return new Intl.NumberFormat('vi-VN').format(n) + 'đ';
    },

    // === UI Updates ===

    updateUI() {
        // Update cart badge
        const count = this.getCount();
        document.querySelectorAll('.cart-badge').forEach(el => {
            el.textContent = count;
            el.style.display = count > 0 ? '' : 'none';
        });

        // Update cart drawer
        this.renderDrawer();
    },

    renderDrawer() {
        const items = this.getItems();
        const drawerItems = document.getElementById('cartDrawerItems');
        const drawerCount = document.getElementById('cartDrawerCount');
        const drawerTotal = document.getElementById('cartDrawerTotal');

        if (!drawerItems) return;

        if (items.length === 0) {
            drawerItems.innerHTML = '<div class="text-center py-4" style="color:#94a3b8"><i class="fas fa-shopping-bag" style="font-size:2rem;display:block;margin-bottom:8px"></i>Gio hang trong</div>';
            if (drawerCount) drawerCount.innerHTML = 'Gio hang trong.';
            if (drawerTotal) drawerTotal.textContent = '0đ';
            return;
        }

        if (drawerCount) drawerCount.innerHTML = 'Ban dang co <strong>' + items.length + '</strong> san pham trong gio hang.';

        drawerItems.innerHTML = items.map(item => {
            const price = item.sale_price || item.price;
            const imgSrc = item.image || 'https://placehold.co/80x80/fff0f6/e84393?text=🎂';
            return `
                <div class="cart-drawer-item" data-key="${item.key}">
                    <div class="cart-item-img">
                        <img src="${imgSrc}" alt="${item.name}">
                    </div>
                    <div class="cart-item-info">
                        <h4>${item.name}</h4>
                        ${item.variation_label ? '<p class="cart-item-variant">' + item.variation_label + '</p>' : ''}
                        <span class="cart-item-price">${this.formatPrice(price)}</span>
                        <div class="cart-item-qty-control" style="display:flex;align-items:center;gap:6px;margin-top:4px">
                            <button onclick="Cart.update('${item.key}', ${item.quantity - 1})" style="width:24px;height:24px;border:1px solid #e2e8f0;border-radius:4px;background:#fff;cursor:pointer;font-size:12px">-</button>
                            <span style="font-size:13px;min-width:20px;text-align:center">${item.quantity}</span>
                            <button onclick="Cart.update('${item.key}', ${item.quantity + 1})" style="width:24px;height:24px;border:1px solid #e2e8f0;border-radius:4px;background:#fff;cursor:pointer;font-size:12px">+</button>
                        </div>
                        <button onclick="Cart.remove('${item.key}')" class="cart-item-remove" style="margin-top:4px">Xoa</button>
                    </div>
                </div>
            `;
        }).join('');

        if (drawerTotal) drawerTotal.textContent = this.formatPrice(this.getTotal());
    },

    showNotification(name) {
        // Simple toast notification
        let toast = document.getElementById('cartToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'cartToast';
            toast.style.cssText = 'position:fixed;top:80px;right:20px;background:#fff;border:1px solid #f0e4e9;border-radius:12px;padding:12px 20px;box-shadow:0 8px 24px rgba(0,0,0,0.1);z-index:9999;display:flex;align-items:center;gap:10px;transform:translateX(120%);transition:transform 0.3s ease;max-width:320px';
            document.body.appendChild(toast);
        }

        toast.innerHTML = '<i class="fas fa-check-circle" style="color:#10b981;font-size:1.2rem"></i><div><div style="font-weight:600;font-size:0.85rem">Da them vao gio hang</div><div style="font-size:0.8rem;color:#64748b">' + name + '</div></div>';
        toast.style.transform = 'translateX(0)';

        clearTimeout(toast._timer);
        toast._timer = setTimeout(() => {
            toast.style.transform = 'translateX(120%)';
        }, 2500);
    },

    init() {
        this.updateUI();

        // Add to cart buttons on product cards
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('.add-cart');
            if (!btn) return;

            e.preventDefault();
            e.stopPropagation();

            const card = btn.closest('.product-card') || btn.closest('[data-product-id]');
            if (!card) return;

            const id = card.dataset.productId || card.getAttribute('href')?.match(/product\/(\d+)/)?.[1];
            const name = card.querySelector('.product-info h3')?.textContent?.trim() || card.querySelector('h3')?.textContent?.trim() || 'San pham';
            const priceEl = card.querySelector('.product-price');
            let price = 0;
            if (priceEl) {
                const priceText = priceEl.textContent.replace(/[^\d]/g, '');
                price = parseInt(priceText) || 0;
            }

            const imgEl = card.querySelector('.product-image img');
            const image = imgEl?.src || '';

            if (id) {
                this.add({ id, name, price, image });
            }
        });

        // Product detail page - add to cart button
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('#addToCartBtn, .btn-add-cart');
            if (!btn) return;

            e.preventDefault();

            const id = btn.dataset.productId;
            const name = btn.dataset.productName || document.querySelector('.product-detail-name, .product-title')?.textContent?.trim();
            const price = parseInt(btn.dataset.productPrice) || 0;
            const salePrice = parseInt(btn.dataset.productSalePrice) || null;
            const image = btn.dataset.productImage || '';
            const variationId = btn.dataset.variationId || null;
            const variationLabel = btn.dataset.variationLabel || '';
            const qtyInput = document.querySelector('#productQuantity, .product-qty input');
            const quantity = parseInt(qtyInput?.value) || 1;

            if (id) {
                this.add({ id, name, price, sale_price: salePrice, image, quantity, variation_id: variationId, variation_label: variationLabel });
            }
        });
    }
};

// Init on page load
document.addEventListener('DOMContentLoaded', () => Cart.init());
