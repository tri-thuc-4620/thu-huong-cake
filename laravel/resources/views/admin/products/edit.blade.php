@use('Illuminate\Support\Facades\Storage')
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

@if($errors->any())
<div class="alert alert-danger mb-4">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $product->slug) }}">
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Danh muc <span class="text-danger">*</span></label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="">-- Chon danh muc --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="sku" class="form-label">Ma SKU</label>
                    <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku', $product->sku) }}">
                    @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        <span class="input-group-text">&#273;</span>
                    </div>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="sale_price" class="form-label">Gia khuyen mai</label>
                    <div class="input-group">
                        <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                        <span class="input-group-text">&#273;</span>
                    </div>
                    @error('sale_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="stock_quantity" class="form-label">So luong ton kho</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}">
                </div>
                <div class="col-md-6">
                    <label for="stock_status" class="form-label">Trang thai kho</label>
                    <select class="form-select" id="stock_status" name="stock_status">
                        <option value="in_stock" {{ old('stock_status', $product->stock_status) == 'in_stock' ? 'selected' : '' }}>Con hang</option>
                        <option value="low_stock" {{ old('stock_status', $product->stock_status) == 'low_stock' ? 'selected' : '' }}>Sap het hang</option>
                        <option value="out_of_stock" {{ old('stock_status', $product->stock_status) == 'out_of_stock' ? 'selected' : '' }}>Het hang</option>
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
                        @forelse($product->images as $image)
                        <div class="position-relative">
                            <img src="{{ Storage::url($image->image) }}" class="rounded border" width="120" height="120" style="object-fit:cover">
                            <label class="btn btn-sm btn-danger position-absolute top-0 end-0" style="margin:-5px -5px 0 0;padding:0 4px;">
                                <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" hidden>
                                <i class="bi bi-x"></i>
                            </label>
                            @if($image->is_primary)
                                <span class="badge bg-pink position-absolute bottom-0 start-0" style="margin:0 0 2px 2px;font-size:0.6rem">Chinh</span>
                            @endif
                        </div>
                        @empty
                        <p class="text-muted" style="font-size:0.85rem">Chua co hinh anh nao</p>
                        @endforelse
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
                <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mo ta chi tiet</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6">{{ old('description', $product->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" {{ old('is_visible', $product->is_visible) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_visible">Hien thi san pham</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">San pham noi bat</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_hot" name="is_hot" value="1" {{ old('is_hot', $product->is_hot) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_hot">San pham Hot</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_new" name="is_new" value="1" {{ old('is_new', $product->is_new) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_new">San pham Moi</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thu tu hien thi</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $product->sort_order) }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}">
                </div>
                <div class="col-md-6">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
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
