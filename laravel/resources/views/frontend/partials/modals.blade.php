<!-- Lightbox -->
<div class="lightbox" id="lightbox" onclick="if(event.target===this)closeLightbox()">
    <button class="lightbox-close" onclick="closeLightbox()"><i class="fas fa-times"></i></button>
    <button class="lightbox-prev" onclick="prevLightbox()"><i class="fas fa-chevron-left"></i></button>
    <img class="lightbox-img" id="lightboxImg" src="" alt="">
    <button class="lightbox-next" onclick="nextLightbox()"><i class="fas fa-chevron-right"></i></button>
    <div class="lightbox-counter" id="lightboxCounter"></div>
</div>

<!-- Login Modal -->
<div class="login-overlay" id="loginOverlay" onclick="if(event.target===this)closeLogin()">
    <div class="login-modal">
        <button class="login-close" onclick="closeLogin()"><i class="fas fa-times"></i></button>
        <h3>Đăng Nhập</h3>
        <form class="login-form" onsubmit="event.preventDefault();alert('Đăng nhập thành công!')">
            <div class="form-group">
                <label>Tên tài khoản hoặc địa chỉ email *</label>
                <input type="text" placeholder="Adminthuhuongcake" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu *</label>
                <input type="password" placeholder="••••••••••" required>
            </div>
            <label class="login-remember">
                <input type="checkbox">
                Ghi nhớ mật khẩu
            </label>
            <button type="submit" class="btn-login">Đăng Nhập</button>
            <div class="login-footer">
                <a href="#">Quên mật khẩu?</a>
            </div>
        </form>
        <div class="login-divider">hoặc</div>
        <button class="btn-register" onclick="alert('Chức năng đăng ký đang phát triển!')">Đăng Ký Tài Khoản Mới</button>
    </div>
</div>

<!-- Cart Drawer -->
<div class="cart-overlay" id="cartOverlay" onclick="closeCart()"></div>
<div class="cart-drawer" id="cartDrawer">
    <div class="cart-drawer-header">
        <h3>Giỏ Hàng</h3>
        <button class="cart-drawer-close" onclick="closeCart()"><i class="fas fa-times"></i></button>
    </div>
    <div class="cart-drawer-count" id="cartDrawerCount">Gio hang trong.</div>
    <div class="cart-drawer-items" id="cartDrawerItems">
        <div class="text-center py-4" style="color:#94a3b8">
            <i class="fas fa-shopping-bag" style="font-size:2rem;display:block;margin-bottom:8px"></i>
            Gio hang trong
        </div>
    </div>
    <div class="cart-drawer-footer">
        <div class="cart-total-row">
            <span>Tổng tiền tạm tính:</span>
            <span id="cartDrawerTotal">0đ</span>
        </div>
        <a href="{{ route('checkout') }}" class="btn-cart-checkout">Tiến Hành Đặt Hàng</a>
        <button onclick="Cart.clear()" class="cart-detail-link" style="background:none;border:none;color:var(--primary);cursor:pointer;width:100%;text-align:center;margin-top:8px;font-size:0.85rem">Xóa giỏ hàng</button>
    </div>
</div>

<!-- Floating Contact -->
<div class="floating-contact" id="floatingContact">
    <div class="floating-menu">
        <a href="#" class="floating-item">
            <div class="floating-item-icon messenger"><i class="fab fa-facebook-messenger"></i></div>
            <span class="floating-item-label">Messenger</span>
        </a>
        <a href="#" class="floating-item">
            <div class="floating-item-icon zalo">Zalo</div>
            <span class="floating-item-label">Zalo chat</span>
        </a>
        <a href="tel:0962849989" class="floating-item">
            <div class="floating-item-icon phone"><i class="fas fa-phone-alt"></i></div>
            <span class="floating-item-label">Gọi 0962849989</span>
        </a>
    </div>
    <button class="floating-toggle" onclick="this.parentElement.classList.toggle('open')">
        <i class="fas fa-comment-dots"></i>
        <i class="fas fa-times"></i>
    </button>
</div>
