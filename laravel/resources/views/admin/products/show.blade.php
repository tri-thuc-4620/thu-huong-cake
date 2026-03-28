@use('Illuminate\Support\Facades\Storage')
@extends('admin.layouts.app')

@section('title', 'Chi tiet san pham')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chi tiet san pham</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Chinh sua
        </a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Quay lai
        </a>
    </div>
</div>

<div class="row g-4">
    {{-- Left Column --}}
    <div class="col-lg-8">
        {{-- Thong tin co ban --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-info-circle"></i> Thong tin co ban</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Ten san pham</label>
                        <p class="fw-bold mb-0">{{ $product->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Slug</label>
                        <p class="mb-0"><code>{{ $product->slug }}</code></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Danh muc</label>
                        <p class="mb-0">{{ $product->category?->name ?? '—' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Ma SKU</label>
                        <p class="mb-0">{{ $product->sku ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mo ta --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-text-paragraph"></i> Mo ta</h6>
            </div>
            <div class="card-body">
                <label class="form-label text-muted small">Mo ta ngan</label>
                <p>{{ $product->short_description ?? '—' }}</p>
                <label class="form-label text-muted small">Mo ta chi tiet</label>
                <p class="mb-0">{!! nl2br(e($product->description ?? '—')) !!}</p>
            </div>
        </div>

        {{-- Tuy chon banh --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-sliders"></i> Tuy chon banh</h6>
            </div>
            <div class="card-body">
                @if($product->variations->count())
                <h6 class="text-muted small">Bien the san pham</h6>
                <table class="table table-bordered table-sm mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Bien the</th>
                            <th>Gia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->variations as $variation)
                        <tr>
                            <td>{{ $variation->name ?? $variation->label ?? '—' }}</td>
                            <td>{{ number_format($variation->price ?? 0) }} &#273;</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-muted mb-0">Chua co tuy chon bien the nao</p>
                @endif
            </div>
        </div>

        {{-- Hinh anh --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-images"></i> Hinh anh</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-3">
                    @forelse($product->images as $image)
                        <img src="{{ Storage::url($image->image) }}" class="rounded border" width="200" height="200" style="object-fit:cover">
                    @empty
                        <img src="https://placehold.co/200x200/fff0f6/e84393?text=🎂" class="rounded border" width="200" height="200">
                        <p class="text-muted align-self-center ms-3">Chua co hinh anh nao</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="col-lg-4">
        {{-- Gia & Kho --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-tag"></i> Gia & Kho hang</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted small">Gia ban</label>
                    <p class="fs-5 fw-bold text-primary mb-0">{{ number_format($product->price) }} &#273;</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">Gia khuyen mai</label>
                    <p class="fs-5 fw-bold text-danger mb-0">
                        @if($product->sale_price)
                            {{ number_format($product->sale_price) }} &#273;
                        @else
                            —
                        @endif
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">So luong ton kho</label>
                    <p class="mb-0">{{ $product->stock_quantity ?? '—' }}</p>
                </div>
                <div>
                    <label class="form-label text-muted small">Trang thai kho</label>
                    <p class="mb-0">
                        @switch($product->stock_status)
                            @case('in_stock')
                                <span class="badge bg-success">Con hang</span>
                                @break
                            @case('out_of_stock')
                                <span class="badge bg-danger">Het hang</span>
                                @break
                            @case('low_stock')
                                <span class="badge bg-warning">Sap het hang</span>
                                @break
                            @case('pre_order')
                                <span class="badge bg-info">Dat truoc</span>
                                @break
                            @default
                                <span class="badge bg-secondary">{{ $product->stock_status }}</span>
                        @endswitch
                    </p>
                </div>
            </div>
        </div>

        {{-- Hien thi --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-eye"></i> Hien thi</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Hien thi</span>
                    <span class="badge {{ $product->is_visible ? 'bg-success' : 'bg-secondary' }}">{{ $product->is_visible ? 'Co' : 'Khong' }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Noi bat</span>
                    <span class="badge {{ $product->is_featured ? 'bg-success' : 'bg-secondary' }}">{{ $product->is_featured ? 'Co' : 'Khong' }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Hot</span>
                    <span class="badge {{ $product->is_hot ? 'bg-danger' : 'bg-secondary' }}">{{ $product->is_hot ? 'Co' : 'Khong' }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Moi</span>
                    <span class="badge {{ $product->is_new ? 'bg-info' : 'bg-secondary' }}">{{ $product->is_new ? 'Co' : 'Khong' }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Thu tu</span>
                    <span>{{ $product->sort_order ?? 0 }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Luot xem</span>
                    <span>{{ number_format($product->views ?? 0) }}</span>
                </div>
            </div>
        </div>

        {{-- SEO --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-search"></i> SEO</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted small">Meta Title</label>
                    <p class="mb-0">{{ $product->meta_title ?? '—' }}</p>
                </div>
                <div>
                    <label class="form-label text-muted small">Meta Description</label>
                    <p class="mb-0">{{ $product->meta_description ?? '—' }}</p>
                </div>
            </div>
        </div>

        {{-- Thong tin khac --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-clock-history"></i> Thong tin khac</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted small">Ngay tao</span>
                    <span class="small">{{ $product->created_at?->format('d/m/Y H:i') ?? '—' }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted small">Cap nhat</span>
                    <span class="small">{{ $product->updated_at?->format('d/m/Y H:i') ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
