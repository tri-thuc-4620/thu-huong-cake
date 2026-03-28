@extends('admin.layouts.app')

@section('title', 'Bai viet')

@section('content')
<div class="page-header">
    <div>
        <h4>Bai viet</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly bai viet va tin tuc</p>
    </div>
    <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them bai viet
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Danh muc</label>
        <select class="form-select form-select-sm" style="min-width:150px">
            <option value="">Tat ca danh muc</option>
            <option>Huong dan</option>
            <option>Tin tuc</option>
            <option>Cong thuc</option>
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
        <span style="font-size:0.85rem"><strong>5</strong> bai viet</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:56px">Anh</th>
                    <th>Tieu de</th>
                    <th>Danh muc</th>
                    <th>Tac gia</th>
                    <th>Trang thai</th>
                    <th>Luot xem</th>
                    <th>Ngay dang</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fff0f6/e84393?text=📝" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.blog-posts.edit', 1) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Cach chon banh sinh nhat dep</a>
                    </td>
                    <td><span class="badge badge-soft-info">Huong dan</span></td>
                    <td class="text-muted" style="font-size:0.85rem">Admin</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">1,250</td>
                    <td class="text-muted" style="font-size:0.8rem">20/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.blog-posts.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fdf2f8/e84393?text=🎂" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.blog-posts.edit', 2) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Xu huong banh kem 2026</a>
                    </td>
                    <td><span class="badge badge-soft-warning">Tin tuc</span></td>
                    <td class="text-muted" style="font-size:0.85rem">Admin</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">980</td>
                    <td class="text-muted" style="font-size:0.8rem">18/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.blog-posts.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/f0fdf4/10b981?text=🍰" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.blog-posts.edit', 3) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Bao quan banh kem dung cach</a>
                    </td>
                    <td><span class="badge badge-soft-info">Huong dan</span></td>
                    <td class="text-muted" style="font-size:0.85rem">Admin</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">750</td>
                    <td class="text-muted" style="font-size:0.8rem">15/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.blog-posts.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/f1f5f9/94a3b8?text=📰" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.blog-posts.edit', 4) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Khai truong chi nhanh moi tai Quan 7</a>
                    </td>
                    <td><span class="badge badge-soft-warning">Tin tuc</span></td>
                    <td class="text-muted" style="font-size:0.85rem">Admin</td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td class="text-muted">0</td>
                    <td class="text-muted" style="font-size:0.8rem">—</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.blog-posts.edit', 4) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fef3c7/f59e0b?text=🧁" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.blog-posts.edit', 5) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Cong thuc lam banh bong lan tai nha</a>
                    </td>
                    <td><span class="badge badge-soft-pink">Cong thuc</span></td>
                    <td class="text-muted" style="font-size:0.85rem">Admin</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">2,100</td>
                    <td class="text-muted" style="font-size:0.8rem">10/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.blog-posts.edit', 5) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
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
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-5</strong> / <strong>5</strong> bai viet</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
