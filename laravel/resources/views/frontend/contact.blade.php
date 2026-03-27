@extends('frontend.layouts.app')

@section('title', 'Liên Hệ - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <span>Liên hệ</span>
        </div>
    </div>

    <!-- Contact Page -->
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
                </aside>

                <!-- Main Content -->
                <article class="blog-detail-main">
                    <h1 class="blog-detail-title">Liên Hệ</h1>

                    <div class="contact-intro">
                        <h2>Hỗ trợ viên sẽ phản hồi quý khách hàng trong thời gian nhanh nhất!</h2>
                        <p class="contact-hotline">Để được hỗ trợ trực tiếp Hotline <strong>0962.849.989</strong></p>
                    </div>

                    <form class="contact-form" onsubmit="event.preventDefault();alert('Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.')">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Họ tên (*)</label>
                                <input type="text" required placeholder="Nhập họ tên">
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input type="text" placeholder="Tên công ty, tổ chức...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" placeholder="Nhập địa chỉ">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Điện thoại (*)</label>
                                <input type="tel" required placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" placeholder="Nhập email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Lời nhắn (*)</label>
                            <textarea rows="5" required placeholder="Nhập nội dung liên hệ, góp ý..."></textarea>
                        </div>

                        <button type="submit" class="btn-contact-submit">
                            <i class="fas fa-paper-plane"></i> Gửi Liên Hệ
                        </button>
                    </form>
                </article>
            </div>
        </div>
    </section>
@endsection
