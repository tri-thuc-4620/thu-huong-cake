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
            const imgSrc = (item.image && item.image !== '' && !item.image.endsWith('/')) ? item.image : 'https://placehold.co/80x80/f0fdf4/10b981?text=%F0%9F%8E%82';
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

        // Product detail page: handled by inline script in product-detail.blade.php
        // (to avoid duplicate add-to-cart events)
    }
};

/**
 * Recently Viewed - sessionStorage
 * Luu san pham vua xem, tu xoa khi dong trinh duyet
 */
const RecentlyViewed = {
    KEY: 'thu_huong_recently_viewed',
    MAX: 10,

    getItems() {
        try { return JSON.parse(sessionStorage.getItem(this.KEY)) || []; }
        catch { return []; }
    },

    add(product) {
        // product: { id, name, price, sale_price, image, url }
        if (!product.id) return;
        let items = this.getItems().filter(i => i.id !== product.id);
        items.unshift(product);
        if (items.length > this.MAX) items = items.slice(0, this.MAX);
        sessionStorage.setItem(this.KEY, JSON.stringify(items));
        this.renderAll();
    },

    renderAll() {
        document.querySelectorAll('.recently-viewed-list').forEach(el => this.render(el));
    },

    render(container) {
        if (!container) return;
        const items = this.getItems();
        if (items.length === 0) {
            container.innerHTML = '<p style="color:#94a3b8;font-size:0.85rem;padding:8px 0">Chua co san pham nao.</p>';
            return;
        }
        container.innerHTML = items.map(item => {
            const imgSrc = (item.image && item.image !== '') ? item.image : 'https://placehold.co/60x60/f0fdf4/10b981?text=%F0%9F%8E%82';
            const price = item.sale_price || item.price;
            return `
                <div class="recently-item" style="display:flex;align-items:center;gap:10px;padding:8px 0;border-bottom:1px solid #f1f5f9">
                    <a href="${item.url}" style="flex-shrink:0">
                        <img src="${imgSrc}" alt="${item.name}" style="width:50px;height:50px;border-radius:8px;object-fit:cover">
                    </a>
                    <div style="flex:1;min-width:0">
                        <a href="${item.url}" style="font-size:0.8rem;font-weight:500;color:#0f172a;text-decoration:none;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${item.name}</a>
                        <span style="font-size:0.8rem;color:#10b981;font-weight:600">${new Intl.NumberFormat('vi-VN').format(price)}đ</span>
                    </div>
                </div>
            `;
        }).join('');
    },

    init() {
        this.renderAll();
    }
};

// Init on page load
document.addEventListener('DOMContentLoaded', () => {
    Cart.init();
    RecentlyViewed.init();
});
