@extends('admin.layouts.app')

@section('title', 'Bang gia')

@section('content')
<div class="page-header">
    <div>
        <h4>Bang gia</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly bang gia theo tung san pham va to hop thuoc tinh</p>
    </div>
    <a href="{{ route('admin.price-tables.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Tao bang gia moi
    </a>
</div>

{{-- Filter --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end mb-3">
    <div>
        <label class="form-label">San pham</label>
        <select class="form-select form-select-sm" style="min-width:200px">
            <option value="">Tat ca san pham</option>
            <option selected>Banh kem dau tay Premium</option>
            <option>Banh mousse socola</option>
            <option>Banh bong lan trung muoi</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
</div>

{{-- Bang gia: Banh kem dau tay --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h6 class="mb-0" style="font-size:0.95rem">
                <i class="bi bi-table me-2 text-muted"></i>Banh kem dau tay Premium
            </h6>
            <span class="text-muted" style="font-size:0.8rem">Gia goc: 250,000đ &bull; 2 thuoc tinh &bull; 16 bien the</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.price-tables.edit', 1) }}" class="btn btn-soft btn-sm"><i class="bi bi-pencil me-1"></i> Sua</a>
            <button class="btn btn-soft btn-sm"><i class="bi bi-download me-1"></i> Xuat Excel</button>
        </div>
    </div>
    <div class="card-body p-0">
        {{-- Ma tran gia: Kich thuoc x Cot banh --}}
        <div class="table-responsive">
            <table class="table table-bordered mb-0" style="font-size:0.85rem">
                <thead>
                    <tr style="background:#fff0f6">
                        <th style="background:#fdf2f8;font-weight:700;min-width:120px">
                            <div style="font-size:0.7rem;color:#94a3b8">Kich thuoc ↓ / Cot banh →</div>
                        </th>
                        <th class="text-center" style="min-width:130px">
                            <div style="font-weight:600">Gato Vani</div>
                            <div style="font-size:0.7rem;color:#94a3b8">Phu phi: 0đ</div>
                        </th>
                        <th class="text-center" style="min-width:130px">
                            <div style="font-weight:600">Red Velvet</div>
                            <div style="font-size:0.7rem;color:#94a3b8">Phu phi: +30,000đ</div>
                        </th>
                        <th class="text-center" style="min-width:130px">
                            <div style="font-weight:600">Socola</div>
                            <div style="font-size:0.7rem;color:#94a3b8">Phu phi: +20,000đ</div>
                        </th>
                        <th class="text-center" style="min-width:130px">
                            <div style="font-weight:600">Matcha</div>
                            <div style="font-size:0.7rem;color:#94a3b8">Phu phi: +40,000đ</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">
                            14cm
                            <div style="font-size:0.7rem;color:#94a3b8;font-weight:400">2-4 nguoi</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">250,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">280,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">270,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">290,000đ</div>
                            <div style="font-size:0.7rem;color:#f59e0b"><i class="bi bi-exclamation-circle"></i> Sap het</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">
                            16cm
                            <div style="font-size:0.7rem;color:#94a3b8;font-weight:400">4-6 nguoi</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">350,000đ</div>
                            <div style="font-size:0.7rem;color:var(--pink)">KM: <s>350K</s> <strong>300,000đ</strong></div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">380,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">370,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">390,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">
                            18cm
                            <div style="font-size:0.7rem;color:#94a3b8;font-weight:400">6-8 nguoi</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">450,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">480,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">470,000đ</div>
                            <div style="font-size:0.7rem;color:#ef4444"><i class="bi bi-x-circle"></i> Het</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">490,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">
                            20cm
                            <div style="font-size:0.7rem;color:#94a3b8;font-weight:400">8-10 nguoi</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">550,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">580,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">570,000đ</div>
                            <div style="font-size:0.7rem;color:#10b981"><i class="bi bi-check-circle"></i> Con</div>
                        </td>
                        <td class="text-center">
                            <div style="font-weight:600;color:#0f172a">590,000đ</div>
                            <div style="font-size:0.7rem;color:var(--pink)">KM: <s>590K</s> <strong>550,000đ</strong></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer" style="background:#f8fafc;border-top:1px solid #f1f5f9">
        <div class="d-flex justify-content-between align-items-center" style="font-size:0.8rem">
            <div class="text-muted">
                <i class="bi bi-info-circle me-1"></i>
                Gia = Gia goc theo kich thuoc + Phu phi cot banh. Co the sua truc tiep tung o.
            </div>
            <div class="d-flex gap-3">
                <span><i class="bi bi-check-circle text-success me-1"></i> Con hang</span>
                <span><i class="bi bi-exclamation-circle text-warning me-1"></i> Sap het</span>
                <span><i class="bi bi-x-circle text-danger me-1"></i> Het hang</span>
                <span style="color:var(--pink)"><i class="bi bi-tag me-1"></i> Khuyen mai</span>
            </div>
        </div>
    </div>
</div>

{{-- Bang gia: Banh mousse socola --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h6 class="mb-0" style="font-size:0.95rem">
                <i class="bi bi-table me-2 text-muted"></i>Banh mousse socola
            </h6>
            <span class="text-muted" style="font-size:0.8rem">Gia goc: 280,000đ &bull; 1 thuoc tinh &bull; 4 bien the</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.price-tables.edit', 2) }}" class="btn btn-soft btn-sm"><i class="bi bi-pencil me-1"></i> Sua</a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered mb-0" style="font-size:0.85rem">
                <thead>
                    <tr style="background:#fff0f6">
                        <th style="background:#fdf2f8;font-weight:700">Kich thuoc</th>
                        <th class="text-center">Gia ban</th>
                        <th class="text-center">Gia KM</th>
                        <th class="text-center">Ton kho</th>
                        <th class="text-center">Trang thai</th>
                        <th class="text-center">SKU</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">14cm</td>
                        <td class="text-center fw-bold">280,000đ</td>
                        <td class="text-center" style="color:var(--pink);font-weight:600">250,000đ</td>
                        <td class="text-center">25</td>
                        <td class="text-center"><span class="badge badge-soft-success">Con banh</span></td>
                        <td class="text-center text-muted">THC-MS-14</td>
                    </tr>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">16cm</td>
                        <td class="text-center fw-bold">380,000đ</td>
                        <td class="text-center text-muted">—</td>
                        <td class="text-center">18</td>
                        <td class="text-center"><span class="badge badge-soft-success">Con banh</span></td>
                        <td class="text-center text-muted">THC-MS-16</td>
                    </tr>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">18cm</td>
                        <td class="text-center fw-bold">480,000đ</td>
                        <td class="text-center text-muted">—</td>
                        <td class="text-center">5</td>
                        <td class="text-center"><span class="badge badge-soft-warning">Sap het</span></td>
                        <td class="text-center text-muted">THC-MS-18</td>
                    </tr>
                    <tr>
                        <td style="background:#fdf2f8;font-weight:600">20cm</td>
                        <td class="text-center fw-bold">580,000đ</td>
                        <td class="text-center text-muted">—</td>
                        <td class="text-center">0</td>
                        <td class="text-center"><span class="badge badge-soft-danger">Het banh</span></td>
                        <td class="text-center text-muted">THC-MS-20</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- San pham don gian --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h6 class="mb-0" style="font-size:0.95rem">
                <i class="bi bi-table me-2 text-muted"></i>Set qua tang banh mix vi
            </h6>
            <span class="text-muted" style="font-size:0.8rem">San pham don gian &bull; Khong co bien the</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.edit', 3) }}" class="btn btn-soft btn-sm"><i class="bi bi-pencil me-1"></i> Sua SP</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="text-muted" style="font-size:0.75rem">Gia ban</div>
                <div style="font-size:1.25rem;font-weight:700">90,000đ</div>
            </div>
            <div class="col-md-3 text-center">
                <div class="text-muted" style="font-size:0.75rem">Gia KM</div>
                <div style="font-size:1.25rem;font-weight:700;color:var(--pink)">—</div>
            </div>
            <div class="col-md-3 text-center">
                <div class="text-muted" style="font-size:0.75rem">Ton kho</div>
                <div style="font-size:1.25rem;font-weight:700">50</div>
            </div>
            <div class="col-md-3 text-center">
                <div class="text-muted" style="font-size:0.75rem">Trang thai</div>
                <span class="badge badge-soft-success">Con banh</span>
            </div>
        </div>
    </div>
</div>
@endsection
