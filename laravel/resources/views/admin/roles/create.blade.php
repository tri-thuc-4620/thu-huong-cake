@extends('admin.layouts.app')

@section('title', 'Them vai tro')

@section('content')
<div class="page-header">
    <div>
        <h4>Them vai tro moi</h4>
    </div>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-soft"><i class="bi bi-arrow-left me-1"></i> Quay lai</a>
</div>

<form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h6 class="mb-0">Thong tin vai tro</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Ten vai tro <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="VD: content-editor" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ten hien thi</label>
                        <input type="text" class="form-control" name="display_name" placeholder="VD: Bien tap vien">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Mo ta vai tro nay..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-pink w-100"><i class="bi bi-check-lg me-1"></i> Luu vai tro</button>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Chon quyen</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll" style="font-size:0.85rem">Chon tat ca</label>
                    </div>
                </div>
                <div class="card-body">
                    {{-- San pham --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-box-seam me-1"></i> San pham</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="products.view" id="p1"><label class="form-check-label" for="p1" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="products.create" id="p2"><label class="form-check-label" for="p2" style="font-size:0.8rem">Tao moi</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="products.edit" id="p3"><label class="form-check-label" for="p3" style="font-size:0.8rem">Chinh sua</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="products.delete" id="p4"><label class="form-check-label" for="p4" style="font-size:0.8rem">Xoa</label></div></div>
                    </div>

                    {{-- Danh muc --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-folder2 me-1"></i> Danh muc</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="categories.view"><label class="form-check-label" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="categories.create"><label class="form-check-label" style="font-size:0.8rem">Tao moi</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="categories.edit"><label class="form-check-label" style="font-size:0.8rem">Chinh sua</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="categories.delete"><label class="form-check-label" style="font-size:0.8rem">Xoa</label></div></div>
                    </div>

                    {{-- Don hang --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-receipt me-1"></i> Don hang</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.view"><label class="form-check-label" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.create"><label class="form-check-label" style="font-size:0.8rem">Tao moi</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.edit"><label class="form-check-label" style="font-size:0.8rem">Chinh sua</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.confirm"><label class="form-check-label" style="font-size:0.8rem">Xac nhan</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.process"><label class="form-check-label" style="font-size:0.8rem">Lam banh</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.ship"><label class="form-check-label" style="font-size:0.8rem">Giao hang</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.complete"><label class="form-check-label" style="font-size:0.8rem">Hoan thanh</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="orders.cancel"><label class="form-check-label" style="font-size:0.8rem">Huy don</label></div></div>
                    </div>

                    {{-- Blog --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-newspaper me-1"></i> Blog</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="blog.view"><label class="form-check-label" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="blog.create"><label class="form-check-label" style="font-size:0.8rem">Tao moi</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="blog.edit"><label class="form-check-label" style="font-size:0.8rem">Chinh sua</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="blog.delete"><label class="form-check-label" style="font-size:0.8rem">Xoa</label></div></div>
                    </div>

                    {{-- Noi dung --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-images me-1"></i> Slider & Banner & Trang</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="sliders.edit"><label class="form-check-label" style="font-size:0.8rem">Slider</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="banners.edit"><label class="form-check-label" style="font-size:0.8rem">Banner</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="pages.edit"><label class="form-check-label" style="font-size:0.8rem">Trang tinh</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="stores.edit"><label class="form-check-label" style="font-size:0.8rem">Cua hang</label></div></div>
                    </div>

                    {{-- Lien he --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-envelope me-1"></i> Lien he</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="contacts.view"><label class="form-check-label" style="font-size:0.8rem">Xem</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="contacts.reply"><label class="form-check-label" style="font-size:0.8rem">Tra loi</label></div></div>
                    </div>

                    {{-- He thong --}}
                    <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px"><i class="bi bi-gear me-1"></i> He thong</h6>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="settings.view"><label class="form-check-label" style="font-size:0.8rem">Xem cai dat</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="settings.edit"><label class="form-check-label" style="font-size:0.8rem">Sua cai dat</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="users.manage"><label class="form-check-label" style="font-size:0.8rem">QL nguoi dung</label></div></div>
                        <div class="col-md-3"><div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="roles.manage"><label class="form-check-label" style="font-size:0.8rem">QL vai tro</label></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
