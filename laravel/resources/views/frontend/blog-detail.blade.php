@extends('frontend.layouts.app')

@section('title', 'Set bánh cupcake sinh nhật TPHCM - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <a href="/blog">Blog</a>
            <i class="fas fa-chevron-right"></i>
            <span>Set bánh cupcake sinh nhật TPHCM</span>
        </div>
    </div>

    <!-- Blog Detail Page -->
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
                    <!-- Title -->
                    <h1 class="blog-detail-title">Set bánh cupcake sinh nhật TPHCM</h1>

                    <!-- Author & Meta -->
                    <div class="blog-detail-author">
                        <div class="author-left">
                            <div class="author-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <span class="author-label">Tác giả:</span>
                                <strong>Đỗ Phương</strong><br>
                                <span class="author-date">Cập nhật: 15:15 - 03/08/2025</span>
                            </div>
                        </div>
                        <div class="author-right">
                            <span>Đánh giá bài đăng</span>
                            <div class="stars">
                                <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                            </div>
                            <small>Rate this post</small>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="blog-detail-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Set bánh cupcake sinh nhật TPHCM">
                        <p class="img-caption">Tiệm bánh cupcake sinh nhật TPHCM ngon</p>
                    </div>

                    <!-- Table of Contents -->
                    <div class="blog-toc">
                        <div class="toc-header">
                            <i class="fas fa-list"></i> <strong>Contents</strong>
                        </div>
                        <ol class="toc-list">
                            <li><a href="#mau-set">Mẫu set bánh cupcake sinh nhật TPHCM</a></li>
                            <li><a href="#bang-gia">Bảng giá bánh cupcake sinh nhật TPHCM</a></li>
                            <li><a href="#huong-dan">Hướng dẫn đặt bánh cupcake TPHCM</a>
                                <ol>
                                    <li><a href="#online">Hướng dẫn đặt bánh online</a></li>
                                    <li><a href="#truc-tiep">Hướng dẫn đặt bánh trực tiếp</a></li>
                                </ol>
                            </li>
                            <li><a href="#thu-huong">Thu Hường Cake - Tiệm bánh cupcake ngon tại HCM</a></li>
                            <li><a href="#phan-hoi">Phản hồi của khách hàng về địa chỉ bán bánh Cupcake ở TPHCM Thu Hường Cake</a></li>
                        </ol>
                    </div>

                    <!-- Article Content -->
                    <div class="blog-detail-content">
                        <h2 id="mau-set">Mẫu set bánh cupcake sinh nhật TPHCM</h2>
                        <p>Tại <strong>Thu Hường Cake</strong>, các <strong>set bánh cupcake sinh nhật TPHCM</strong> luôn được thiết kế đa dạng từ phong cách dễ thương, pastel nhẹ nhàng cho đến những mẫu bánh sang trọng, hiện đại phù hợp với mọi độ tuổi. Dù là sinh nhật bạn bè, người yêu hay những bữa tiệc gia đình ấm cúng, bạn đều có thể dễ dàng chọn được một set bánh sinh nhật cupcake TPHCM thật ưng ý.</p>
                        <p>Đặc biệt, tiệm luôn sẵn sàng thiết kế theo yêu cầu riêng, từ màu sắc, chủ đề cho đến cách trang trí từng chiếc <strong>bánh cupcake sinh nhật TPHCM</strong> để đảm bảo set bánh của bạn luôn độc nhất, không "đụng hàng" với ai.</p>

                        <div class="blog-detail-img">
                            <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Set bánh cupcake tone xanh lá">
                            <p class="img-caption">Set bánh cupcake tone xanh lá</p>
                        </div>

                        <h2 id="bang-gia">Bảng giá bánh cupcake sinh nhật TPHCM</h2>
                        <p>Bảng giá các set bánh cupcake tại Thu Hường Cake rất đa dạng, phù hợp với nhiều phân khúc khách hàng. Giá dao động từ 90.000đ đến 500.000đ tùy theo số lượng và kiểu trang trí.</p>

                        <div class="blog-detail-img">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Bánh cupcake đa dạng">
                        </div>

                        <h2 id="huong-dan">Hướng dẫn đặt bánh cupcake TPHCM</h2>
                        <h3 id="online">Hướng dẫn đặt bánh online</h3>
                        <p>Khách hàng có thể đặt bánh trực tiếp trên website thuhuongcake.vn hoặc qua các kênh mạng xã hội của Thu Hường Cake. Đội ngũ tư vấn sẽ hỗ trợ bạn chọn mẫu bánh, kích thước và thời gian giao hàng phù hợp.</p>

                        <h3 id="truc-tiep">Hướng dẫn đặt bánh trực tiếp</h3>
                        <p>Quý khách có thể đến trực tiếp bất kỳ cơ sở nào của Thu Hường Cake để xem mẫu bánh và đặt hàng. Nhân viên tại cửa hàng sẽ tư vấn tận tình và hỗ trợ bạn chọn được set bánh cupcake ưng ý nhất.</p>

                        <h2 id="thu-huong">Thu Hường Cake - Tiệm bánh cupcake ngon tại HCM</h2>
                        <p>Nếu bạn đang tìm kiếm một <strong>set bánh cupcake sinh nhật TPHCM</strong> để làm điểm nhấn cho bữa tiệc, hay đơn giản chỉ muốn dành tặng người thân một điều bất ngờ nhỏ xinh, <strong>Thu Hường Cake</strong> chính là địa chỉ đáng để bạn tin tưởng. Hãy để những chiếc bánh dễ thương, ngọt ngào từ Thu Hường thay bạn gửi lời chúc yêu thương trong ngày đặc biệt nhé!</p>

                        <h2 id="phan-hoi">Phản hồi của khách hàng</h2>

                        <div class="blog-detail-img">
                            <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Phản hồi khách hàng">
                            <p class="img-caption">Phản hồi khách hàng</p>
                        </div>
                    </div>

                    <!-- Share -->
                    <div class="blog-share">
                        <a href="#" class="share-btn share-fb" title="Chia sẻ trên Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="share-btn share-x" title="Chia sẻ trên X"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="share-btn share-email" title="Gửi email"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="share-btn share-pinterest" title="Pin"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="share-btn share-linkedin" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="share-btn share-telegram" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
                    </div>

                    <!-- Author Box -->
                    <div class="author-box">
                        <div class="author-box-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-box-info">
                            <h4>Đỗ Phương</h4>
                            <p>Xin chào, tôi là Đỗ Phương - một người đam mê sáng tạo nội dung hữu ích về bánh kem, bánh sinh nhật cho bạn đọc trên website Thu Hường Cake. Sự cố gắng tìm tòi và học hỏi trong một thời gian dài, tôi đã tích lũy được một lượng kiến thức sâu rộng về cách làm bánh, nguyên liệu và các xu hướng mới trong ngành bánh sinh nhật.</p>
                            <a href="#" class="author-link">Xem Tác giả <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <div class="related-posts">
                        <h2 class="related-posts-title">Bài Viết Liên Quan</h2>
                        <div class="related-posts-grid">
                            <a href="/blog/1" class="related-post-card">
                                <div class="related-post-img">
                                    <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Tiệm bánh Tiramisu TPHCM">
                                </div>
                                <h4>Tiệm bánh Tiramisu TPHCM</h4>
                            </a>
                            <a href="/blog/1" class="related-post-card">
                                <div class="related-post-img">
                                    <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Tiệm bánh sinh nhật quận 8">
                                </div>
                                <h4>Tiệm bánh sinh nhật quận 8</h4>
                            </a>
                            <a href="/blog/1" class="related-post-card">
                                <div class="related-post-img">
                                    <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Tiệm bánh sinh nhật HCM">
                                </div>
                                <h4>Tiệm bánh sinh nhật HCM</h4>
                            </a>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </section>
@endsection
