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
                <button class="blog-tag active">Cẩm nang làm bánh</button>
                <button class="blog-tag">Mẫu bánh kem</button>
                <button class="blog-tag">Tin tức</button>
            </div>

            <!-- Blog Grid -->
            <div class="blog-page-grid">

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Set bánh cupcake sinh nhật TPHCM">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Set bánh cupcake sinh nhật TPHCM</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 03-08-2025</span>
                            <span><i class="fas fa-eye"></i> 1838</span>
                        </div>
                        <p>Có bao giờ bạn cảm thấy bánh sinh nhật truyền thống đã trở nên quá...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Tiệm bánh Tiramisu TPHCM">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh Tiramisu TPHCM</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 31-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1767</span>
                        </div>
                        <p>Có những chiếc bánh chỉ đơn giản là để ăn cho "thỏa cơn thèm", nhưng...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Tiệm bánh sinh nhật quận 8">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh sinh nhật quận 8</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 29-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1766</span>
                        </div>
                        <p>Sinh nhật là ngày đặc biệt, dù đơn giản hay linh đình, ai cũng mong...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="Tiệm bánh sinh nhật HCM">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh sinh nhật HCM</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 28-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1820</span>
                        </div>
                        <p>Dù là tiệc sinh nhật nhỏ ấm cúng hay bữa tiệc hoành tráng, chiếc bánh...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="Tiệm bánh sinh nhật quận 11">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh sinh nhật quận 11</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 26-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1809</span>
                        </div>
                        <p>Sinh nhật ai đó sắp tới, và bạn đang phân vân không biết chọn bánh...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/download.jpg') }}" alt="Tiệm bánh sinh nhật quận 5">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh sinh nhật quận 5</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 24-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1808</span>
                        </div>
                        <p>Có những ngày sinh nhật, điều khiến ta xúc động không phải là món quà...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/download.webp') }}" alt="Tiệm bánh bông lan trứng muối quận 5">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh bông lan trứng muối quận 5</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 22-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1738</span>
                        </div>
                        <p>Nếu một ngày bạn cảm thấy mệt mỏi, hãy thử một miếng bánh bông lan...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-viet-quat-tuoi-mat-7.webp') }}" alt="Tiệm bánh bông lan trứng muối quận 11">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh bông lan trứng muối quận 11</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 21-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1751</span>
                        </div>
                        <p>Bạn đang tìm một tiệm bánh bông lan trứng muối quận 11 vừa ngon, vừa...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-kem-mini-mau-hong-dep-nhat-5.jpg') }}" alt="Tiệm bánh sinh nhật quận 6">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh sinh nhật quận 6</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 18-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1804</span>
                        </div>
                        <p>Bạn đang tìm một tiệm bánh sinh nhật quận 6 với những mẫu bánh đẹp...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-kem-trung.jpg') }}" alt="Tiệm bánh bông lan trứng muối quận 6">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">Tiệm bánh bông lan trứng muối quận 6</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 14-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1744</span>
                        </div>
                        <p>Có những ngày lắng bỗng thèm một thứ gì đó vừa mềm, vừa mặn, vừa...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-pho-mai-cah-bong.jpg') }}" alt="42+ Lời chúc mừng sinh nhật khách hàng">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">42+ Lời chúc mừng sinh nhật khách hàng</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 10-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1762</span>
                        </div>
                        <p>Sinh nhật là cáp để kết nối, để những lời chúc gắm đi trở thành...</p>
                    </div>
                </article>

                <article class="blog-page-card">
                    <a href="/blog/1" class="blog-page-img">
                        <img src="{{ asset('frontend/image_san_pham/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg') }}" alt="99+ Lời cảm ơn sinh nhật">
                    </a>
                    <div class="blog-page-info">
                        <h3><a href="/blog/1">99+ Lời cảm ơn sinh nhật</a></h3>
                        <div class="blog-page-meta">
                            <span><i class="fas fa-calendar"></i> 10-07-2025</span>
                            <span><i class="fas fa-eye"></i> 1999</span>
                        </div>
                        <p>Sinh nhật qua đi, tiệc đi tàn, nến cũng tắt, nhưng dư âm của những...</p>
                    </div>
                </article>

            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn">2</a>
                <a href="#" class="page-btn">3</a>
                <a href="#" class="page-btn"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Blog tag filter
    document.querySelectorAll('.blog-tag').forEach(tag => {
        tag.addEventListener('click', () => {
            document.querySelectorAll('.blog-tag').forEach(t => t.classList.remove('active'));
            tag.classList.add('active');
        });
    });
</script>
@endpush
