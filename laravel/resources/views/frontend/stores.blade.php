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
                            @php
                                $cities = $stores->pluck('city')->unique()->filter();
                            @endphp
                            @foreach($cities as $city)
                                <option>{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="stores-search">
                        <input type="text" placeholder="Tìm kiếm cửa hàng..." id="storeSearch">
                    </div>

                    <!-- Store Cards -->
                    <div class="stores-list" id="storesList">
                        @forelse($stores as $store)
                            <div class="store-card {{ $loop->first ? 'active' : '' }}" data-city="{{ $store->city }}" data-maps="{{ $store->google_maps_url }}" onclick="selectStore(this)">
                                <h3>{{ $store->name }}</h3>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $store->address }}{{ $store->district ? ', ' . $store->district : '' }}{{ $store->city ? ', ' . $store->city : '' }}</p>
                                <p class="store-phone">Điện thoại:<br><a href="tel:{{ preg_replace('/[^0-9]/', '', $store->phone) }}">{{ $store->phone }}</a></p>
                                @if($store->google_maps_url)
                                    <a href="{{ $store->google_maps_url }}" target="_blank" class="store-map-link"><i class="fas fa-directions"></i> Chỉ đường</a>
                                @endif
                            </div>
                        @empty
                            <p>Chưa có cửa hàng nào.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Right: Map -->
                <div class="stores-map">
                    <div class="map-placeholder">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Thu Hường Cake</h3>
                        @if($stores->isNotEmpty())
                            <p>{{ $stores->first()->address }}{{ $stores->first()->city ? ', ' . $stores->first()->city : '' }}</p>
                        @endif
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

    // City filter
    document.getElementById('storeFilter').addEventListener('change', function() {
        const city = this.value;
        document.querySelectorAll('.store-card').forEach(card => {
            if (city === 'Tất cả') {
                card.style.display = '';
            } else {
                card.style.display = card.dataset.city === city ? '' : 'none';
            }
        });
    });
</script>
@endpush
