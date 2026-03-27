@extends('admin.layouts.app')

@section('title', 'San pham')

@section('content')
<div class="page-header">
    <div>
        <h4>San pham</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly tat ca san pham cua hang</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them san pham
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Danh muc</label>
        <select class="form-select form-select-sm" style="min-width:160px">
            <option value="">Tat ca danh muc</option>
            <option>Banh kem</option>
            <option>Banh bong lan</option>
            <option>Banh ngot</option>
            <option>Set qua tang</option>
        </select>
    </div>
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Hien thi</option>
            <option>An</option>
        </select>
    </div>
    <div>
        <label class="form-label">Hot</label>
        <select class="form-select form-select-sm" style="min-width:110px">
            <option value="">Tat ca</option>
            <option>Co</option>
            <option>Khong</option>
        </select>
    </div>
    <div>
        <label class="form-label">Kho hang</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Con banh</option>
            <option>Het banh</option>
            <option>Dat truoc</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <button class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</button>
</div>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>156</strong> san pham</span>
        <div class="d-flex gap-2">
            <button class="btn btn-soft btn-sm"><i class="bi bi-download me-1"></i> Xuat Excel</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:56px">Anh</th>
                    <th>Ten san pham</th>
                    <th>Danh muc</th>
                    <th>Gia</th>
                    <th>Gia KM</th>
                    <th>Hien thi</th>
                    <th>Hot</th>
                    <th>Kho</th>
                    <th>Luot xem</th>
                    <th>Ngay tao</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fff0f6/e84393?text=🎂" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.products.edit', 1) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh kem dau tay Premium</a>
                        <div class="text-muted" style="font-size:0.75rem">SKU: THC-001</div>
                    </td>
                    <td><span class="badge badge-soft-pink">Banh kem</span></td>
                    <td style="font-weight:500">350,000 &#273;</td>
                    <td style="font-weight:500;color:var(--pink)">300,000 &#273;</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><span class="badge badge-soft-danger">Hot</span></td>
                    <td><span class="badge badge-soft-success">Con banh</span></td>
                    <td class="text-muted">1,245</td>
                    <td class="text-muted" style="font-size:0.8rem">20/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.show', 1) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fdf2f8/e84393?text=🧁" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.products.edit', 2) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh bong lan trung muoi</a>
                        <div class="text-muted" style="font-size:0.75rem">SKU: THC-002</div>
                    </td>
                    <td><span class="badge badge-soft-pink">Banh ngot</span></td>
                    <td style="font-weight:500">180,000 &#273;</td>
                    <td style="font-weight:500;color:var(--pink)">150,000 &#273;</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><span class="badge badge-soft-danger">Hot</span></td>
                    <td><span class="badge badge-soft-warning">Sap het</span></td>
                    <td class="text-muted">567</td>
                    <td class="text-muted" style="font-size:0.8rem">15/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.show', 2) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', 2) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fff0f6/e84393?text=🎁" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.products.edit', 3) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Set qua tang banh mix vi</a>
                        <div class="text-muted" style="font-size:0.75rem">SKU: THC-003</div>
                    </td>
                    <td><span class="badge badge-soft-pink">Set qua tang</span></td>
                    <td style="font-weight:500">90,000 &#273;</td>
                    <td class="text-muted">—</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><span class="text-muted">—</span></td>
                    <td><span class="badge badge-soft-success">Con banh</span></td>
                    <td class="text-muted">832</td>
                    <td class="text-muted" style="font-size:0.8rem">12/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.show', 3) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', 3) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/f1f5f9/94a3b8?text=🍫" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.products.edit', 4) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh kem socola</a>
                        <div class="text-muted" style="font-size:0.75rem">SKU: THC-004</div>
                    </td>
                    <td><span class="badge badge-soft-pink">Banh kem</span></td>
                    <td style="font-weight:500">420,000 &#273;</td>
                    <td class="text-muted">—</td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td><span class="text-muted">—</span></td>
                    <td><span class="badge badge-soft-danger">Het banh</span></td>
                    <td class="text-muted">234</td>
                    <td class="text-muted" style="font-size:0.8rem">10/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.show', 4) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', 4) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fdf2f8/e84393?text=🍰" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.products.edit', 5) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh mousse viet quat</a>
                        <div class="text-muted" style="font-size:0.75rem">SKU: THC-005</div>
                    </td>
                    <td><span class="badge badge-soft-pink">Banh kem</span></td>
                    <td style="font-weight:500">280,000 &#273;</td>
                    <td style="font-weight:500;color:var(--pink)">250,000 &#273;</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><span class="text-muted">—</span></td>
                    <td><span class="badge badge-soft-info">Dat truoc</span></td>
                    <td class="text-muted">128</td>
                    <td class="text-muted" style="font-size:0.8rem">08/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.show', 5) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', 5) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-5</strong> / <strong>156</strong> san pham</span>
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
