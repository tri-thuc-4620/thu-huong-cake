@extends('frontend.layouts.app')

@section('title', 'Hướng Dẫn Đặt Bánh - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <span>Hướng dẫn mua bánh</span>
        </div>
    </div>

    <!-- Guide Page -->
    <section class="blog-detail-page">
        <div class="container">
            <div class="blog-detail-layout">

                <!-- Sidebar -->
                <aside class="catalog-sidebar">
                    <div class="sidebar-box">
                        <h3 class="sidebar-title">Danh Mục Sản Phẩm</h3>
                        <ul class="sidebar-categories">
                            <li><a href="/products"><i class="fas fa-chevron-right"></i> Bánh Sinh Nhật Mini</a></li>
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

                    <div class="sidebar-box sidebar-search">
                        <div class="sidebar-search-input">
                            <input type="text" placeholder="Tìm sản phẩm...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </div>

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
                <article class="blog-detail-main">
                    <h1 class="blog-detail-title">Hướng dẫn mua bánh</h1>

                    <div class="blog-detail-author">
                        <div class="author-left">
                            <div class="author-avatar"><i class="fas fa-user"></i></div>
                            <div>
                                <span class="author-label">Tác giả:</span>
                                <strong>Thu Hường Cake</strong><br>
                                <span class="author-date">Cập nhật: 10:11 - 18/01/2025</span>
                            </div>
                        </div>
                        <div class="author-right">
                            <span>Đánh giá bài đăng</span>
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                            </div>
                            <small>2.9/5 - (32 bình chọn)</small>
                        </div>
                    </div>

                    <div class="blog-detail-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Hướng dẫn đặt bánh">
                    </div>

                    <!-- Table of Contents -->
                    <div class="blog-toc">
                        <div class="toc-header">
                            <i class="fas fa-list"></i> <strong>Contents</strong>
                        </div>
                        <ol class="toc-list">
                            <li><a href="#buoc1">Bước 1: Chọn mẫu bánh và kích thước bánh</a></li>
                            <li><a href="#buoc2">Bước 2: Lựa chọn cốt bánh (Phần bánh gato bên trong)</a></li>
                            <li><a href="#buoc3">Bước 3: Hoàn thiện đơn bánh và gửi Đơn Đặt Bánh</a>
                                <ol>
                                    <li><a href="#buoc3-1">Điền các thông tin cần thiết bao gồm</a></li>
                                    <li><a href="#buoc3-2">Kiểm tra lại đơn hàng và lựa chọn phương thức thanh toán</a></li>
                                    <li><a href="#buoc3-3">Tiến hành thanh toán</a></li>
                                </ol>
                            </li>
                        </ol>
                    </div>

                    <!-- Content -->
                    <div class="blog-detail-content">
                        <h2 id="buoc1">Bước 1. Chọn mẫu bánh và kích thước bánh</h2>
                        <p>Tại <strong>Thu Hường Cake</strong>, bạn sẽ có rất nhiều sự lựa chọn về kiểu dáng và kích thước của chiếc bánh kem. Để lựa chọn được chiếc bánh kem phù hợp, vừa cân đối được chi phí vừa tránh lãng phí bánh, bạn nên xem xét về nhu cầu và quy mô của bữa tiệc.</p>
                        <p>Sau đây, Thu Hường xin gửi bảng kích thước bánh kem và khẩu phần ăn tương ứng để bạn có thể thuận tiện tham khảo.</p>

                        <!-- Size Table -->
                        <div class="guide-table-wrapper">
                            <table class="guide-table">
                                <thead>
                                    <tr>
                                        <th>Loại Bánh</th>
                                        <th>Kích Thước</th>
                                        <th>Khẩu Phần</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td rowspan="7"><strong>Bánh Tròn</strong></td><td>12cm</td><td>1-2 người</td></tr>
                                    <tr><td>14cm</td><td>1-4 người</td></tr>
                                    <tr><td>16cm</td><td>2-5 người</td></tr>
                                    <tr><td>18cm</td><td>3-6 người</td></tr>
                                    <tr><td>20cm</td><td>4-8 người</td></tr>
                                    <tr><td>22cm</td><td>5-9 người</td></tr>
                                    <tr><td>24cm</td><td>6-10 người</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h2 id="buoc2">Bước 2. Lựa chọn cốt bánh (Phần bánh gato bên trong)</h2>
                        <p>Thu Hường Cake cung cấp nhiều loại cốt bánh khác nhau để bạn lựa chọn:</p>
                        <ul class="guide-list">
                            <li><strong>Gato Vani Nhân Việt Quất</strong> - Vị ngọt thanh, chua nhẹ của việt quất</li>
                            <li><strong>Gato Red Velvet</strong> - Vị đặc trưng của Red Velvet mềm mịn</li>
                            <li><strong>Gato Socola</strong> - Vị đắng nhẹ, thơm nồng của socola</li>
                            <li><strong>Gato Trà Xanh</strong> - Vị thanh mát của trà xanh Nhật Bản</li>
                            <li><strong>Gato Dâu Tây</strong> - Vị ngọt tự nhiên của dâu tây tươi</li>
                        </ul>

                        <div class="blog-detail-img">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Cac loai cot banh">
                            <p class="img-caption">Các loại cốt bánh tại Thu Hường Cake</p>
                        </div>

                        <h2 id="buoc3">Bước 3. Hoàn thiện đơn bánh và gửi Đơn Đặt Bánh</h2>

                        <h3 id="buoc3-1">3.1 Điền các thông tin cần thiết bao gồm:</h3>
                        <ul class="guide-list">
                            <li>Họ và tên người đặt</li>
                            <li>Số điện thoại liên hệ</li>
                            <li>Thời gian nhận bánh</li>
                            <li>Địa chỉ giao hàng (nếu chọn giao tận nơi)</li>
                            <li>Ghi chú đơn hàng (lời chúc lên bánh, yêu cầu đặc biệt...)</li>
                        </ul>

                        <h3 id="buoc3-2">3.2 Kiểm tra lại đơn hàng và lựa chọn phương thức thanh toán:</h3>
                        <p>Sau khi điền đầy đủ thông tin, bạn kiểm tra lại đơn hàng một lần nữa để đảm bảo thông tin chính xác. Sau đó lựa chọn phương thức thanh toán phù hợp:</p>
                        <ul class="guide-list">
                            <li><strong>Chuyển khoản ngân hàng</strong> - Quét mã QR để thanh toán nhanh chóng</li>
                            <li><strong>Thanh toán khi nhận hàng (COD)</strong> - Thanh toán tiền mặt cho shipper</li>
                        </ul>

                        <h3 id="buoc3-3">3.3 Tiến hành thanh toán:</h3>
                        <p>Nếu lựa chọn phương thức chuyển khoản ngân hàng, bạn chỉ cần quét mã QR hoặc chuyển khoản theo thông tin tài khoản được hiển thị. Đơn hàng sẽ được xác nhận ngay sau khi nhận được thanh toán.</p>

                        <div class="blog-detail-img">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Thanh toán đơn hàng">
                            <p class="img-caption">Quy trình thanh toán đơn giản, nhanh chóng</p>
                        </div>

                        <p>Nếu bạn cần hỗ trợ thêm, vui lòng liên hệ hotline <strong>0962.849.989</strong> hoặc nhắn tin qua Zalo để được tư vấn tận tình nhất. <strong>Thu Hường Cake</strong> luôn sẵn sàng phục vụ bạn!</p>
                    </div>

                    <!-- Share -->
                    <div class="blog-share">
                        <a href="#" class="share-btn share-fb"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="share-btn share-x"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="share-btn share-email"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="share-btn share-pinterest"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="share-btn share-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="share-btn share-telegram"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
