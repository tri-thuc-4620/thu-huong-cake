@extends('admin.layouts.app')

@section('title', 'Cai dat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Cai dat</h4>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@php
    // Flatten grouped settings into a simple key => value array
    $s = $settings->flatMap(function ($group) {
        return $group->pluck('value', 'key');
    })->toArray();
@endphp

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Nav tabs -->
    <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">Chung</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab">Van chuyen</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">Mang xa hoi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab">Doanh nghiep</button>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="settingsTabContent">

        <!-- Tab Chung -->
        <div class="tab-pane fade show active" id="general" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="site_name" class="form-label">Ten website</label>
                        <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" value="{{ old('site_name', $s['site_name'] ?? '') }}">
                        @error('site_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        @if(!empty($s['logo']))
                            <div class="mb-2">
                                <img src="{{ Storage::url($s['logo']) }}" class="rounded" style="max-height:60px">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
                        @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hotline" class="form-label">Hotline</label>
                        <input type="text" class="form-control @error('hotline') is-invalid @enderror" id="hotline" name="hotline" value="{{ old('hotline', $s['hotline'] ?? '') }}">
                        @error('hotline') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $s['email'] ?? '') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="opening_hours" class="form-label">Gio mo cua</label>
                        <input type="text" class="form-control @error('opening_hours') is-invalid @enderror" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $s['opening_hours'] ?? '') }}" placeholder="VD: 7:00 - 22:00">
                        @error('opening_hours') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Van chuyen -->
        <div class="tab-pane fade" id="shipping" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="default_shipping_fee" class="form-label">Phi van chuyen mac dinh</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('default_shipping_fee') is-invalid @enderror" id="default_shipping_fee" name="default_shipping_fee" value="{{ old('default_shipping_fee', $s['default_shipping_fee'] ?? '') }}">
                            <span class="input-group-text">&dstrok;</span>
                            @error('default_shipping_fee') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="freeship_distance" class="form-label">Khoang cach mien phi ship</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('freeship_distance') is-invalid @enderror" id="freeship_distance" name="freeship_distance" value="{{ old('freeship_distance', $s['freeship_distance'] ?? '') }}">
                            <span class="input-group-text">km</span>
                            @error('freeship_distance') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="freeship_min_order" class="form-label">Don hang toi thieu mien phi ship</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('freeship_min_order') is-invalid @enderror" id="freeship_min_order" name="freeship_min_order" value="{{ old('freeship_min_order', $s['freeship_min_order'] ?? '') }}">
                            <span class="input-group-text">&dstrok;</span>
                            @error('freeship_min_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Mang xa hoi -->
        <div class="tab-pane fade" id="social" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="facebook_url" class="form-label">Facebook URL</label>
                        <input type="url" class="form-control @error('facebook_url') is-invalid @enderror" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $s['facebook_url'] ?? '') }}" placeholder="https://facebook.com/...">
                        @error('facebook_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="zalo_url" class="form-label">Zalo URL</label>
                        <input type="url" class="form-control @error('zalo_url') is-invalid @enderror" id="zalo_url" name="zalo_url" value="{{ old('zalo_url', $s['zalo_url'] ?? '') }}" placeholder="https://zalo.me/...">
                        @error('zalo_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tiktok_url" class="form-label">TikTok URL</label>
                        <input type="url" class="form-control @error('tiktok_url') is-invalid @enderror" id="tiktok_url" name="tiktok_url" value="{{ old('tiktok_url', $s['tiktok_url'] ?? '') }}" placeholder="https://tiktok.com/@...">
                        @error('tiktok_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instagram_url" class="form-label">Instagram URL</label>
                        <input type="url" class="form-control @error('instagram_url') is-invalid @enderror" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $s['instagram_url'] ?? '') }}" placeholder="https://instagram.com/...">
                        @error('instagram_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="youtube_url" class="form-label">YouTube URL</label>
                        <input type="url" class="form-control @error('youtube_url') is-invalid @enderror" id="youtube_url" name="youtube_url" value="{{ old('youtube_url', $s['youtube_url'] ?? '') }}" placeholder="https://youtube.com/@...">
                        @error('youtube_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Doanh nghiep -->
        <div class="tab-pane fade" id="business" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="address_hanoi" class="form-label">Dia chi Ha Noi</label>
                        <input type="text" class="form-control @error('address_hanoi') is-invalid @enderror" id="address_hanoi" name="address_hanoi" value="{{ old('address_hanoi', $s['address_hanoi'] ?? '') }}">
                        @error('address_hanoi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address_hcm" class="form-label">Dia chi TP HCM</label>
                        <input type="text" class="form-control @error('address_hcm') is-invalid @enderror" id="address_hcm" name="address_hcm" value="{{ old('address_hcm', $s['address_hcm'] ?? '') }}">
                        @error('address_hcm') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="business_license" class="form-label">Giay phep kinh doanh</label>
                        <input type="text" class="form-control @error('business_license') is-invalid @enderror" id="business_license" name="business_license" value="{{ old('business_license', $s['business_license'] ?? '') }}">
                        @error('business_license') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mt-4">
        <button type="submit" class="btn btn-pink">
            <i class="bi bi-check-lg"></i> Luu cai dat
        </button>
    </div>
</form>
@endsection
