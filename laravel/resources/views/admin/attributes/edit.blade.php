@extends('admin.layouts.app')

@section('title', 'Sua thuoc tinh')

@section('content')
<div class="page-header">
    <div>
        <h4>Sua thuoc tinh</h4>
        <nav class="breadcrumb mb-0" style="font-size:0.8rem">
            <a class="breadcrumb-item" href="{{ route('admin.attributes.index') }}">Thuoc tinh</a>
            <span class="breadcrumb-item active">Kich thuoc</span>
        </nav>
    </div>
    <a href="{{ route('admin.attributes.index') }}" class="btn btn-soft">
        <i class="bi bi-arrow-left me-1"></i> Quay lai
    </a>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.attributes.update', 1) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Ten thuoc tinh <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="Kich thuoc" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="kich-thuoc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kieu hien thi</label>
                        <select class="form-select" name="display_type">
                            <option value="select">Dropdown (Select)</option>
                            <option value="button" selected>Nut bam (Buttons)</option>
                            <option value="color">Mau sac (Color swatches)</option>
                            <option value="image">Hinh anh</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thu tu</label>
                        <input type="number" class="form-control" name="sort_order" value="0">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="isFilterable" name="is_filterable" checked>
                        <label class="form-check-label" for="isFilterable">Cho phep loc tren trang san pham</label>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-pink">Luu thay doi</button>
                        <a href="{{ route('admin.attributes.index') }}" class="btn btn-soft">Huy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
