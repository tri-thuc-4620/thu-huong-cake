<!-- Header -->
<header class="header">
    <div class="container">
        <div class="header-content">
            <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>
            <a href="/" class="logo">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="Thu Hường Cake" class="logo-img">
            </a>
            <div class="search-bar">
                <input type="text" placeholder="Tìm sản phẩm bánh sinh nhật...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="header-actions">
                <a href="javascript:void(0)" class="header-action" onclick="openLogin()">
                    <i class="fas fa-user"></i>
                    <span>Đăng nhập</span>
                </a>
                <a href="javascript:void(0)" class="header-action cart-action" onclick="openCart()">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge">0</span>
                    <span>Giỏ hàng</span>
                </a>
            </div>
        </div>
    </div>
</header>
