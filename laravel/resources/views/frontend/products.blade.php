@extends('frontend.layouts.app')

@section('title', 'Bánh Sinh Nhật - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <span>Bánh Sinh Nhật</span>
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
                            <li><a href="#" class="active"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Mini</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Hoa Quả</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Bông Lan Trứng Muối</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Set Bánh Làm Quà</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Đặc Biệt ( Signature Cakes )</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Cho Bé</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Kem Sự Kiện</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Tầng</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Hình Trái Tim</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Hoa Kem</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Kem Vẽ Hình</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Kem Tạo Hình</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Ăn Nhanh</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật</a></li>
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Kem Ngày Lễ</a></li>
                        </ul>
                    </div>

                    <!-- Lien he dat banh -->
                    <div class="sidebar-box sidebar-contact">
                        <h3 class="sidebar-title">Liên Hệ Đặt Bánh</h3>
                        <ul class="sidebar-phones">
                            <li><span class="phone-label">Cơ Sở 1</span> <a href="tel:0982811096">0982811096</a></li>
                            <li><span class="phone-label">Cơ Sở 2</span> <a href="tel:0965688385">0965688385</a></li>
                            <li><span class="phone-label">Cơ Sở 3</span> <a href="tel:0984438898">0984438898</a></li>
                            <li><span class="phone-label">Cơ Sở 4</span> <a href="tel:0988064164">0988064164</a></li>
                            <li><span class="phone-label">Cơ Sở 5</span> <a href="tel:0962711371">0962711371</a></li>
                            <li><span class="phone-label">Cơ Sở 6</span> <a href="tel:0988504514">0988504514</a></li>
                            <li><span class="phone-label">Cơ Sở 7</span> <a href="tel:0963910920">0963910920</a></li>
                            <li><span class="phone-label">Cơ Sở 8</span> <a href="tel:0862089099">0862089099</a></li>
                        </ul>
                    </div>

                    <!-- San pham vua xem -->
                    <div class="sidebar-box">
                        <h3 class="sidebar-title">Sản Phẩm Vừa Xem</h3>
                        <div class="recently-item">
                            <a href="/product/1" class="recently-img">
                                <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Bánh bông lan trứng muối">
                            </a>
                            <div class="recently-info">
                                <a href="/product/1">Bánh bông lan trứng muối truyền thống</a>
                                <span class="product-price">220.000đ</span>
                            </div>
                        </div>
                        <div class="recently-item">
                            <a href="/product/1" class="recently-img">
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh kem mini hồng">
                            </a>
                            <div class="recently-info">
                                <a href="/product/1">Bánh kem mini màu hồng đẹp</a>
                                <span class="product-price">120.000đ</span>
                            </div>
                        </div>
                        <div class="recently-item">
                            <a href="/product/1" class="recently-img">
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem việt quất">
                            </a>
                            <div class="recently-info">
                                <a href="/product/1">Bánh kem việt quất tươi mát</a>
                                <span class="product-price">160.000đ</span>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="catalog-main">
                    <div class="catalog-header">
                        <h1>Bánh Sinh Nhật</h1>
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
                            <button class="sort-btn active"><i class="fas fa-sort-amount-down"></i> Giá giảm dần</button>
                            <button class="sort-btn"><i class="fas fa-sort-amount-up"></i> Giá tăng dần</button>
                            <button class="sort-btn"><i class="fas fa-star"></i> Nổi bật</button>
                            <button class="sort-btn"><i class="fas fa-tags"></i> Giảm giá</button>
                            <button class="sort-btn"><i class="fas fa-fire"></i> Bán chạy</button>
                            <button class="sort-btn"><i class="fas fa-clock"></i> Cũ nhất</button>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="catalog-grid">
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
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh kem quả bí ngô">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh kem quả bí ngô</h3>
                                <span class="product-price">220.000 d</span>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh sinh nhật bựa hài hước tặng bạn thân">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh sinh nhật bựa hài hước tặng bạn thân</h3>
                                <span class="product-price">280.000 d</span>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh kem hình mặt gấu đẹp">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh kem hình mặt gấu đẹp</h3>
                                <span class="product-price">400.000 d</span>
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
                                <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Bánh sinh nhật thỏ hồng đáng yêu">
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
                                <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Bánh kem tone hồng tặng bạn gái">
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
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Bánh sinh nhật tặng mẹ ý nghĩa">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh sinh nhật tặng mẹ ý nghĩa</h3>
                                <span class="product-price">160.000 d</span>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Bánh sinh nhật màu hồng dâu">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh sinh nhật màu hồng dâu</h3>
                                <span class="product-price">160.000 d</span>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Bánh kem trung thu độc đáo">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh kem trung thu độc đáo</h3>
                                <span class="product-price">220.000 d</span>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh sinh nhật hoa kem vẽ tay">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh sinh nhật hoa kem vẽ tay</h3>
                                <span class="product-price">270.000 d</span>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Bánh kem hoa sen">
                                <div class="product-overlay">
                                    <button class="quick-view"><i class="fas fa-eye"></i></button>
                                    <button class="add-cart"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3>Bánh kem hoa sen</h3>
                                <span class="product-price">270.000 d</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <a href="#" class="page-btn active">1</a>
                        <a href="#" class="page-btn">2</a>
                        <a href="#" class="page-btn">3</a>
                        <a href="#" class="page-btn">4</a>
                        <a href="#" class="page-btn"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
