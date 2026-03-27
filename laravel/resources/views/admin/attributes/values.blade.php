@extends('admin.layouts.app')

@section('title', 'Gia tri thuoc tinh')

@section('content')
<div class="page-header">
    <div>
        <h4>Thuoc tinh: <span style="color:var(--pink)">Kich thuoc</span></h4>
        <nav class="breadcrumb mb-0" style="font-size:0.8rem">
            <a class="breadcrumb-item" href="{{ route('admin.attributes.index') }}">Thuoc tinh</a>
            <span class="breadcrumb-item active">Kich thuoc</span>
        </nav>
    </div>
    <a href="{{ route('admin.attributes.index') }}" class="btn btn-soft">
        <i class="bi bi-arrow-left me-1"></i> Quay lai
    </a>
</div>

<div class="row g-4">
    {{-- LEFT: Form them gia tri --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h6 class="mb-0">Them gia tri moi</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.attributes.values.store', 1) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ten gia tri <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="VD: 16cm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="Tu dong tao">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta</label>
                        <textarea class="form-control" name="description" rows="2" placeholder="Mo ta gia tri nay (tuy chon)"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gia tri hien thi</label>
                        <input type="text" class="form-control" name="display_value" placeholder="VD: ma mau #FF5733, URL anh...">
                        <div class="form-text">Dung cho kieu Color swatches hoac Hinh anh</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thu tu</label>
                        <input type="number" class="form-control" name="sort_order" value="0">
                    </div>
                    <button type="submit" class="btn btn-pink w-100">
                        <i class="bi bi-plus-lg me-1"></i> Them gia tri
                    </button>
                </form>
            </div>
        </div>

        {{-- Thong tin thuoc tinh --}}
        <div class="card mt-4">
            <div class="card-header"><h6 class="mb-0">Thong tin thuoc tinh</h6></div>
            <div class="card-body">
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Ten:</span><strong>Kich thuoc</strong>
                </div>
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Slug:</span><span>kich-thuoc</span>
                </div>
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Kieu hien thi:</span><span class="badge badge-soft-info">Nut bam</span>
                </div>
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Loc san pham:</span><span class="text-success"><i class="bi bi-check-circle-fill"></i> Co</span>
                </div>
                <div class="d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">So san pham su dung:</span><strong>42</strong>
                </div>
                <hr>
                <a href="{{ route('admin.attributes.edit', 1) }}" class="btn btn-soft btn-sm w-100">
                    <i class="bi bi-pencil me-1"></i> Chinh sua thuoc tinh
                </a>
            </div>
        </div>
    </div>

    {{-- RIGHT: Danh sach gia tri --}}
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size:0.85rem"><strong>6</strong> gia tri</span>
                <div class="d-flex gap-2">
                    <button class="btn btn-soft btn-sm"><i class="bi bi-sort-down me-1"></i> Sap xep</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:30px"><i class="bi bi-grip-vertical text-muted"></i></th>
                            <th>Ten gia tri</th>
                            <th>Slug</th>
                            <th>Mo ta</th>
                            <th>So SP</th>
                            <th>Thu tu</th>
                            <th style="width:100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>14cm</strong></td>
                            <td class="text-muted">14cm</td>
                            <td class="text-muted" style="font-size:0.8rem">Banh size nho, 2-4 nguoi an</td>
                            <td><span class="badge badge-soft-pink">12</span></td>
                            <td>0</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit" title="Sua nhanh" data-bs-toggle="modal" data-bs-target="#editValueModal"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>16cm</strong></td>
                            <td class="text-muted">16cm</td>
                            <td class="text-muted" style="font-size:0.8rem">Banh size trung binh, 4-6 nguoi an</td>
                            <td><span class="badge badge-soft-pink">28</span></td>
                            <td>1</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>18cm</strong></td>
                            <td class="text-muted">18cm</td>
                            <td class="text-muted" style="font-size:0.8rem">Banh size lon, 6-8 nguoi an</td>
                            <td><span class="badge badge-soft-pink">25</span></td>
                            <td>2</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>20cm</strong></td>
                            <td class="text-muted">20cm</td>
                            <td class="text-muted" style="font-size:0.8rem">Banh size lon, 8-10 nguoi an</td>
                            <td><span class="badge badge-soft-pink">20</span></td>
                            <td>3</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>22cm</strong></td>
                            <td class="text-muted">22cm</td>
                            <td class="text-muted" style="font-size:0.8rem">Banh size dac biet, 10-12 nguoi an</td>
                            <td><span class="badge badge-soft-pink">10</span></td>
                            <td>4</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>25cm</strong></td>
                            <td class="text-muted">25cm</td>
                            <td class="text-muted" style="font-size:0.8rem">Banh size tiec, 12-15 nguoi an</td>
                            <td><span class="badge badge-soft-pink">5</span></td>
                            <td>5</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit"><i class="bi bi-pencil"></i></button>
                                    <button class="action-btn delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Preview --}}
        <div class="card mt-4">
            <div class="card-header"><h6 class="mb-0"><i class="bi bi-eye me-2 text-muted"></i>Xem truoc hien thi tren web</h6></div>
            <div class="card-body">
                <label style="font-size:0.85rem;font-weight:600;margin-bottom:8px;display:block">Kich thuoc:</label>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-sm btn-outline-pink" style="border-radius:8px;min-width:60px">14cm</button>
                    <button type="button" class="btn btn-sm btn-pink" style="border-radius:8px;min-width:60px">16cm</button>
                    <button type="button" class="btn btn-sm btn-outline-pink" style="border-radius:8px;min-width:60px">18cm</button>
                    <button type="button" class="btn btn-sm btn-outline-pink" style="border-radius:8px;min-width:60px">20cm</button>
                    <button type="button" class="btn btn-sm btn-outline-pink" style="border-radius:8px;min-width:60px">22cm</button>
                    <button type="button" class="btn btn-sm btn-outline-pink" style="border-radius:8px;min-width:60px">25cm</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal sua nhanh --}}
<div class="modal fade" id="editValueModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px">
            <div class="modal-header" style="border-bottom:1px solid #f1f5f9">
                <h6 class="modal-title">Sua gia tri: 14cm</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Ten gia tri</label>
                    <input type="text" class="form-control" value="14cm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" value="14cm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mo ta</label>
                    <textarea class="form-control" rows="2">Banh size nho, 2-4 nguoi an</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Thu tu</label>
                    <input type="number" class="form-control" value="0">
                </div>
            </div>
            <div class="modal-footer" style="border-top:1px solid #f1f5f9">
                <button type="button" class="btn btn-soft" data-bs-dismiss="modal">Huy</button>
                <button type="button" class="btn btn-pink">Luu thay doi</button>
            </div>
        </div>
    </div>
</div>
@endsection
