@extends('admin.layouts.app')

@section('title', 'Thuoc tinh san pham')

@section('content')
<div class="page-header">
    <div>
        <h4>Thuoc tinh san pham</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly thuoc tinh va gia tri (Kich thuoc, Cot banh, Mau sac...)</p>
    </div>
</div>

<div class="row g-4">
    {{-- LEFT: Form them thuoc tinh --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h6 class="mb-0">Them thuoc tinh moi</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.attributes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ten thuoc tinh <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="VD: Kich thuoc" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="Tu dong tao tu ten">
                        <div class="form-text">Dung trong URL va he thong</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kieu hien thi</label>
                        <select class="form-select" name="display_type">
                            <option value="select">Dropdown (Select)</option>
                            <option value="button">Nut bam (Buttons)</option>
                            <option value="color">Mau sac (Color swatches)</option>
                            <option value="image">Hinh anh</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thu tu</label>
                        <input type="number" class="form-control" name="sort_order" value="0">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="isFilterable" name="is_filterable" checked>
                        <label class="form-check-label" for="isFilterable" style="font-size:0.85rem">Cho phep loc tren trang san pham</label>
                    </div>
                    <button type="submit" class="btn btn-pink w-100">
                        <i class="bi bi-plus-lg me-1"></i> Them thuoc tinh
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- RIGHT: Danh sach thuoc tinh --}}
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size:0.85rem"><strong>6</strong> thuoc tinh</span>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ten thuoc tinh</th>
                            <th>Slug</th>
                            <th>Kieu hien thi</th>
                            <th>So gia tri</th>
                            <th>Thu tu</th>
                            <th style="width:140px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="{{ route('admin.attributes.values', 1) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Kich thuoc</a>
                            </td>
                            <td class="text-muted">kich-thuoc</td>
                            <td><span class="badge badge-soft-info">Nut bam</span></td>
                            <td>
                                <a href="{{ route('admin.attributes.values', 1) }}" style="color:var(--pink);text-decoration:none;font-weight:500">6 gia tri</a>
                            </td>
                            <td>0</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', 1) }}" class="action-btn view" title="Quan ly gia tri"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                    <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('admin.attributes.values', 2) }}" style="font-weight:600;color:#0f172a;text-decoration:none">Cot banh</a>
                            </td>
                            <td class="text-muted">cot-banh</td>
                            <td><span class="badge badge-soft-info">Nut bam</span></td>
                            <td>
                                <a href="{{ route('admin.attributes.values', 2) }}" style="color:var(--pink);text-decoration:none;font-weight:500">5 gia tri</a>
                            </td>
                            <td>1</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', 2) }}" class="action-btn view"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', 2) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="font-weight:600">Mau sac</span></td>
                            <td class="text-muted">mau-sac</td>
                            <td><span class="badge badge-soft-success">Mau sac</span></td>
                            <td><span style="color:var(--pink);font-weight:500">8 gia tri</span></td>
                            <td>2</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', 3) }}" class="action-btn view"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', 3) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="font-weight:600">Huong vi</span></td>
                            <td class="text-muted">huong-vi</td>
                            <td><span class="badge badge-soft-warning">Dropdown</span></td>
                            <td><span style="color:var(--pink);font-weight:500">4 gia tri</span></td>
                            <td>3</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', 4) }}" class="action-btn view"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', 4) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="font-weight:600">Lop banh</span></td>
                            <td class="text-muted">lop-banh</td>
                            <td><span class="badge badge-soft-warning">Dropdown</span></td>
                            <td><span style="color:var(--pink);font-weight:500">3 gia tri</span></td>
                            <td>4</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', 5) }}" class="action-btn view"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', 5) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="font-weight:600">Trang tri</span></td>
                            <td class="text-muted">trang-tri</td>
                            <td><span class="badge badge-soft-primary">Hinh anh</span></td>
                            <td><span style="color:var(--pink);font-weight:500">6 gia tri</span></td>
                            <td>5</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', 6) }}" class="action-btn view"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', 6) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
