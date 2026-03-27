@extends('frontend.layouts.app')

@section('title', 'Danh Sách Cửa Hàng - Thu Hường Cake')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/">Trang chủ</a>
            <i class="fas fa-chevron-right"></i>
            <span>Danh sách cửa hàng Thu Hường Cake</span>
        </div>
    </div>

    <!-- Store Locator -->
    <section class="stores-page">
        <div class="container">
            <div class="stores-layout">

                <!-- Left: Store List -->
                <div class="stores-sidebar">
                    <!-- Filter -->
                    <div class="stores-filter">
                        <label>Tất cả khu vực</label>
                        <select id="storeFilter">
                            <option>Tất cả</option>
                            <option>Hà Nội</option>
                            <option>TP Hồ Chí Minh</option>
                        </select>
                    </div>

                    <div class="stores-search">
                        <input type="text" placeholder="Tìm kiếm cửa hàng..." id="storeSearch">
                    </div>

                    <!-- Store Cards -->
                    <div class="stores-list" id="storesList">
                        <div class="store-card active" onclick="selectStore(this)">
                            <h3>CS1: 11A Phố Dịch Vọng</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 11A Dịch Vọng, Cầu Giấy, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0982811096">0982.811.096</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS2: 22 Dịch Vọng</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 22 Dịch Vọng, Cầu Giấy, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0982811096">0982.811.096</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS3: 22 Quan Nhân</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 22 Quan Nhân, Trung Hòa, Cầu Giấy, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0984438898">0984.438.898</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS4: 72 Chính Kinh</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 72 Chính Kinh, Thanh Xuân, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0988064164">0988.064.164</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS5: 74 Tôn Thất Tùng</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 74 Tôn Thất Tùng, Khương Thượng, Đống Đa, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0962711371">0962.711.371</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS6: 898 Thụy Khuê</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 898 Thụy Khuê, Tây Hồ, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0988504514">0988.504.514</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS7: 67 Trương Định</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 67 Trương Định, Hai Bà Trưng, Hà Nội</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0963910920">0963.910.920</a></p>
                        </div>

                        <div class="store-card" onclick="selectStore(this)">
                            <h3>CS8: 801 Hậu Giang</h3>
                            <p><i class="fas fa-map-marker-alt"></i> 801 Đường Hậu Giang, Phường 11, Quận 6, TP.HCM</p>
                            <p class="store-phone">Điện thoại:<br><a href="tel:0862089099">0862.089.099</a></p>
                        </div>
                    </div>
                </div>

                <!-- Right: Map -->
                <div class="stores-map">
                    <div class="map-placeholder">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Thu Hường Cake</h3>
                        <p>11 P. Dịch Vọng, Dịch Vọng, Cầu Giấy, Hà Nội, Vietnam</p>
                        <span>4.9 <i class="fas fa-star"></i> (630)</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function selectStore(card) {
        document.querySelectorAll('.store-card').forEach(c => c.classList.remove('active'));
        card.classList.add('active');
    }

    // Search filter
    document.getElementById('storeSearch').addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('.store-card').forEach(card => {
            card.style.display = card.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
</script>
@endpush
