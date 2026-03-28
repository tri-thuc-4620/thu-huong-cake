@extends('admin.layouts.app')

@section('title', 'Slider trang chu')

@section('content')
<div class="page-header">
    <div>
        <h4>Slider trang chu</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly slider anh trang chu</p>
    </div>
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them slider
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Hoat dong</option>
            <option>Tam tat</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <button class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</button>
</div>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>3</strong> slider</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:100px">Anh</th>
                    <th>Badge</th>
                    <th>Tieu de</th>
                    <th>Hoat dong</th>
                    <th>Thu tu</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/80x45/fff0f6/e84393?text=Slide+1" class="rounded-3" style="width:80px;height:45px;object-fit:cover"></td>
                    <td><span class="badge badge-soft-success">Moi</span></td>
                    <td style="font-weight:600;color:#0f172a">Banh sinh nhat tuyet dep</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">1</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.hero-slides.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/80x45/fce7f3/e84393?text=Slide+2" class="rounded-3" style="width:80px;height:45px;object-fit:cover"></td>
                    <td><span class="badge badge-soft-danger">Hot</span></td>
                    <td style="font-weight:600;color:#0f172a">Khuyen mai mua he</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted">2</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.hero-slides.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><img src="https://placehold.co/80x45/f1f5f9/94a3b8?text=Slide+3" class="rounded-3" style="width:80px;height:45px;object-fit:cover"></td>
                    <td><span class="badge badge-soft-warning">Sale</span></td>
                    <td style="font-weight:600;color:#0f172a">Giam gia 20% tat ca</td>
                    <td><i class="bi bi-x-circle-fill text-muted"></i></td>
                    <td class="text-muted">3</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.hero-slides.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
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
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-3</strong> / <strong>3</strong> slider</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
