@extends('admin.layouts.app')

@section('title', 'Chinh sua danh muc')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chinh sua danh muc</h4>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.categories.update', $category->id ?? 1) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <div class="col-lg-8">
            {{-- Thong tin co ban --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-info-circle"></i> Thong tin co ban</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Ten danh muc <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? 'Banh kem' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug ?? 'banh-kem' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="parent_id" class="form-label">Danh muc cha</label>
                            <select class="form-select" id="parent_id" name="parent_id">
                                <option value="">-- Khong co (danh muc goc) --</option>
                                <option value="1">Banh kem</option>
                                <option value="2">Banh mi</option>
                                <option value="3">Banh ngot</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="sort_order" class="form-label">Thu tu hien thi</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ $category->sort_order ?? 1 }}">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Mo ta</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description ?? 'Cac loai banh kem tuoi ngon, nhieu mau ma' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Hinh anh hien tai</label>
                            <div class="mb-2">
                                <img src="https://placehold.co/120x120/FFE4E1/333?text=BK" class="rounded border" width="120" height="120">
                            </div>
                            <label for="image" class="form-label">Thay doi hinh anh</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <div class="form-text">Dinh dang: JPG, PNG, WebP. Toi da 2MB.</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEO --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-search"></i> SEO</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $category->meta_title ?? 'Banh kem - Thu Huong Cake' }}">
                        </div>
                        <div class="col-12">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ $category->meta_description ?? 'Cac loai banh kem tuoi ngon tai Thu Huong Cake' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            {{-- Hien thi --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-eye"></i> Hien thi</h6>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" checked>
                        <label class="form-check-label" for="is_visible">Hien thi danh muc</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="show_in_menu" name="show_in_menu" value="1" checked>
                        <label class="form-check-label" for="show_in_menu">Hien thi trong menu</label>
                    </div>
                </div>
            </div>

            {{-- Thong tin --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-clock-history"></i> Thong tin</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">So san pham</span>
                        <span class="small">45</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Ngay tao</span>
                        <span class="small">15/01/2026</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Cap nhat</span>
                        <span class="small">20/03/2026</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit --}}
    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg"></i> Cap nhat danh muc
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Huy</a>
    </div>
</form>
@endsection
