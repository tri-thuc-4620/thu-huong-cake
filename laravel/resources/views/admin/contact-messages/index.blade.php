@extends('admin.layouts.app')

@section('title', 'Tin nhan lien he')

@section('content')
<div class="page-header">
    <div>
        <h4>Tin nhan lien he</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly tin nhan tu khach hang</p>
    </div>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Da doc</option>
            <option>Chua doc</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <button class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</button>
</div>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>5</strong> tin nhan</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th>Ten</th>
                    <th>SDT</th>
                    <th>Email</th>
                    <th>Noi dung</th>
                    <th>Trang thai</th>
                    <th>Ngay gui</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">Nguyen Van A</td>
                    <td class="text-muted" style="font-size:0.85rem">0912 345 678</td>
                    <td class="text-muted" style="font-size:0.85rem">nguyenvana@email.com</td>
                    <td class="text-muted" style="font-size:0.85rem">Toi muon dat banh sinh nhat cho...</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted" style="font-size:0.8rem">27/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.contact-messages.show', 1) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.contact-messages.edit', 1) }}" class="action-btn edit" title="Tra loi"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">Tran Thi B</td>
                    <td class="text-muted" style="font-size:0.85rem">0987 654 321</td>
                    <td class="text-muted" style="font-size:0.85rem">tranthib@email.com</td>
                    <td class="text-muted" style="font-size:0.85rem">Cho toi hoi ve gia banh kem 3...</td>
                    <td><span class="badge badge-soft-warning">Chua doc</span></td>
                    <td class="text-muted" style="font-size:0.8rem">26/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.contact-messages.show', 2) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.contact-messages.edit', 2) }}" class="action-btn edit" title="Tra loi"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">Le Van C</td>
                    <td class="text-muted" style="font-size:0.85rem">0901 234 567</td>
                    <td class="text-muted" style="font-size:0.85rem">levanc@email.com</td>
                    <td class="text-muted" style="font-size:0.85rem">Cua hang co giao hang tan noi...</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i></td>
                    <td class="text-muted" style="font-size:0.8rem">25/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.contact-messages.show', 3) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.contact-messages.edit', 3) }}" class="action-btn edit" title="Tra loi"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">Pham Thi D</td>
                    <td class="text-muted" style="font-size:0.85rem">0976 543 210</td>
                    <td class="text-muted" style="font-size:0.85rem">phamthid@email.com</td>
                    <td class="text-muted" style="font-size:0.85rem">Toi muon hop tac kinh doanh voi...</td>
                    <td><span class="badge badge-soft-warning">Chua doc</span></td>
                    <td class="text-muted" style="font-size:0.8rem">24/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.contact-messages.show', 4) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.contact-messages.edit', 4) }}" class="action-btn edit" title="Tra loi"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">Hoang Van E</td>
                    <td class="text-muted" style="font-size:0.85rem">0934 567 890</td>
                    <td class="text-muted" style="font-size:0.85rem">hoangvane@email.com</td>
                    <td class="text-muted" style="font-size:0.85rem">Bao gia banh cuoi cho 200 khach...</td>
                    <td><span class="badge badge-soft-warning">Chua doc</span></td>
                    <td class="text-muted" style="font-size:0.8rem">23/03/2026</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.contact-messages.show', 5) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.contact-messages.edit', 5) }}" class="action-btn edit" title="Tra loi"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>1-5</strong> / <strong>5</strong> tin nhan</span>
    <nav>
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
@endsection
