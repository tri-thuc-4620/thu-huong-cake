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
                            @foreach($categories as $cat)
                                <li><a href="{{ route('products', ['category' => $cat->slug]) }}"><i class="fas fa-chevron-right"></i> {{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box sidebar-contact">
                        <h3 class="sidebar-title">Liên Hệ Đặt Bánh</h3>
                        <ul class="sidebar-phones">
                            @foreach($stores as $store)
                                <li><span class="phone-label">{{ $store->short_name ?? $store->name }}</span> <a href="tel:{{ preg_replace('/[^0-9]/', '', $store->phone) }}">{{ $store->phone }}</a></li>
                            @endforeach
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

                    @if(session('success'))
                        <div class="alert alert-success" style="background:#d4edda;color:#155724;padding:12px 16px;border-radius:6px;margin-bottom:20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-group">
                                <label>Họ tên (*)</label>
                                <input type="text" name="name" required placeholder="Nhập họ tên" value="{{ old('name') }}">
                                @error('name') <span class="text-danger" style="color:#e74c3c;font-size:13px;">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input type="text" name="company" placeholder="Tên công ty, tổ chức..." value="{{ old('company') }}">
                                @error('company') <span class="text-danger" style="color:#e74c3c;font-size:13px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" placeholder="Nhập địa chỉ" value="{{ old('address') }}">
                            @error('address') <span class="text-danger" style="color:#e74c3c;font-size:13px;">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Điện thoại (*)</label>
                                <input type="tel" name="phone" required placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                                @error('phone') <span class="text-danger" style="color:#e74c3c;font-size:13px;">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                                @error('email') <span class="text-danger" style="color:#e74c3c;font-size:13px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Lời nhắn (*)</label>
                            <textarea rows="5" name="message" required placeholder="Nhập nội dung liên hệ, góp ý...">{{ old('message') }}</textarea>
                            @error('message') <span class="text-danger" style="color:#e74c3c;font-size:13px;">{{ $message }}</span> @enderror
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
