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
    <div class="cart-drawer-count">Bạn đang có <strong>1</strong> sản phẩm trong giỏ hàng.</div>
    <div class="cart-drawer-items">
        <div class="cart-drawer-item">
            <div class="cart-item-img">
                <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Banh kem">
            </div>
            <div class="cart-item-info">
                <h4>Bánh Kem Sinh Nhật Dâu Tây Premium</h4>
                <p class="cart-item-variant">16cm - Gato Vani Viet Quat</p>
                <span class="cart-item-price">450.000d</span> <span class="cart-item-qty">x 1</span>
                <br><button class="cart-item-remove">Xóa</button>
            </div>
        </div>
    </div>
    <div class="cart-drawer-footer">
        <div class="cart-total-row">
            <span>Tổng tiền tạm tính:</span>
            <span>450.000d</span>
        </div>
        <a href="#" class="btn-cart-checkout">Tiến Hành Đặt Hàng</a>
        <a href="/products" class="cart-detail-link">Xem chi tiết giỏ hàng <i class="fas fa-arrow-right"></i></a>
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
