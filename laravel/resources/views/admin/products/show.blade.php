@extends('admin.layouts.app')

@section('title', 'Chi tiet san pham')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chi tiet san pham</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.products.edit', $product->id ?? 1) }}" class="btn btn-primary">
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
                        <p class="fw-bold mb-0">{{ $product->name ?? 'Banh kem dau tay' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Slug</label>
                        <p class="mb-0"><code>{{ $product->slug ?? 'banh-kem-dau-tay' }}</code></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Danh muc</label>
                        <p class="mb-0">Banh kem</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted small">Ma SKU</label>
                        <p class="mb-0">BK-001</p>
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
                <p>{{ $product->short_description ?? 'Banh kem dau tay tuoi ngon, lop kem beo ngay' }}</p>
                <label class="form-label text-muted small">Mo ta chi tiet</label>
                <p class="mb-0">{{ $product->description ?? 'Banh kem dau tay duoc lam tu nguyen lieu tuoi ngon nhat. Lop banh bong lan mem min ket hop voi kem tuoi va dau tay tuoi. Thich hop cho cac buoi tiec sinh nhat, ky niem.' }}</p>
            </div>
        </div>

        {{-- Tuy chon banh --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-sliders"></i> Tuy chon banh</h6>
            </div>
            <div class="card-body">
                <h6 class="text-muted small">Kich thuoc & Gia</h6>
                <table class="table table-bordered table-sm mb-4">
                    <thead class="table-light">
                        <tr>
                            <th>Kich thuoc</th>
                            <th>Gia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>16cm</td><td>350,000 &#273;</td></tr>
                        <tr><td>20cm</td><td>450,000 &#273;</td></tr>
                        <tr><td>24cm</td><td>580,000 &#273;</td></tr>
                    </tbody>
                </table>

                <h6 class="text-muted small">Cot banh & Phu phi</h6>
                <table class="table table-bordered table-sm mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Loai cot banh</th>
                            <th>Phu phi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1 tang</td><td>0 &#273;</td></tr>
                        <tr><td>2 tang</td><td>150,000 &#273;</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Hinh anh --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-images"></i> Hinh anh</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-3">
                    <img src="https://placehold.co/200x200/FFE4E1/333?text=Anh+1" class="rounded border" width="200" height="200">
                    <img src="https://placehold.co/200x200/FFE4E1/333?text=Anh+2" class="rounded border" width="200" height="200">
                    <img src="https://placehold.co/200x200/FFE4E1/333?text=Anh+3" class="rounded border" width="200" height="200">
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
                    <p class="fs-5 fw-bold text-primary mb-0">350,000 &#273;</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">Gia khuyen mai</label>
                    <p class="fs-5 fw-bold text-danger mb-0">300,000 &#273;</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">So luong ton kho</label>
                    <p class="mb-0">50</p>
                </div>
                <div>
                    <label class="form-label text-muted small">Trang thai kho</label>
                    <p class="mb-0"><span class="badge bg-success">Con hang</span></p>
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
                    <span class="badge bg-success">Co</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Noi bat</span>
                    <span class="badge bg-secondary">Khong</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Hot</span>
                    <span class="badge bg-danger">Co</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Moi</span>
                    <span class="badge bg-secondary">Khong</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Thu tu</span>
                    <span>0</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Luot xem</span>
                    <span>1,245</span>
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
                    <p class="mb-0">Banh kem dau tay - Thu Huong Cake</p>
                </div>
                <div>
                    <label class="form-label text-muted small">Meta Description</label>
                    <p class="mb-0">Banh kem dau tay tuoi ngon tai Thu Huong Cake</p>
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
                    <span class="small">20/03/2026 10:30</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted small">Cap nhat</span>
                    <span class="small">25/03/2026 14:15</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
