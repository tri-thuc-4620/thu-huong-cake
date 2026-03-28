@extends('admin.layouts.app')

@section('title', 'Thuoc tinh san pham')

@section('content')
<div class="page-header">
    <div>
        <h4>Thuoc tinh san pham</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly thuoc tinh va gia tri (Kich thuoc, Cot banh, Mau sac...)</p>
    </div>
</div>

<div class="row g-4">
    {{-- LEFT: Form them thuoc tinh --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h6 class="mb-0">Them thuoc tinh moi</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.attributes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ten thuoc tinh <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="VD: Kich thuoc" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="Tu dong tao tu ten">
                        <div class="form-text">Dung trong URL va he thong</div>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kieu hien thi</label>
                        <select class="form-select @error('display_type') is-invalid @enderror" name="display_type">
                            <option value="select" {{ old('display_type') == 'select' ? 'selected' : '' }}>Dropdown (Select)</option>
                            <option value="button" {{ old('display_type') == 'button' ? 'selected' : '' }}>Nut bam (Buttons)</option>
                            <option value="color" {{ old('display_type') == 'color' ? 'selected' : '' }}>Mau sac (Color swatches)</option>
                            <option value="image" {{ old('display_type') == 'image' ? 'selected' : '' }}>Hinh anh</option>
                        </select>
                        @error('display_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thu tu</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" value="{{ old('sort_order', 0) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="isFilterable" name="is_filterable" {{ old('is_filterable', '1') ? 'checked' : '' }}>
                        <label class="form-check-label" for="isFilterable" style="font-size:0.85rem">Cho phep loc tren trang san pham</label>
                    </div>
                    <button type="submit" class="btn btn-pink w-100">
                        <i class="bi bi-plus-lg me-1"></i> Them thuoc tinh
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- RIGHT: Danh sach thuoc tinh --}}
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size:0.85rem"><strong>{{ $attributes->count() }}</strong> thuoc tinh</span>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ten thuoc tinh</th>
                            <th>Slug</th>
                            <th>Kieu hien thi</th>
                            <th>So gia tri</th>
                            <th>Thu tu</th>
                            <th style="width:140px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attributes as $attribute)
                        <tr>
                            <td>
                                <a href="{{ route('admin.attributes.values', $attribute->id) }}" style="font-weight:600;color:#0f172a;text-decoration:none">{{ $attribute->name }}</a>
                            </td>
                            <td class="text-muted">{{ $attribute->slug }}</td>
                            <td>
                                @php
                                    $badgeClass = match($attribute->display_type) {
                                        'button' => 'badge-soft-info',
                                        'color' => 'badge-soft-success',
                                        'image' => 'badge-soft-primary',
                                        default => 'badge-soft-warning',
                                    };
                                    $badgeLabel = match($attribute->display_type) {
                                        'button' => 'Nut bam',
                                        'color' => 'Mau sac',
                                        'image' => 'Hinh anh',
                                        default => 'Dropdown',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $badgeLabel }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.attributes.values', $attribute->id) }}" style="color:var(--pink);text-decoration:none;font-weight:500">{{ $attribute->values_count }} gia tri</a>
                            </td>
                            <td>{{ $attribute->sort_order }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.attributes.values', $attribute->id) }}" class="action-btn view" title="Quan ly gia tri"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa thuoc tinh nay?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Chua co thuoc tinh nao.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
