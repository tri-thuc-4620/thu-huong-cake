@extends('frontend.layouts.app')

@section('title', 'Bánh kem quả bí ngô - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <a href="/products">Bánh Sinh Nhật</a>
            <i class="fas fa-chevron-right"></i>
            <span>Bánh kem quả bí ngô</span>
        </div>
    </div>

    <!-- Product Detail -->
    <section class="detail-page">
        <div class="container">
            <div class="detail-layout">

                <!-- Left: Images -->
                <div class="detail-gallery">
                    <div class="gallery-main">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem quả bí ngô" id="mainImage">
                    </div>
                    <div class="gallery-thumbs">
                        <button class="thumb active" onclick="changeImage(this, '{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}')">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Thumb 1">
                        </button>
                        <button class="thumb" onclick="changeImage(this, '{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}')">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Thumb 2">
                        </button>
                        <button class="thumb" onclick="changeImage(this, '{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}')">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Thumb 3">
                        </button>
                    </div>

                    <!-- San pham vua xem -->
                    <div class="sidebar-box detail-recently">
                        <h3 class="sidebar-title">Sản Phẩm Vừa Xem</h3>
                        <div class="recently-item">
                            <a href="#" class="recently-img">
                                <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Bánh trứng muối">
                            </a>
                            <div class="recently-info">
                                <a href="#">Bánh trứng muối trang trí kem tươi</a>
                                <span class="product-price">220.000 d</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Info -->
                <div class="detail-info">
                    <h1 class="detail-name">Bánh kem quả bí ngô</h1>

                    <div class="detail-meta">
                        <span><i class="fas fa-eye"></i> Lượt xem: <strong>1688</strong></span>
                        <span><i class="fas fa-heart"></i> Yêu thích: <span class="stars"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span></span>
                        <span>Trạng thái: <strong class="text-green">Còn bánh</strong></span>
                    </div>

                    <div class="detail-price">
                        Giá: <span>220.000 d</span>
                    </div>

                    <p class="detail-desc">Bánh kem quả bí ngô độc đáo mang đậm sắc màu lễ hội tháng 10 mang đến cảm giác vui nhộn nhưng vẫn giữ nét mà mị của Halloween.</p>

                    <!-- Kich thuoc -->
                    <div class="detail-option">
                        <label>Kích thước:</label>
                        <div class="option-buttons">
                            <button class="option-btn active">16cm</button>
                            <button class="option-btn">18cm</button>
                        </div>
                    </div>

                    <!-- Cot banh -->
                    <div class="detail-option">
                        <label>Cốt bánh:</label>
                        <div class="option-buttons">
                            <button class="option-btn active">Gato Vani Nhân Việt Quất</button>
                            <button class="option-btn">Gato Red Velvet</button>
                            <button class="option-btn">Gato Socola</button>
                            <button class="option-btn">Gato Trà Xanh</button>
                        </div>
                    </div>

                    <!-- So luong -->
                    <div class="detail-quantity">
                        <button class="qty-btn" id="qtyMinus">-</button>
                        <input type="number" value="1" min="1" id="qtyInput">
                        <button class="qty-btn" id="qtyPlus">+</button>
                    </div>

                    <!-- Dat banh -->
                    <a href="/checkout" class="btn-order">
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
                    <div class="desc-image-placeholder">
                        <i class="fas fa-image"></i>
                        <span>Hình ảnh mô tả sản phẩm</span>
                    </div>
                    <button class="read-more-toggle">Xem Them <i class="fas fa-chevron-down"></i></button>
                </div>
            </div>

            <!-- San pham lien quan -->
            <div class="related-products">
                <h2 class="section-title">Sản Phẩm Liên Quan</h2>
                <div class="products-grid">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Bánh mix vị trang trí noel">
                            <div class="product-overlay">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>Bánh mix vị trang trí noel</h3>
                            <span class="product-price">180.000 d</span>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Bánh sinh nhật chú gấu">
                            <div class="product-overlay">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>Bánh sinh nhật chú gấu</h3>
                            <span class="product-price">400.000 d</span>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Bánh sinh nhật thỏ hồng">
                            <div class="product-overlay">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>Bánh sinh nhật thỏ hồng đáng yêu</h3>
                            <span class="product-price">280.000 d</span>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Bánh kem tone hồng">
                            <div class="product-overlay">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>Bánh kem tone hồng tặng bạn gái</h3>
                            <span class="product-price">160.000 d</span>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh kem mini hồng">
                            <div class="product-overlay">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3>Bánh kem mini màu hồng đẹp</h3>
                            <span class="product-price">120.000 d</span>
                        </div>
                    </div>
                </div>
            </div>

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
