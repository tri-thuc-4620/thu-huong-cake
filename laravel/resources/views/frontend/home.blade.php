@use('Illuminate\Support\Facades\Storage')
@extends('frontend.layouts.app')

@section('title', 'Thu Hường Cake - Bánh Sinh Nhật Đẹp & Ngon')

@section('content')
    <!-- Hero Slider -->
    <section class="hero">
        <div class="hero-slider" id="heroSlider">
            @forelse($slides as $index => $slide)
            <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-text">
                            <span class="hero-badge">{{ $slide->badge_text ?? 'Thu Hường Cake' }}</span>
                            <h1>{{ $slide->title_line_1 }}<br><span>{{ $slide->title_line_2 }}</span></h1>
                            <p>{{ $slide->description }}</p>
                            <div class="hero-buttons">
                                @if($slide->button_1_text)
                                <a href="{{ $slide->button_1_url ?? '/products' }}" class="btn btn-primary">{{ $slide->button_1_text }}</a>
                                @endif
                                @if($slide->button_2_text)
                                <a href="{{ $slide->button_2_url ?? '/products' }}" class="btn btn-outline">{{ $slide->button_2_text }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="hero-image">
                            @if($slide->image)
                            <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title_line_1 }}" class="hero-img">
                            @else
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $slide->title_line_1 }}" class="hero-img">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="hero-slide active">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-text">
                            <span class="hero-badge">Thu Hường Cake</span>
                            <h1>Bánh Sinh Nhật<br><span>Tươi Ngon Mỗi Ngày</span></h1>
                            <p>Mang đến những chiếc bánh tươi ngon, đẹp mắt, được làm từ nguyên liệu tươi sạch, giao hàng nhanh trong 1 giờ.</p>
                            <div class="hero-buttons">
                                <a href="/products" class="btn btn-primary">Đặt Bánh Ngay</a>
                                <a href="/products" class="btn btn-outline">Xem Menu</a>
                            </div>
                        </div>
                        <div class="hero-image">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem việt quất" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <button class="hero-prev" onclick="heroSlide(-1)"><i class="fas fa-chevron-left"></i></button>
        <button class="hero-next" onclick="heroSlide(1)"><i class="fas fa-chevron-right"></i></button>
        <div class="hero-dots" id="heroDots">
            @if($slides->count() > 0)
                @foreach($slides as $index => $slide)
                <span class="dot {{ $index === 0 ? 'active' : '' }}" onclick="heroGoTo({{ $index }})"></span>
                @endforeach
            @else
                <span class="dot active" onclick="heroGoTo(0)"></span>
            @endif
        </div>
    </section>

    <!-- Feature Banners -->
    @if($banners->count() > 0)
    <section class="feature-banners">
        <div class="container">
            <div class="banners-grid">
                @foreach($banners as $banner)
                <a href="{{ $banner->url ?? '/products' }}" class="banner-card">
                    @if($banner->image)
                    <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}">
                    @else
                    <img src="{{ asset('frontend/images/web2-01.webp') }}" alt="{{ $banner->title }}">
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <section class="feature-banners">
        <div class="container">
            <div class="banners-grid">
                <a href="/products" class="banner-card">
                    <img src="{{ asset('frontend/images/web2-01.webp') }}" alt="Ship hỏa tốc 1H - Freeship 3km đơn từ 300K">
                </a>
                <a href="/products" class="banner-card">
                    <img src="{{ asset('frontend/images/web2-02.webp') }}" alt="Mở cửa 7:00 - 23:00 tất cả các ngày">
                </a>
                <a href="/products" class="banner-card">
                    <img src="{{ asset('frontend/images/Anh-co-so-thu-huong-cake.webp') }}" alt="Bản đồ các chi nhánh Thu Hường Cake">
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- San pham moi -->
    @php
        $newProductsList = ($newProducts && $newProducts->count() > 0) ? $newProducts : $latestProducts;
    @endphp
    @if($newProductsList && $newProductsList->count() > 0)
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">Mới Nhất</span>
                    <h2 class="section-title">Sản Phẩm Mới</h2>
                </div>
                <a href="{{ route('products') }}" class="view-all-btn">Xem toàn bộ <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                @foreach($newProductsList as $product)
                <a href="{{ route('product.detail', $product->id) }}" class="product-card">
                    <div class="product-image">
                        @if($product->primaryImage)
                            <img src="{{ Storage::url($product->primaryImage->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $product->name }}">
                        @endif
                        @if($product->is_hot)<span class="product-tag">Hot</span>@endif
                        @if($product->is_new)<span class="product-tag" style="background:#10b981">Mới</span>@endif
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        @if($product->sale_price)
                            <span class="product-price" style="text-decoration:line-through;color:#999;font-size:12px">{{ number_format($product->price) }} đ</span>
                            <span class="product-price">{{ number_format($product->sale_price) }} đ</span>
                        @else
                            <span class="product-price">{{ number_format($product->price) }} đ</span>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- San pham Hot -->
    @if($hotProducts && $hotProducts->count() > 0)
    <section class="products-section alt-bg">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">Bán Chạy</span>
                    <h2 class="section-title">Sản Phẩm Hot</h2>
                </div>
                <a href="{{ route('products') }}" class="view-all-btn">Xem toàn bộ <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                @foreach($hotProducts as $product)
                <a href="{{ route('product.detail', $product->id) }}" class="product-card">
                    <div class="product-image">
                        @if($product->primaryImage)
                            <img src="{{ Storage::url($product->primaryImage->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $product->name }}">
                        @endif
                        @if($product->is_hot)<span class="product-tag">Hot</span>@endif
                        @if($product->is_new)<span class="product-tag" style="background:#10b981">Mới</span>@endif
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        @if($product->sale_price)
                            <span class="product-price" style="text-decoration:line-through;color:#999;font-size:12px">{{ number_format($product->price) }} đ</span>
                            <span class="product-price">{{ number_format($product->sale_price) }} đ</span>
                        @else
                            <span class="product-price">{{ number_format($product->price) }} đ</span>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- San pham noi bat -->
    @if($featuredProducts && $featuredProducts->count() > 0)
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">Đặc Biệt</span>
                    <h2 class="section-title">Sản Phẩm Nổi Bật</h2>
                </div>
                <a href="{{ route('products') }}" class="view-all-btn">Xem toàn bộ <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                @foreach($featuredProducts as $product)
                <a href="{{ route('product.detail', $product->id) }}" class="product-card">
                    <div class="product-image">
                        @if($product->primaryImage)
                            <img src="{{ Storage::url($product->primaryImage->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $product->name }}">
                        @endif
                        @if($product->is_hot)<span class="product-tag">Hot</span>@endif
                        @if($product->is_new)<span class="product-tag" style="background:#10b981">Mới</span>@endif
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        @if($product->sale_price)
                            <span class="product-price" style="text-decoration:line-through;color:#999;font-size:12px">{{ number_format($product->price) }} đ</span>
                            <span class="product-price">{{ number_format($product->sale_price) }} đ</span>
                        @else
                            <span class="product-price">{{ number_format($product->price) }} đ</span>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Danh muc hien thi trang chu -->
    @if(isset($homeCategories))
    @foreach($homeCategories as $homeCat)
    @if($homeCat->homeProducts && $homeCat->homeProducts->count() > 0)
    <section class="products-section {{ $loop->even ? 'alt-bg' : '' }}">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">{{ $homeCat->parent?->name ?? 'Danh muc' }}</span>
                    <h2 class="section-title">{{ $homeCat->name }}</h2>
                </div>
                <a href="{{ route('products', ['category' => $homeCat->slug]) }}" class="view-all-btn">Xem toan bo <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                @foreach($homeCat->homeProducts as $product)
                <a href="{{ route('product.detail', $product->id) }}" class="product-card">
                    <div class="product-image">
                        @if($product->primaryImage)
                            <img src="{{ Storage::url($product->primaryImage->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $product->name }}">
                        @endif
                        @if($product->is_hot)<span class="product-tag">Hot</span>@endif
                        @if($product->is_new)<span class="product-tag" style="background:#10b981">Moi</span>@endif
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        @if($product->sale_price)
                            <span class="product-price" style="text-decoration:line-through;color:#999;font-size:12px">{{ number_format($product->price) }} d</span>
                            <span class="product-price">{{ number_format($product->sale_price) }} d</span>
                        @else
                            <span class="product-price">{{ number_format($product->price) }} d</span>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach
    @endif

    <!-- Blog / Tin Tuc -->
    @if($blogPosts && $blogPosts->count() > 0)
    <section class="blog-section">
        <div class="container">
            <div class="section-header center">
                <div class="section-title-group">
                    <span class="section-label">Cập Nhật</span>
                    <h2 class="section-title">Tin Tức & Blog</h2>
                </div>
            </div>
            <div class="blog-grid">
                @foreach($blogPosts as $index => $post)
                <div class="blog-card {{ $index === 0 ? 'featured' : '' }}">
                    <div class="blog-image">
                        @if($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
                        @else
                        <div class="blog-image-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        @endif
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fas fa-calendar"></i> {{ $post->published_at ? $post->published_at->format('d-m-Y') : '' }}</span>
                            <span><i class="fas fa-eye"></i> {{ $post->views ?? 0 }}</span>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ Str::limit($post->excerpt, 100) }}</p>
                        <a href="{{ route('blog.detail', $post->id) }}" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
