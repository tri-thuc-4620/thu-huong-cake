@use('Illuminate\Support\Facades\Storage')
@extends('frontend.layouts.app')

@section('title', 'Bánh Sinh Nhật - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <span>Sản phẩm</span>
        </div>
    </div>

    <!-- Product Page Layout -->
    <section class="catalog-page">
        <div class="container">
            <div class="catalog-layout">

                <!-- Sidebar -->
                <aside class="catalog-sidebar">
                    <!-- Danh muc san pham -->
                    <div class="sidebar-box">
                        <h3 class="sidebar-title">Danh Mục Sản Phẩm</h3>
                        <ul class="sidebar-categories">
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('products', ['category' => $cat->slug]) }}" class="{{ request('category') == $cat->slug ? 'active' : '' }}">
                                    <i class="fas fa-chevron-right"></i> {{ $cat->name }}
                                    @if($cat->total_products > 0)
                                    <span class="cat-count">({{ $cat->total_products }})</span>
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Lien he dat banh -->
                    <div class="sidebar-box sidebar-contact">
                        <h3 class="sidebar-title">Liên Hệ Đặt Bánh</h3>
                        <ul class="sidebar-phones">
                            @forelse($stores as $store)
                            <li><span class="phone-label">{{ $store->short_name ?? $store->name }}</span> <a href="tel:{{ $store->phone }}">{{ $store->phone }}</a></li>
                            @empty
                            <li><span class="phone-label">Cơ Sở 1</span> <a href="tel:0982811096">0982811096</a></li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- San pham vua xem -->
                    <div class="sidebar-box">
                        <h3 class="sidebar-title">Sản Phẩm Vừa Xem</h3>
                        <div class="recently-viewed-list"></div>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="catalog-main">
                    <div class="catalog-header">
                        <h1>{{ $categories->firstWhere('slug', request('category'))?->name ?? 'Tất cả sản phẩm' }}</h1>
                    </div>

                    <!-- Category Intro -->
                    <div class="catalog-intro">
                        <p>Sinh nhật là dịp đặc biệt để gửi gắm những lời chúc yêu thương và tạo nên nhiều kỷ niệm đáng nhớ bên cạnh người thân yêu. Và tất nhiên, một chiếc <strong>bánh sinh nhật đẹp</strong>, ngon miệng sẽ là điểm nhấn không thể thiếu trong ngày này. Nếu bạn đang tìm kiếm một mẫu bánh vừa ấn tượng vừa phù hợp với từng đối tượng, hãy cùng <strong>Thu Hường Cake</strong> khám phá những mẫu bánh sinh nhật hot nhất 2025 ngay dưới đây!</p>
                        <button class="read-more-toggle">Xem Them <i class="fas fa-chevron-down"></i></button>
                    </div>

                    <!-- Sort Bar -->
                    <div class="catalog-sort">
                        <span>Sắp xếp theo:</span>
                        <div class="sort-options">
                            <a href="{{ route('products', array_merge(request()->except('sort', 'page'), ['sort' => 'price_desc'])) }}" class="sort-btn {{ request('sort') === 'price_desc' ? 'active' : (request('sort') === null ? 'active' : '') }}"><i class="fas fa-sort-amount-down"></i> Giá giảm dần</a>
                            <a href="{{ route('products', array_merge(request()->except('sort', 'page'), ['sort' => 'price_asc'])) }}" class="sort-btn {{ request('sort') === 'price_asc' ? 'active' : '' }}"><i class="fas fa-sort-amount-up"></i> Giá tăng dần</a>
                            <a href="{{ route('products', array_merge(request()->except('sort', 'page'), ['sort' => 'featured'])) }}" class="sort-btn {{ request('sort') === 'featured' ? 'active' : '' }}"><i class="fas fa-star"></i> Nổi bật</a>
                            <a href="{{ route('products', array_merge(request()->except('sort', 'page'), ['sort' => 'sale'])) }}" class="sort-btn {{ request('sort') === 'sale' ? 'active' : '' }}"><i class="fas fa-tags"></i> Giảm giá</a>
                            <a href="{{ route('products', array_merge(request()->except('sort', 'page'), ['sort' => 'hot'])) }}" class="sort-btn {{ request('sort') === 'hot' ? 'active' : '' }}"><i class="fas fa-fire"></i> Bán chạy</a>
                            <a href="{{ route('products', array_merge(request()->except('sort', 'page'), ['sort' => 'oldest'])) }}" class="sort-btn {{ request('sort') === 'oldest' ? 'active' : '' }}"><i class="fas fa-clock"></i> Cũ nhất</a>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="catalog-grid">
                        @forelse($products as $product)
                        <a href="{{ route('product.detail', $product->id) }}" class="product-card" data-product-id="{{ $product->id }}">
                            <div class="product-image">
                                @if($product->primaryImage)
                                    <img src="{{ Storage::url($product->primaryImage->image) }}" alt="{{ $product->name }}" onerror="this.src='{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}'">
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
                        @empty
                        <div style="grid-column: 1/-1; text-align:center; padding:40px 0; color:#999">
                            <i class="fas fa-box-open" style="font-size:48px;margin-bottom:16px;display:block"></i>
                            <p>Chưa có sản phẩm nào trong danh mục này.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($products->hasPages())
                    <div class="pagination">
                        @if($products->onFirstPage())
                            <span class="page-btn" style="opacity:0.5"><i class="fas fa-chevron-left"></i></span>
                        @else
                            <a href="{{ $products->withQueryString()->previousPageUrl() }}" class="page-btn"><i class="fas fa-chevron-left"></i></a>
                        @endif

                        @foreach($products->withQueryString()->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if($page == $products->currentPage())
                                <a href="{{ $url }}" class="page-btn active">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($products->hasMorePages())
                            <a href="{{ $products->withQueryString()->nextPageUrl() }}" class="page-btn"><i class="fas fa-chevron-right"></i></a>
                        @else
                            <span class="page-btn" style="opacity:0.5"><i class="fas fa-chevron-right"></i></span>
                        @endif
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
