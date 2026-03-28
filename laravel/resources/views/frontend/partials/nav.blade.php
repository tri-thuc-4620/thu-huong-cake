@php
    $navCategories = App\Models\Category::where('show_in_menu', true)->whereNull('parent_id')->orderBy('sort_order')->get();
@endphp

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
                    @foreach($navCategories as $cat)
                        <a href="{{ route('products', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
                    @endforeach
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
