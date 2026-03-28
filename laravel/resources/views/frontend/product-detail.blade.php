@use('Illuminate\Support\Facades\Storage')
@extends('frontend.layouts.app')

@section('title', $product->meta_title ?? $product->name . ' - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            @if($product->category)
            <a href="{{ route('products', ['category' => $product->category->id]) }}">{{ $product->category->name }}</a>
            <i class="fas fa-chevron-right"></i>
            @endif
            <span>{{ $product->name }}</span>
        </div>
    </div>

    <!-- Product Detail -->
    <section class="detail-page">
        <div class="container">
            <div class="detail-layout">

                <!-- Left: Images -->
                <div class="detail-gallery">
                    <div class="gallery-main">
                        @if($product->primaryImage)
                        <img src="{{ Storage::url($product->primaryImage->image) }}" alt="{{ $product->name }}" id="mainImage">
                        @elseif($product->images->count() > 0)
                        <img src="{{ Storage::url($product->images->first()->image) }}" alt="{{ $product->name }}" id="mainImage">
                        @else
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $product->name }}" id="mainImage">
                        @endif
                    </div>
                    @if($product->images->count() > 0)
                    <div class="gallery-thumbs">
                        @foreach($product->images as $index => $image)
                        <button class="thumb {{ $index === 0 ? 'active' : '' }}" onclick="changeImage(this, '{{ Storage::url($image->image) }}')">
                            <img src="{{ Storage::url($image->image) }}" alt="{{ $image->alt_text ?? $product->name }}">
                        </button>
                        @endforeach
                    </div>
                    @endif

                    <!-- San pham vua xem -->
                    <div class="sidebar-box detail-recently">
                        <h3 class="sidebar-title">Sản Phẩm Vừa Xem</h3>
                        <p style="color:#999;font-size:13px;padding:10px 0">Chưa có sản phẩm nào</p>
                    </div>
                </div>

                <!-- Right: Info -->
                <div class="detail-info">
                    <h1 class="detail-name">{{ $product->name }}</h1>

                    <div class="detail-meta">
                        <span><i class="fas fa-eye"></i> Lượt xem: <strong>{{ number_format($product->views ?? 0) }}</strong></span>
                        <span><i class="fas fa-heart"></i> Yêu thích: <span class="stars"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span></span>
                        <span>Trạng thái: <strong class="text-green">{{ $product->stock_status === 'in_stock' ? 'Còn bánh' : 'Hết bánh' }}</strong></span>
                    </div>

                    <div class="detail-price">
                        @if($product->sale_price)
                        Giá: <span style="text-decoration:line-through;color:#999;font-size:16px;margin-right:8px">{{ number_format($product->price) }} đ</span>
                        <span>{{ number_format($product->sale_price) }} đ</span>
                        @else
                        Giá: <span>{{ number_format($product->price) }} đ</span>
                        @endif
                    </div>

                    @if($product->short_description)
                    <p class="detail-desc">{{ $product->short_description }}</p>
                    @endif

                    <!-- Variations -->
                    @if($product->type === 'variable' && $product->variations->count() > 0)
                        @php
                            // Group attribute values by attribute name
                            $attributeGroups = collect();
                            foreach($product->variations as $variation) {
                                foreach($variation->attributeValues as $attrVal) {
                                    $attrName = $attrVal->attribute->name;
                                    if (!$attributeGroups->has($attrName)) {
                                        $attributeGroups[$attrName] = collect();
                                    }
                                    if (!$attributeGroups[$attrName]->contains('id', $attrVal->id)) {
                                        $attributeGroups[$attrName]->push($attrVal);
                                    }
                                }
                            }
                        @endphp

                        @foreach($attributeGroups as $attrName => $values)
                        <div class="detail-option">
                            <label>{{ $attrName }}:</label>
                            <div class="option-buttons">
                                @foreach($values->sortBy('sort_order') as $index => $val)
                                <button class="option-btn {{ $index === 0 ? 'active' : '' }}" data-attribute="{{ $attrName }}" data-value="{{ $val->id }}">{{ $val->name }}</button>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    @endif

                    <!-- So luong -->
                    <div class="detail-quantity">
                        <button class="qty-btn" id="qtyMinus">-</button>
                        <input type="number" value="1" min="1" id="qtyInput">
                        <button class="qty-btn" id="qtyPlus">+</button>
                    </div>

                    <!-- Them vao gio hang -->
                    <button type="button" class="btn-add-cart" id="addToCartBtn"
                        data-product-id="{{ $product->id }}"
                        data-product-name="{{ $product->name }}"
                        data-product-price="{{ $product->price }}"
                        data-product-sale-price="{{ $product->sale_price }}"
                        data-product-image="{{ $product->primaryImage ? Storage::url($product->primaryImage->image) : '' }}"
                        style="width:100%;padding:14px;border:none;border-radius:12px;background:linear-gradient(135deg,#e84393,#fd79a8);color:#fff;font-weight:700;font-size:1rem;cursor:pointer;margin-bottom:10px;transition:all 0.3s">
                        <i class="fas fa-shopping-cart" style="margin-right:8px"></i> Them Vao Gio Hang
                    </button>

                    <!-- Dat banh -->
                    <a href="{{ route('checkout') }}" class="btn-order">
                        <span class="btn-order-main">Đặt Bánh Ngay</span>
                        <span class="btn-order-sub">Freeship dưới 3km cho đơn hàng từ 300K</span>
                    </a>

                    <!-- Chat Zalo -->
                    <a href="#" class="btn-zalo">
                        <span class="btn-zalo-label">Chat Zalo</span>
                        <span class="btn-zalo-phone">0962.849.989</span>
                    </a>

                    <!-- Yeu cau goi lai -->
                    <div class="callback-form">
                        <span>Yêu cầu Gọi lại</span>
                        <div class="callback-input">
                            <input type="tel" placeholder="Nhập số điện thoại">
                            <button>Gửi</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Mo ta san pham -->
            <div class="detail-description">
                <div class="desc-tabs">
                    <button class="desc-tab active">Mô Tả</button>
                    <button class="desc-tab">Đánh Giá</button>
                </div>
                <div class="desc-content">
                    @if($product->description)
                    <div class="product-description-content">
                        {!! $product->description !!}
                    </div>
                    @else
                    <div class="desc-image-placeholder">
                        <i class="fas fa-image"></i>
                        <span>Hình ảnh mô tả sản phẩm</span>
                    </div>
                    @endif
                    <button class="read-more-toggle">Xem Them <i class="fas fa-chevron-down"></i></button>
                </div>
            </div>

            <!-- San pham lien quan -->
            @if($relatedProducts && $relatedProducts->count() > 0)
            <div class="related-products">
                <h2 class="section-title">Sản Phẩm Liên Quan</h2>
                <div class="products-grid">
                    @foreach($relatedProducts as $rp)
                    <a href="{{ route('product.detail', $rp->id) }}" class="product-card">
                        <div class="product-image">
                            @if($rp->primaryImage)
                                <img src="{{ Storage::url($rp->primaryImage->image) }}" alt="{{ $rp->name }}">
                            @else
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $rp->name }}">
                            @endif
                            @if($rp->is_hot)<span class="product-tag">Hot</span>@endif
                            @if($rp->is_new)<span class="product-tag" style="background:#10b981">Mới</span>@endif
                            <div class="product-overlay">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>{{ $rp->name }}</h3>
                            @if($rp->sale_price)
                                <span class="product-price" style="text-decoration:line-through;color:#999;font-size:12px">{{ number_format($rp->price) }} đ</span>
                                <span class="product-price">{{ number_format($rp->sale_price) }} đ</span>
                            @else
                                <span class="product-price">{{ number_format($rp->price) }} đ</span>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Gallery image switch
    function changeImage(thumb, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
        thumb.classList.add('active');
    }

    // Quantity
    document.getElementById('qtyMinus').addEventListener('click', () => {
        const input = document.getElementById('qtyInput');
        if (input.value > 1) input.value = parseInt(input.value) - 1;
    });
    document.getElementById('qtyPlus').addEventListener('click', () => {
        const input = document.getElementById('qtyInput');
        input.value = parseInt(input.value) + 1;
    });

    // Option buttons
    document.querySelectorAll('.option-buttons').forEach(group => {
        group.querySelectorAll('.option-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                group.querySelectorAll('.option-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    });
</script>
@endpush
