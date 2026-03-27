@extends('admin.layouts.app')

@section('title', 'Chinh sua san pham')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chinh sua san pham</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.products.update', $product->id ?? 1) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Section 1: Thong tin co ban --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="mb-0"><i class="bi bi-info-circle"></i> Thong tin co ban</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Ten san pham <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? 'Banh kem dau tay' }}" required>
                </div>
                <div class="col-md-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug ?? 'banh-kem-dau-tay' }}">
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Danh muc <span class="text-danger">*</span></label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">-- Chon danh muc --</option>
                        <option value="1" selected>Banh kem</option>
                        <option value="2">Banh mi</option>
                        <option value="3">Banh ngot</option>
                        <option value="4">Banh man</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sku" class="form-label">Ma SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku ?? 'BK-001' }}">
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
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price ?? 350000 }}" required>
                        <span class="input-group-text">&#273;</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="sale_price" class="form-label">Gia khuyen mai</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price ?? 300000 }}">
                        <span class="input-group-text">&#273;</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stock_quantity" class="form-label">So luong ton kho</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity ?? 50 }}">
                </div>
                <div class="col-md-6">
                    <label for="stock_status" class="form-label">Trang thai kho</label>
                    <select class="form-select" id="stock_status" name="stock_status">
                        <option value="in_stock" selected>Con hang</option>
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
                                <td><input type="text" class="form-control form-control-sm" name="sizes[0][label]" value="16cm"></td>
                                <td><input type="number" class="form-control form-control-sm" name="sizes[0][price]" value="350000"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="sizes[1][label]" value="20cm"></td>
                                <td><input type="number" class="form-control form-control-sm" name="sizes[1][price]" value="450000"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-plus"></i> Them kich thuoc
                    </button>
                </div>

                <hr>

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
                                <td><input type="text" class="form-control form-control-sm" name="layers[0][label]" value="1 tang"></td>
                                <td><input type="number" class="form-control form-control-sm" name="layers[0][extra_price]" value="0"></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="layers[1][label]" value="2 tang"></td>
                                <td><input type="number" class="form-control form-control-sm" name="layers[1][extra_price]" value="150000"></td>
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
                    <label class="form-label">Hinh anh hien tai</label>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="position-relative">
                            <img src="https://placehold.co/120x120/FFE4E1/333?text=Anh+1" class="rounded border" width="120" height="120">
                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" style="margin:-5px -5px 0 0;padding:0 4px;">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                        <div class="position-relative">
                            <img src="https://placehold.co/120x120/FFE4E1/333?text=Anh+2" class="rounded border" width="120" height="120">
                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" style="margin:-5px -5px 0 0;padding:0 4px;">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Them hinh anh moi</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                    <div class="form-text">Co the chon nhieu anh. Dinh dang: JPG, PNG, WebP. Toi da 2MB/anh.</div>
                </div>
                <div id="imagePreview" class="d-flex flex-wrap gap-2"></div>
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
                <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ $product->short_description ?? 'Banh kem dau tay tuoi ngon, lop kem beo ngay' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mo ta chi tiet</label>
                <textarea class="form-control" id="description" name="description" rows="6">{{ $product->description ?? 'Banh kem dau tay duoc lam tu nguyen lieu tuoi ngon nhat. Lop banh bong lan mem min ket hop voi kem tuoi va dau tay tuoi.' }}</textarea>
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
                        <input class="form-check-input" type="checkbox" id="is_hot" name="is_hot" value="1" checked>
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
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ $product->sort_order ?? 0 }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $product->meta_title ?? 'Banh kem dau tay - Thu Huong Cake' }}">
                </div>
                <div class="col-md-6">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ $product->meta_description ?? 'Banh kem dau tay tuoi ngon tai Thu Huong Cake' }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit --}}
    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg"></i> Cap nhat san pham
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Huy</a>
    </div>
</form>
@endsection
