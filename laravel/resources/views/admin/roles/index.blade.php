@extends('admin.layouts.app')

@section('title', 'Phan quyen')

@section('content')
<div class="page-header">
    <div>
        <h4>Phan quyen & Vai tro</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly vai tro va quyen truy cap he thong</p>
    </div>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them vai tro
    </a>
</div>

{{-- Danh sach vai tro --}}
<div class="row g-4">
    {{-- Super Admin --}}
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid #e84393">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">Super Admin</h6>
                        <span class="badge badge-soft-pink">Toan quyen</span>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">1 nguoi dung</span>
                </div>
                <p class="text-muted" style="font-size:0.8rem">Quyen cao nhat, truy cap tat ca chuc nang, quan ly nguoi dung va phan quyen.</p>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge" style="background:#f0fdf4;color:#166534;font-size:0.7rem">Tat ca quyen (57)</span>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', 1) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Admin --}}
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid #6366f1">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">Admin</h6>
                        <span class="badge badge-soft-primary">Quan tri</span>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">0 nguoi dung</span>
                </div>
                <p class="text-muted" style="font-size:0.8rem">Quyen quan tri day du, tuong tu Super Admin nhung khong the quan ly vai tro.</p>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge" style="background:#f0fdf4;color:#166534;font-size:0.7rem">57 quyen</span>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', 2) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- Quan ly --}}
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid #f59e0b">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">Quan ly (Manager)</h6>
                        <span class="badge badge-soft-warning">Quan ly</span>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">1 nguoi dung</span>
                </div>
                <p class="text-muted" style="font-size:0.8rem">Quan ly san pham, don hang, blog, lien he. Khong duoc xoa du lieu hoac quan ly nguoi dung.</p>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge badge-soft-success" style="font-size:0.7rem">products</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">orders</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">blog</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">contacts</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">attributes</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">+5</span>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', 3) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- Editor --}}
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid #10b981">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">Bien tap (Editor)</h6>
                        <span class="badge badge-soft-success">Noi dung</span>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">0 nguoi dung</span>
                </div>
                <p class="text-muted" style="font-size:0.8rem">Quan ly blog, slider, banner, trang tinh. Chi xem san pham, khong duoc sua.</p>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge badge-soft-success" style="font-size:0.7rem">blog</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">sliders</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">banners</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">pages</span>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', 4) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- Nhan vien --}}
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid #3b82f6">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">Nhan vien (Staff)</h6>
                        <span class="badge badge-soft-info">Ban hang</span>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">1 nguoi dung</span>
                </div>
                <p class="text-muted" style="font-size:0.8rem">Xem san pham, xu ly don hang (xac nhan, lam banh, giao hang), tra loi lien he.</p>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge badge-soft-success" style="font-size:0.7rem">products.view</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">orders</span>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">contacts</span>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', 5) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- Khach hang --}}
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid #94a3b8">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">Khach hang (Customer)</h6>
                        <span class="badge" style="background:#f1f5f9;color:#64748b">Khach hang</span>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">0 nguoi dung</span>
                </div>
                <p class="text-muted" style="font-size:0.8rem">Xem don hang cua minh, cap nhat thong tin ca nhan. Khong truy cap trang admin.</p>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    <span class="badge" style="background:#fef2f2;color:#991b1b;font-size:0.7rem">Khong co quyen admin</span>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', 6) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Bang quyen chi tiet --}}
<div class="card table-card mt-4">
    <div class="card-header">
        <h6 class="mb-0"><i class="bi bi-shield-check me-2 text-muted"></i>Ma tran quyen chi tiet</h6>
    </div>
    <div class="table-responsive">
        <table class="table" style="font-size:0.8rem">
            <thead>
                <tr>
                    <th style="min-width:160px">Quyen</th>
                    <th class="text-center">Super Admin</th>
                    <th class="text-center">Admin</th>
                    <th class="text-center">Quan ly</th>
                    <th class="text-center">Editor</th>
                    <th class="text-center">Staff</th>
                    <th class="text-center">Khach hang</th>
                </tr>
            </thead>
            <tbody>
                <tr style="background:#fdf2f8"><td colspan="7" style="font-weight:700;color:var(--pink)">San pham</td></tr>
                <tr><td>products.view</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>products.create</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>products.edit</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>products.delete</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>

                <tr style="background:#fdf2f8"><td colspan="7" style="font-weight:700;color:var(--pink)">Don hang</td></tr>
                <tr><td>orders.view</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>orders.confirm</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>orders.cancel</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>

                <tr style="background:#fdf2f8"><td colspan="7" style="font-weight:700;color:var(--pink)">Noi dung</td></tr>
                <tr><td>blog.create</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>sliders.edit</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>

                <tr style="background:#fdf2f8"><td colspan="7" style="font-weight:700;color:var(--pink)">He thong</td></tr>
                <tr><td>settings.edit</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>users.manage</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
                <tr><td>roles.manage</td><td class="text-center"><i class="bi bi-check-circle-fill text-success"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td><td class="text-center"><i class="bi bi-x-circle text-muted"></i></td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
