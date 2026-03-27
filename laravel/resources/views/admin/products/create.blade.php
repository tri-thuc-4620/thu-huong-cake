@extends('admin.layouts.app')

@section('title', 'Them san pham')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Them san pham moi</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Section 1: Thong tin co ban --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="mb-0"><i class="bi bi-info-circle"></i> Thong tin co ban</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Ten san pham <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhap ten san pham" required>
                </div>
                <div class="col-md-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Tu dong tao tu ten">
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Danh muc <span class="text-danger">*</span></label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">-- Chon danh muc --</option>
                        <option value="1">Banh kem</option>
                        <option value="2">Banh mi</option>
                        <option value="3">Banh ngot</option>
                        <option value="4">Banh man</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sku" class="form-label">Ma SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="VD: BK-001">
                </div>
            </div>
        </div>
    </div>

    {{-- Section 2: Gia & Kho hang --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="mb-0"><i class="bi bi-tag"></i> Gia & Kho hang</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="price" class="form-label">Gia ban <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="price" name="price" placeholder="0" required>
                        <span class="input-group-text">&#273;</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="sale_price" class="form-label">Gia khuyen mai</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="0">
                        <span class="input-group-text">&#273;</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stock_quantity" class="form-label">So luong ton kho</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="0" value="0">
                </div>
                <div class="col-md-6">
                    <label for="stock_status" class="form-label">Trang thai kho</label>
                    <select class="form-select" id="stock_status" name="stock_status">
                        <option value="in_stock">Con hang</option>
                        <option value="low_stock">Sap het hang</option>
                        <option value="out_of_stock">Het hang</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 3: Tuy chon banh --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white" data-bs-toggle="collapse" data-bs-target="#cakeOptionsSection" role="button">
            <h6 class="mb-0">
                <i class="bi bi-sliders"></i> Tuy chon banh
                <i class="bi bi-chevron-down float-end"></i>
            </h6>
        </div>
        <div class="collapse show" id="cakeOptionsSection">
            <div class="card-body">
                {{-- Sub: Kich thuoc & Gia --}}
                <h6 class="text-muted mb-3">Kich thuoc & Gia</h6>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Kich thuoc</th>
                                <th>Gia</th>
                                <th style="width:60px"></th>
                            </tr>
                        </thead>
                        <tbody id="sizeRows">
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="sizes[0][label]" placeholder="VD: 16cm"></td>
                                <td><input type="number" class="form-control form-control-sm" name="sizes[0][price]" placeholder="0"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="sizes[1][label]" placeholder="VD: 20cm"></td>
                                <td><input type="number" class="form-control form-control-sm" name="sizes[1][price]" placeholder="0"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-plus"></i> Them kich thuoc
                    </button>
                </div>

                <hr>

                {{-- Sub: Cot banh & Phu phi --}}
                <h6 class="text-muted mb-3">Cot banh & Phu phi</h6>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Loai cot banh</th>
                                <th>Phu phi</th>
                                <th style="width:60px"></th>
                            </tr>
                        </thead>
                        <tbody id="layerRows">
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="layers[0][label]" placeholder="VD: 1 tang"></td>
                                <td><input type="number" class="form-control form-control-sm" name="layers[0][extra_price]" placeholder="0"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="layers[1][label]" placeholder="VD: 2 tang"></td>
                                <td><input type="number" class="form-control form-control-sm" name="layers[1][extra_price]" placeholder="0"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-plus"></i> Them cot banh
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 4: Hinh anh --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white" data-bs-toggle="collapse" data-bs-target="#imagesSection" role="button">
            <h6 class="mb-0">
                <i class="bi bi-images"></i> Hinh anh
                <i class="bi bi-chevron-down float-end"></i>
            </h6>
        </div>
        <div class="collapse show" id="imagesSection">
            <div class="card-body">
                <div class="mb-3">
                    <label for="images" class="form-label">Chon hinh anh</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                    <div class="form-text">Co the chon nhieu anh. Dinh dang: JPG, PNG, WebP. Toi da 2MB/anh.</div>
                </div>
                <div id="imagePreview" class="d-flex flex-wrap gap-2">
                    <div class="border rounded p-2 text-center text-muted" style="width:120px;height:120px;display:flex;align-items:center;justify-content:center;">
                        <small>Preview anh</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 5: Mo ta --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="mb-0"><i class="bi bi-text-paragraph"></i> Mo ta</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="short_description" class="form-label">Mo ta ngan</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="3" placeholder="Mo ta ngan gon ve san pham..."></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mo ta chi tiet</label>
                <textarea class="form-control" id="description" name="description" rows="6" placeholder="Mo ta chi tiet san pham..."></textarea>
                <div class="form-text">Rich editor se duoc tich hop</div>
            </div>
        </div>
    </div>

    {{-- Section 6: Hien thi & SEO --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="mb-0"><i class="bi bi-eye"></i> Hien thi & SEO</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" checked>
                        <label class="form-check-label" for="is_visible">Hien thi san pham</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                        <label class="form-check-label" for="is_featured">San pham noi bat</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_hot" name="is_hot" value="1">
                        <label class="form-check-label" for="is_hot">San pham Hot</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_new" name="is_new" value="1">
                        <label class="form-check-label" for="is_new">San pham Moi</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thu tu hien thi</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="0">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Tieu de SEO">
                </div>
                <div class="col-md-6">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2" placeholder="Mo ta SEO"></textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit --}}
    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg"></i> Luu san pham
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Huy</a>
    </div>
</form>
@endsection
