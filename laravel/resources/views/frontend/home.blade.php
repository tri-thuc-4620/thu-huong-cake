@extends('frontend.layouts.app')

@section('title', 'Thu Hường Cake - Bánh Sinh Nhật Đẹp & Ngon')

@section('content')
    <!-- Hero Slider -->
    <section class="hero">
        <div class="hero-slider" id="heroSlider">
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
            <div class="hero-slide">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-text">
                            <span class="hero-badge">Đặc Biệt</span>
                            <h1>Set Bánh Làm Quà<br><span>Ngọt Ngào Yêu Thương</span></h1>
                            <p>Những set bánh xinh xắn, được đóng hộp tinh tế, hoàn hảo để làm quà tặng cho người thân yêu.</p>
                            <div class="hero-buttons">
                                <a href="/products" class="btn btn-primary">Xem Ngay</a>
                                <a href="/guide" class="btn btn-outline">Hướng Dẫn Đặt</a>
                            </div>
                        </div>
                        <div class="hero-image">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh kem mini hồng" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-text">
                            <span class="hero-badge">Freeship 3km</span>
                            <h1>Giao Hàng<br><span>Nhanh Trong 1 Giờ</span></h1>
                            <p>Ship hỏa tốc trong vòng 1 giờ, freeship 3km cho đơn hàng từ 300K. Đặt bánh dễ dàng, nhận bánh tận nơi.</p>
                            <div class="hero-buttons">
                                <a href="/products" class="btn btn-primary">Đặt Bánh Ngay</a>
                                <a href="/stores" class="btn btn-outline">Tìm Cửa Hàng</a>
                            </div>
                        </div>
                        <div class="hero-image">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh bông lan kem trứng" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="hero-prev" onclick="heroSlide(-1)"><i class="fas fa-chevron-left"></i></button>
        <button class="hero-next" onclick="heroSlide(1)"><i class="fas fa-chevron-right"></i></button>
        <div class="hero-dots" id="heroDots">
            <span class="dot active" onclick="heroGoTo(0)"></span>
            <span class="dot" onclick="heroGoTo(1)"></span>
            <span class="dot" onclick="heroGoTo(2)"></span>
        </div>
    </section>

    <!-- Feature Banners -->
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

    <!-- Set Banh Lam Qua -->
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">Bộ Sưu Tập</span>
                    <h2 class="section-title">Set Bánh Làm Quà</h2>
                </div>
                <a href="/products" class="view-all-btn">Xem toàn bộ <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Set quà tặng bánh mix vị">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Set quà tặng bánh mix vị</h3>
                        <span class="product-price">90.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Set bánh mix vị trái tim">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Set bánh mix vị trái tim</h3>
                        <span class="product-price">135.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Set bánh mini mix vị">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Set bánh mini mix vị</h3>
                        <span class="product-price">300.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Sweet box mix vị trái tim">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Sweet box mix vị trái tim</h3>
                        <span class="product-price">135.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Sweet box mix vị trái cây">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Sweet box mix vị trái cây</h3>
                        <span class="product-price">180.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Set quà tặng bánh mix vị">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Set quà tặng bánh mix vị</h3>
                        <span class="product-price">90.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Set bánh mix vị trái tim">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Set bánh mix vị trái tim</h3>
                        <span class="product-price">135.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Set bánh mini mix vị">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Set bánh mini mix vị</h3>
                        <span class="product-price">300.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Sweet box mix vị trái tim">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Sweet box mix vị trái tim</h3>
                        <span class="product-price">135.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Sweet box mix vị trái cây">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Sweet box mix vị trái cây</h3>
                        <span class="product-price">180.000 d</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banh Sinh Nhat Mini -->
    <section class="products-section alt-bg">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">Nhỏ Xinh</span>
                    <h2 class="section-title">Bánh Sinh Nhật Mini</h2>
                </div>
                <a href="/products" class="view-all-btn">Xem toàn bộ <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem việt quất tươi mát">
                        <span class="product-tag">Hot</span>
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh kem việt quất tươi mát</h3>
                        <span class="product-price">160.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh kem mini màu hồng đẹp">
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
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh sinh nhật kem chảy tone hồng">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật kem chảy tone hồng</h3>
                        <span class="product-price">160.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Bánh kem mini dâu tây">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh kem mini dâu tây</h3>
                        <span class="product-price">120.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Bánh sinh nhật size nhỏ xinh xắn">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật size nhỏ xinh xắn</h3>
                        <span class="product-price">120.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem việt quất tươi mát">
                        <span class="product-tag">Hot</span>
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh kem việt quất tươi mát</h3>
                        <span class="product-price">160.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh kem mini màu hồng đẹp">
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
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh sinh nhật kem chảy tone hồng">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật kem chảy tone hồng</h3>
                        <span class="product-price">160.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Bánh kem mini dâu tây">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh kem mini dâu tây</h3>
                        <span class="product-price">120.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Bánh sinh nhật size nhỏ xinh xắn">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật size nhỏ xinh xắn</h3>
                        <span class="product-price">120.000 d</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banh Sinh Nhat Lon -->
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">Đặc Biệt</span>
                    <h2 class="section-title">Bánh Sinh Nhật</h2>
                </div>
                <a href="/products" class="view-all-btn">Xem toàn bộ <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Bánh sinh nhật cho tiệc liên hoan">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật cho tiệc liên hoan</h3>
                        <span class="product-price">500.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem văn phòng">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh kem văn phòng</h3>
                        <span class="product-price">500.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Bánh sinh nhật hình chữ nhật hoa quả">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật hình chữ nhật hoa quả</h3>
                        <span class="product-price">500.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh sinh nhật vuông hoa kem đẹp">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật vuông hoa kem đẹp</h3>
                        <span class="product-price">610.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh gato hình vuông trang trí hoa kem">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh gato hình vuông trang trí hoa kem</h3>
                        <span class="product-price">1.000.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Bánh sinh nhật cho tiệc liên hoan">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật cho tiệc liên hoan</h3>
                        <span class="product-price">500.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem văn phòng">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh kem văn phòng</h3>
                        <span class="product-price">500.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Bánh sinh nhật hình chữ nhật hoa quả">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật hình chữ nhật hoa quả</h3>
                        <span class="product-price">500.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh sinh nhật vuông hoa kem đẹp">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh sinh nhật vuông hoa kem đẹp</h3>
                        <span class="product-price">610.000 d</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh gato hình vuông trang trí hoa kem">
                        <div class="product-overlay">
                            <button class="quick-view"><i class="fas fa-eye"></i></button>
                            <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>Bánh gato hình vuông trang trí hoa kem</h3>
                        <span class="product-price">1.000.000 d</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog / Tin Tuc -->
    <section class="blog-section">
        <div class="container">
            <div class="section-header center">
                <div class="section-title-group">
                    <span class="section-label">Cập Nhật</span>
                    <h2 class="section-title">Tin Tức & Blog</h2>
                </div>
            </div>
            <div class="blog-grid">
                <div class="blog-card featured">
                    <div class="blog-image">
                        <div class="blog-image-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fas fa-calendar"></i> 03-08-2025</span>
                            <span><i class="fas fa-eye"></i> 1840</span>
                        </div>
                        <h3>Set bánh cupcake sinh nhật TPHCM</h3>
                        <p>Có bao giờ bạn cảm thấy bánh sinh nhật truyền thống đã trở nên quá...</p>
                        <a href="/blog/1" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-image">
                        <div class="blog-image-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fas fa-calendar"></i> 31-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1769</span>
                        </div>
                        <h3>Tiệm bánh Tiramisu TPHCM</h3>
                        <p>Có những chiếc bánh chỉ đơn giản là để ăn cho "thỏa cơn thèm"...</p>
                        <a href="/blog/1" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-image">
                        <div class="blog-image-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fas fa-calendar"></i> 29-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1769</span>
                        </div>
                        <h3>Tiệm bánh sinh nhật quận 8</h3>
                        <p>Sinh nhật là ngày đặc biệt, dù đơn giản hay linh đình, ai cũng mong...</p>
                        <a href="/blog/1" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
