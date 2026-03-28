@extends('admin.layouts.app')

@section('title', 'Danh muc')

@section('content')
<div class="page-header">
    <div>
        <h4>Danh muc</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly danh muc san pham</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them danh muc
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Hien thi</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Hien thi</option>
            <option>An</option>
        </select>
    </div>
    <div>
        <label class="form-label">Hien menu</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Co</option>
            <option>Khong</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <button class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</button>
</div>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>5</strong> danh muc</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:56px">Anh</th>
                    <th>Ten</th>
                    <th>Slug</th>
                    <th>Danh muc cha</th>
                    <th>So SP</th>
                    <th>Hien thi</th>
                    <th>Menu</th>
                    <th>Thu tu</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fff0f6/e84393?text=BK" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.categories.edit', 1) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh kem</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">banh-kem</span></td>
                    <td class="text-muted">—</td>
                    <td>45</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">1</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.categories.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/f0fdf4/10b981?text=BM" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.categories.edit', 2) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh mi</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">banh-mi</span></td>
                    <td class="text-muted">—</td>
                    <td>28</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">2</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.categories.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/fef3c7/f59e0b?text=BN" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.categories.edit', 3) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh ngot</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">banh-ngot</span></td>
                    <td class="text-muted">—</td>
                    <td>35</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">3</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.categories.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/eff6ff/3b82f6?text=BM" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.categories.edit', 4) }}" style="font-weight:600;color:#0f172a;text-decoration:none">
                            <i class="bi bi-arrow-return-right text-muted me-1" style="font-size:0.8rem"></i>Banh man
                        </a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">banh-man</span></td>
                    <td><span class="badge badge-soft-pink">Banh ngot</span></td>
                    <td>12</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td class="text-muted">1</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.categories.edit', 4) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/48x48/f5f3ff/7c3aed?text=BT" class="rounded-3" width="48" height="48" style="object-fit:cover"></td>
                    <td>
                        <a href="{{ route('admin.categories.edit', 5) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Banh trang tri</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">banh-trang-tri</span></td>
                    <td class="text-muted">—</td>
                    <td>36</td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td class="text-muted">4</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.categories.edit', 5) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
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
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-5</strong> / <strong>5</strong> danh muc</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
