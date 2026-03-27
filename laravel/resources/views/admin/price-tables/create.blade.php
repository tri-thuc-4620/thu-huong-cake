@extends('admin.layouts.app')

@section('title', 'Tao bang gia')

@section('content')
<div class="page-header">
    <div>
        <h4>Tao bang gia moi</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Thiet lap gia cho tung to hop thuoc tinh cua san pham</p>
    </div>
    <a href="{{ route('admin.price-tables.index') }}" class="btn btn-soft">
        <i class="bi bi-arrow-left me-1"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.price-tables.store') }}" method="POST">
    @csrf

    {{-- Buoc 1: Chon san pham --}}
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0"><span class="badge badge-soft-pink me-2">1</span> Chon san pham</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">San pham <span class="text-danger">*</span></label>
                    <select class="form-select" name="product_id" required>
                        <option value="">-- Chon san pham --</option>
                        <option value="1" selected>Banh kem dau tay Premium</option>
                        <option value="2">Banh mousse socola</option>
                        <option value="3">Banh bong lan trung muoi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Gia goc</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="250000" name="base_price">
                        <span class="input-group-text">đ</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Loai bang gia</label>
                    <select class="form-select" name="price_type">
                        <option value="matrix" selected>Ma tran (2 thuoc tinh)</option>
                        <option value="list">Danh sach (1 thuoc tinh)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Buoc 2: Chon thuoc tinh --}}
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0"><span class="badge badge-soft-pink me-2">2</span> Chon thuoc tinh cho bang gia</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Thuoc tinh hang (doc) <span class="text-danger">*</span></label>
                    <select class="form-select" name="row_attribute">
                        <option value="">-- Chon --</option>
                        <option value="1" selected>Kich thuoc</option>
                        <option value="2">Cot banh</option>
                        <option value="3">Mau sac</option>
                    </select>
                    <div class="form-text">Gia tri: 14cm, 16cm, 18cm, 20cm</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Thuoc tinh cot (ngang)</label>
                    <select class="form-select" name="col_attribute">
                        <option value="">Khong chon (bang 1 chieu)</option>
                        <option value="1">Kich thuoc</option>
                        <option value="2" selected>Cot banh</option>
                        <option value="3">Mau sac</option>
                    </select>
                    <div class="form-text">Gia tri: Gato Vani, Red Velvet, Socola, Matcha</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Buoc 3: Nhap gia --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0"><span class="badge badge-soft-pink me-2">3</span> Nhap gia cho tung to hop</h6>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-soft btn-sm"><i class="bi bi-calculator me-1"></i> Tu dong tinh (Gia goc + Phu phi)</button>
                <button type="button" class="btn btn-soft btn-sm"><i class="bi bi-clipboard me-1"></i> Dan tu Excel</button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" style="font-size:0.85rem">
                    <thead>
                        <tr style="background:#fff0f6">
                            <th style="background:#fdf2f8;min-width:120px"></th>
                            <th class="text-center" style="min-width:140px">Gato Vani</th>
                            <th class="text-center" style="min-width:140px">Red Velvet</th>
                            <th class="text-center" style="min-width:140px">Socola</th>
                            <th class="text-center" style="min-width:140px">Matcha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">14cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[14cm][gato-vani]" value="250000" style="border-color:#e2e8f0"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[14cm][red-velvet]" value="280000" style="border-color:#e2e8f0"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[14cm][socola]" value="270000" style="border-color:#e2e8f0"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[14cm][matcha]" value="290000" style="border-color:#e2e8f0"></td>
                        </tr>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">16cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[16cm][gato-vani]" value="350000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[16cm][red-velvet]" value="380000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[16cm][socola]" value="370000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[16cm][matcha]" value="390000"></td>
                        </tr>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">18cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[18cm][gato-vani]" value="450000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[18cm][red-velvet]" value="480000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[18cm][socola]" value="470000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[18cm][matcha]" value="490000"></td>
                        </tr>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">20cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[20cm][gato-vani]" value="550000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[20cm][red-velvet]" value="580000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[20cm][socola]" value="570000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" name="prices[20cm][matcha]" value="590000"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer" style="background:#f8fafc">
            <div class="form-text"><i class="bi bi-info-circle me-1"></i> Nhap gia bang so (VD: 250000). De trong o nao = khong ban to hop do.</div>
        </div>
    </div>

    {{-- Submit --}}
    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-pink"><i class="bi bi-check-lg me-1"></i> Luu bang gia</button>
        <a href="{{ route('admin.price-tables.index') }}" class="btn btn-soft">Huy</a>
    </div>
</form>
@endsection
