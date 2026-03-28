@use('Illuminate\Support\Facades\Storage')

@extends('frontend.layouts.app')

@section('title', 'Blog - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <span>Blog</span>
        </div>
    </div>

    <!-- Blog Page -->
    <section class="blog-page">
        <div class="container">
            <h1 class="blog-page-title">Blog</h1>

            <!-- Category Tags -->
            <div class="blog-tags">
                <a href="{{ route('blog') }}" class="blog-tag {{ request('category') ? '' : 'active' }}">Tất cả</a>
                @foreach($blogCategories as $cat)
                    <a href="{{ route('blog', ['category' => $cat->slug]) }}" class="blog-tag {{ request('category') == $cat->slug ? 'active' : '' }}">{{ $cat->name }}</a>
                @endforeach
            </div>

            <!-- Blog Grid -->
            <div class="blog-page-grid">
                @forelse($posts as $post)
                    <article class="blog-page-card">
                        <a href="{{ route('blog.detail', $post->id) }}" class="blog-page-img">
                            <img src="{{ $post->featured_image ? Storage::url($post->featured_image) : asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="{{ $post->title }}">
                        </a>
                        <div class="blog-page-info">
                            <h3><a href="{{ route('blog.detail', $post->id) }}">{{ $post->title }}</a></h3>
                            <div class="blog-page-meta">
                                <span><i class="fas fa-calendar"></i> {{ $post->published_at?->format('d-m-Y') }}</span>
                                <span><i class="fas fa-eye"></i> {{ number_format($post->views ?? 0) }}</span>
                            </div>
                            <p>{{ $post->excerpt }}</p>
                        </div>
                    </article>
                @empty
                    <p>Chưa có bài viết nào.</p>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="pagination">
                    {{ $posts->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
