<!-- Navigation -->
<nav class="main-nav">
    <div class="container">
        <div class="nav-content">
            <div class="nav-category-wrapper">
                <div class="nav-category-btn">
                    <i class="fas fa-bars"></i>
                    <span>Danh mục bánh sinh nhật</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="nav-category-dropdown">
                    <a href="#">Bánh Sinh Nhật Mini</a>
                    <a href="#">Bánh Sinh Nhật Hoa Quả</a>
                    <a href="#">Bánh Bông Lan Trứng Muối</a>
                    <a href="#">Set Bánh Làm Quà</a>
                    <a href="#">Bánh Đặc Biệt ( Signature Cakes )</a>
                </div>
            </div>
            <ul class="nav-links">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Trang chủ</a></li>
                <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">Về chúng tôi</a></li>
                <li><a href="/products" class="{{ request()->is('products*') ? 'active' : '' }}">Bánh sinh nhật</a></li>
                <li><a href="/guide" class="{{ request()->is('guide') ? 'active' : '' }}">Hướng dẫn đặt bánh</a></li>
                <li><a href="/blog" class="{{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
                <li><a href="/stores" class="{{ request()->is('stores') ? 'active' : '' }}">Cửa hàng</a></li>
            </ul>
        </div>
    </div>
</nav>
