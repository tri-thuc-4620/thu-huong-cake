<!-- Mobile Menu Overlay -->
<div class="mobile-overlay" id="mobileOverlay"></div>

<!-- Mobile Drawer Menu -->
<div class="mobile-drawer" id="mobileDrawer">
    <button class="drawer-close" id="drawerClose"><i class="fas fa-times"></i></button>

    <div class="drawer-tabs">
        <button class="drawer-tab active" data-tab="menu">Menu</button>
        <button class="drawer-tab" data-tab="category">Danh mục Bánh</button>
    </div>

    <div class="drawer-panel active" id="panel-menu">
        <ul class="drawer-links">
            <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Trang chủ</a></li>
            <li><a href="/about">Về chúng tôi</a></li>
            <li><a href="/products">Bánh sinh nhật</a></li>
            <li><a href="/guide">Hướng dẫn đặt bánh</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/stores">Danh sách cửa hàng</a></li>
            <li><a href="javascript:void(0)">Đăng nhập / Đăng ký</a></li>
        </ul>
    </div>

    <div class="drawer-panel" id="panel-category">
        <ul class="drawer-links">
            <li><a href="#">Bánh Sinh Nhật Mini</a></li>
            <li><a href="#">Bánh Sinh Nhật Hoa Quả</a></li>
            <li><a href="#">Bánh Bông Lan Trứng Muối</a></li>
            <li class="has-sub">
                <a href="#">Set Bánh Làm Quà <i class="fas fa-chevron-down"></i></a>
            </li>
            <li class="has-sub">
                <a href="#">Bánh Đặc Biệt ( Signature Cakes ) <i class="fas fa-chevron-down"></i></a>
            </li>
            <li class="has-sub">
                <a href="#">Bánh Sinh Nhật Cho Bé <i class="fas fa-chevron-down"></i></a>
            </li>
            <li class="has-sub">
                <a href="#">Bánh Kem Sự Kiện <i class="fas fa-chevron-down"></i></a>
            </li>
            <li><a href="#">Bánh Sinh Nhật Tầng</a></li>
            <li><a href="#">Bánh Sinh Nhật Hình Trái Tim</a></li>
            <li><a href="#">Bánh Sinh Nhật Hoa Kem</a></li>
            <li><a href="#">Bánh Kem Vẽ Hình</a></li>
            <li><a href="#">Bánh Kem Tạo Hình</a></li>
        </ul>
    </div>
</div>
