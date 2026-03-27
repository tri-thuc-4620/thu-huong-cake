@extends('admin.layouts.app')

@section('title', 'San pham')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">San pham</h4>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Them san pham
    </a>
</div>

{{-- Filter Bar --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small">Danh muc</label>
                <select class="form-select form-select-sm">
                    <option value="">-- Tat ca danh muc --</option>
                    <option>Banh kem</option>
                    <option>Banh mi</option>
                    <option>Banh ngot</option>
                    <option>Banh man</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small">Trang thai</label>
                <select class="form-select form-select-sm">
                    <option value="">-- Tat ca --</option>
                    <option>Hien thi</option>
                    <option>An</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small">Hot</label>
                <select class="form-select form-select-sm">
                    <option value="">-- Tat ca --</option>
                    <option>Co</option>
                    <option>Khong</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-funnel"></i> Loc
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Products Table --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                        <th style="width:60px">Anh</th>
                        <th>Ten SP</th>
                        <th>Danh muc</th>
                        <th>Gia</th>
                        <th>Gia KM</th>
                        <th>Hien thi</th>
                        <th>Hot</th>
                        <th>Kho</th>
                        <th>Luot xem</th>
                        <th>Ngay tao</th>
                        <th style="width:120px">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td><img src="https://placehold.co/40x40/FFE4E1/333?text=BK" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh kem dau tay</strong></td>
                        <td>Banh kem</td>
                        <td>350,000 &#273;</td>
                        <td>300,000 &#273;</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-danger">Hot</span></td>
                        <td><span class="badge bg-success">Con hang</span></td>
                        <td>1,245</td>
                        <td>20/03/2026</td>
                        <td>
                            <a href="{{ route('admin.products.edit', 1) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td><img src="https://placehold.co/40x40/E8F5E9/333?text=BM" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh mi que</strong></td>
                        <td>Banh mi</td>
                        <td>25,000 &#273;</td>
                        <td class="text-muted">-</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-secondary">Khong</span></td>
                        <td><span class="badge bg-success">Con hang</span></td>
                        <td>832</td>
                        <td>18/03/2026</td>
                        <td>
                            <a href="{{ route('admin.products.edit', 2) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td><img src="https://placehold.co/40x40/FFF3E0/333?text=BN" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh bong lan trung muoi</strong></td>
                        <td>Banh ngot</td>
                        <td>180,000 &#273;</td>
                        <td>150,000 &#273;</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-danger">Hot</span></td>
                        <td><span class="badge bg-warning text-dark">Sap het</span></td>
                        <td>567</td>
                        <td>15/03/2026</td>
                        <td>
                            <a href="{{ route('admin.products.edit', 3) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td><img src="https://placehold.co/40x40/E3F2FD/333?text=BK" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh kem socola</strong></td>
                        <td>Banh kem</td>
                        <td>420,000 &#273;</td>
                        <td class="text-muted">-</td>
                        <td><span class="badge bg-secondary">An</span></td>
                        <td><span class="badge bg-secondary">Khong</span></td>
                        <td><span class="badge bg-danger">Het hang</span></td>
                        <td>234</td>
                        <td>10/03/2026</td>
                        <td>
                            <a href="{{ route('admin.products.edit', 4) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td><img src="https://placehold.co/40x40/F3E5F5/333?text=BC" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh cuon nhan thit</strong></td>
                        <td>Banh man</td>
                        <td>45,000 &#273;</td>
                        <td class="text-muted">-</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-secondary">Khong</span></td>
                        <td><span class="badge bg-success">Con hang</span></td>
                        <td>128</td>
                        <td>08/03/2026</td>
                        <td>
                            <a href="{{ route('admin.products.edit', 5) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted small">Hien thi 1-5 / 156 san pham</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">32</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
