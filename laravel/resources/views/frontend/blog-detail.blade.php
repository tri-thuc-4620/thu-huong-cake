@use('Illuminate\Support\Facades\Storage')

@extends('frontend.layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('blog') }}">Blog</a>
            @if($post->category)
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('blog', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
            @endif
            <i class="fas fa-chevron-right"></i>
            <span>{{ $post->title }}</span>
        </div>
    </div>

    <!-- Blog Detail Page -->
    <section class="blog-detail-page">
        <div class="container">
            <div class="blog-detail-layout">

                <!-- Sidebar -->
                <aside class="catalog-sidebar">
                    <div class="sidebar-box">
                        <h3 class="sidebar-title">Danh Mục Blog</h3>
                        <ul class="sidebar-categories">
                            @foreach($blogCategories as $cat)
                                <li><a href="{{ route('blog', ['category' => $cat->slug]) }}"><i class="fas fa-chevron-right"></i> {{ $cat->name }}</a></li>
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

                    <div class="sidebar-box sidebar-search">
                        <div class="sidebar-search-input">
                            <input type="text" placeholder="Tìm sản phẩm...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </aside>

                <!-- Main Content -->
                <article class="blog-detail-main">
                    <!-- Title -->
                    <h1 class="blog-detail-title">{{ $post->title }}</h1>

                    <!-- Author & Meta -->
                    <div class="blog-detail-author">
                        <div class="author-left">
                            <div class="author-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <span class="author-label">Tác giả:</span>
                                <strong>{{ $post->author?->name ?? 'Thu Hường Cake' }}</strong><br>
                                <span class="author-date">Cập nhật: {{ $post->published_at?->format('H:i - d/m/Y') }}</span>
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
                    @if($post->featured_image)
                        <div class="blog-detail-img">
                            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
                        </div>
                    @endif

                    <!-- Article Content -->
                    <div class="blog-detail-content">
                        {!! $post->content !!}
                    </div>

                    <!-- Share -->
                    <div class="blog-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-fb" title="Chia sẻ trên Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-x" title="Chia sẻ trên X"><i class="fab fa-x-twitter"></i></a>
                        <a href="mailto:?subject={{ $post->title }}&body={{ urlencode(request()->url()) }}" class="share-btn share-email" title="Gửi email"><i class="fas fa-envelope"></i></a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-pinterest" title="Pin"><i class="fab fa-pinterest-p"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-linkedin" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://t.me/share/url?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn share-telegram" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
                    </div>

                    <!-- Author Box -->
                    <div class="author-box">
                        <div class="author-box-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-box-info">
                            <h4>{{ $post->author?->name ?? 'Thu Hường Cake' }}</h4>
                            <p>Xin chào, tôi là {{ $post->author?->name ?? 'tác giả' }} - một người đam mê sáng tạo nội dung hữu ích về bánh kem, bánh sinh nhật cho bạn đọc trên website Thu Hường Cake.</p>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    @if($relatedPosts->isNotEmpty())
                        <div class="related-posts">
                            <h2 class="related-posts-title">Bài Viết Liên Quan</h2>
                            <div class="related-posts-grid">
                                @foreach($relatedPosts as $rp)
                                    <a href="{{ route('blog.detail', $rp->id) }}" class="related-post-card">
                                        <div class="related-post-img">
                                            <img src="{{ $rp->featured_image ? Storage::url($rp->featured_image) : asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $rp->title }}">
                                        </div>
                                        <h4>{{ $rp->title }}</h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </article>
            </div>
        </div>
    </section>
@endsection
