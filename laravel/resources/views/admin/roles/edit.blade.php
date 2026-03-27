@extends('admin.layouts.app')

@section('title', 'Sua vai tro')

@section('content')
<div class="page-header">
    <div>
        <h4>Sua vai tro: <span style="color:var(--pink)">Quan ly (Manager)</span></h4>
    </div>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-soft"><i class="bi bi-arrow-left me-1"></i> Quay lai</a>
</div>

<form action="{{ route('admin.roles.update', 3) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h6 class="mb-0">Thong tin vai tro</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Ten vai tro</label>
                        <input type="text" class="form-control" name="name" value="manager" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ten hien thi</label>
                        <input type="text" class="form-control" name="display_name" value="Quan ly">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta</label>
                        <textarea class="form-control" name="description" rows="3">Quan ly san pham, don hang, blog, lien he.</textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-pink"><i class="bi bi-check-lg me-1"></i> Luu thay doi</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-soft">Huy</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Quyen cua vai tro nay</h6>
                    <span class="badge badge-soft-pink">32 / 57 quyen</span>
                </div>
                <div class="card-body">
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-box-seam me-1"></i> San pham</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Tao moi</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Chinh sua</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.8rem">Xoa</label></div></div>
                    </div>

                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-receipt me-1"></i> Don hang</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Chinh sua</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Xac nhan</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Huy don</label></div></div>
                    </div>

                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-newspaper me-1"></i> Blog & Noi dung</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Blog</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Slider</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Banner</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.8rem">Lien he</label></div></div>
                    </div>

                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-gear me-1"></i> He thong</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.8rem">Cai dat</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.8rem">QL nguoi dung</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.8rem">QL vai tro</label></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
