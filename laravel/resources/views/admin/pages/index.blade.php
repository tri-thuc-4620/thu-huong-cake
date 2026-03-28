@extends('admin.layouts.app')

@section('title', 'Trang tinh')

@section('content')
<div class="page-header">
    <div>
        <h4>Trang tinh</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly trang gioi thieu, chinh sach, huong dan</p>
    </div>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them trang
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Layout</label>
        <select class="form-select form-select-sm" style="min-width:140px">
            <option value="">Tat ca</option>
            <option>Mac dinh</option>
            <option>Co sidebar</option>
            <option>Toan trang</option>
        </select>
    </div>
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Da dang</option>
            <option>Nhap</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <button class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</button>
</div>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>3</strong> trang tinh</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th>Tieu de</th>
                    <th>Slug</th>
                    <th>Layout</th>
                    <th>Da dang</th>
                    <th>Ngay cap nhat</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        <a href="{{ route('admin.pages.edit', 1) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Gioi thieu</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">gioi-thieu</span></td>
                    <td><span class="badge badge-soft-info">Mac dinh</span></td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted" style="font-size:0.8rem">25/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.pages.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        <a href="{{ route('admin.pages.edit', 2) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Chinh sach bao hanh</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">chinh-sach-bao-hanh</span></td>
                    <td><span class="badge badge-soft-pink">Co sidebar</span></td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted" style="font-size:0.8rem">20/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.pages.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        <a href="{{ route('admin.pages.edit', 3) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Huong dan dat hang</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">huong-dan-dat-hang</span></td>
                    <td><span class="badge badge-soft-warning">Toan trang</span></td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td class="text-muted" style="font-size:0.8rem">18/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.pages.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-3</strong> / <strong>3</strong> trang tinh</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
