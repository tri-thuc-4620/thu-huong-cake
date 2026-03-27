@extends('admin.layouts.app')

@section('title', 'Don hang')

@section('content')
<div class="page-header">
    <div>
        <h4>Don hang</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly va xu ly don hang</p>
    </div>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Tao don hang
    </a>
</div>

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#fef3c7;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-clock" style="color:#f59e0b"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Cho xu ly</div>
                    <div style="font-size:1.1rem;font-weight:700">12</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-fire" style="color:#3b82f6"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Dang lam</div>
                    <div style="font-size:1.1rem;font-weight:700">8</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#fce7f3;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-truck" style="color:#e84393"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Dang giao</div>
                    <div style="font-size:1.1rem;font-weight:700">5</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-check-circle" style="color:#10b981"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Hoan thanh</div>
                    <div style="font-size:1.1rem;font-weight:700">1,209</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:150px">
            <option value="">Tat ca</option>
            <option>Cho xu ly</option>
            <option>Da xac nhan</option>
            <option>Dang lam banh</option>
            <option>Dang giao</option>
            <option>Da giao</option>
            <option>Hoan thanh</option>
            <option>Da huy</option>
        </select>
    </div>
    <div>
        <label class="form-label">Hinh thuc</label>
        <select class="form-select form-select-sm" style="min-width:140px">
            <option value="">Tat ca</option>
            <option>Giao tan noi</option>
            <option>Nhan tai CH</option>
        </select>
    </div>
    <div>
        <label class="form-label">Thanh toan</label>
        <select class="form-select form-select-sm" style="min-width:140px">
            <option value="">Tat ca</option>
            <option>Chuyen khoan</option>
            <option>COD</option>
        </select>
    </div>
    <div>
        <label class="form-label">Tu ngay</label>
        <input type="date" class="form-control form-control-sm" style="min-width:140px">
    </div>
    <div>
        <label class="form-label">Den ngay</label>
        <input type="date" class="form-control form-control-sm" style="min-width:140px">
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
</div>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Ma don</th>
                    <th>Khach hang</th>
                    <th>Tong tien</th>
                    <th>Trang thai</th>
                    <th>Hinh thuc</th>
                    <th>Thanh toan</th>
                    <th>Ngay nhan</th>
                    <th>Ngay dat</th>
                    <th style="width:160px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span style="font-weight:600">#THC-0034</span></td>
                    <td>
                        <div style="font-weight:500">Nguyen Van A</div>
                        <div class="text-muted" style="font-size:0.75rem">0962 849 989</div>
                    </td>
                    <td style="font-weight:600">350,000 &#273;</td>
                    <td><span class="badge badge-soft-warning">Cho xu ly</span></td>
                    <td><span style="font-size:0.8rem"><i class="bi bi-truck me-1 text-muted"></i>Giao tan noi</span></td>
                    <td><span style="font-size:0.8rem">Chuyen khoan</span></td>
                    <td class="text-muted" style="font-size:0.8rem">28/03 14:00</td>
                    <td class="text-muted" style="font-size:0.8rem">27/03 10:23</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', 1) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <button class="btn btn-sm btn-outline-success" style="border-radius:8px;font-size:0.75rem;padding:0.25rem 0.6rem">Xac nhan</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span style="font-weight:600">#THC-0033</span></td>
                    <td>
                        <div style="font-weight:500">Tran Thi B</div>
                        <div class="text-muted" style="font-size:0.75rem">0912 345 678</div>
                    </td>
                    <td style="font-weight:600">520,000 &#273;</td>
                    <td><span class="badge badge-soft-info">Da xac nhan</span></td>
                    <td><span style="font-size:0.8rem"><i class="bi bi-truck me-1 text-muted"></i>Giao tan noi</span></td>
                    <td><span style="font-size:0.8rem">COD</span></td>
                    <td class="text-muted" style="font-size:0.8rem">28/03 16:00</td>
                    <td class="text-muted" style="font-size:0.8rem">27/03 09:15</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', 2) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <button class="btn btn-sm btn-outline-primary" style="border-radius:8px;font-size:0.75rem;padding:0.25rem 0.6rem">Lam banh</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span style="font-weight:600">#THC-0032</span></td>
                    <td>
                        <div style="font-weight:500">Le Van C</div>
                        <div class="text-muted" style="font-size:0.75rem">0987 654 321</div>
                    </td>
                    <td style="font-weight:600">180,000 &#273;</td>
                    <td><span class="badge badge-soft-primary">Dang lam banh</span></td>
                    <td><span style="font-size:0.8rem"><i class="bi bi-shop me-1 text-muted"></i>Nhan tai CH</span></td>
                    <td><span style="font-size:0.8rem">Chuyen khoan</span></td>
                    <td class="text-muted" style="font-size:0.8rem">27/03 18:00</td>
                    <td class="text-muted" style="font-size:0.8rem">26/03 20:45</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', 3) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <button class="btn btn-sm" style="border-radius:8px;font-size:0.75rem;padding:0.25rem 0.6rem;background:#fce7f3;color:#9d174d;border:1px solid #f9a8d4">Giao hang</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span style="font-weight:600">#THC-0031</span></td>
                    <td>
                        <div style="font-weight:500">Pham Thi D</div>
                        <div class="text-muted" style="font-size:0.75rem">0901 234 567</div>
                    </td>
                    <td style="font-weight:600">750,000 &#273;</td>
                    <td><span class="badge badge-soft-success">Hoan thanh</span></td>
                    <td><span style="font-size:0.8rem"><i class="bi bi-truck me-1 text-muted"></i>Giao tan noi</span></td>
                    <td><span style="font-size:0.8rem">COD</span></td>
                    <td class="text-muted" style="font-size:0.8rem">26/03 14:00</td>
                    <td class="text-muted" style="font-size:0.8rem">25/03 11:30</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', 4) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.orders.edit', 4) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span style="font-weight:600">#THC-0030</span></td>
                    <td>
                        <div style="font-weight:500">Hoang Van E</div>
                        <div class="text-muted" style="font-size:0.75rem">0938 765 432</div>
                    </td>
                    <td style="font-weight:600">420,000 &#273;</td>
                    <td><span class="badge badge-soft-danger">Da huy</span></td>
                    <td><span style="font-size:0.8rem"><i class="bi bi-truck me-1 text-muted"></i>Giao tan noi</span></td>
                    <td><span style="font-size:0.8rem">Chuyen khoan</span></td>
                    <td class="text-muted" style="font-size:0.8rem">26/03 10:00</td>
                    <td class="text-muted" style="font-size:0.8rem">25/03 08:00</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', 5) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-5</strong> / <strong>1,234</strong> don hang</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">247</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
