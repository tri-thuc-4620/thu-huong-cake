@extends('admin.layouts.app')

@section('title', 'Gia tri thuoc tinh')

@section('content')
<div class="page-header">
    <div>
        <h4>Thuoc tinh: <span style="color:var(--pink)">{{ $attribute->name }}</span></h4>
        <nav class="breadcrumb mb-0" style="font-size:0.8rem">
            <a class="breadcrumb-item" href="{{ route('admin.attributes.index') }}">Thuoc tinh</a>
            <span class="breadcrumb-item active">{{ $attribute->name }}</span>
        </nav>
    </div>
    <a href="{{ route('admin.attributes.index') }}" class="btn btn-soft">
        <i class="bi bi-arrow-left me-1"></i> Quay lai
    </a>
</div>

<div class="row g-4">
    {{-- LEFT: Form them gia tri --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h6 class="mb-0">Them gia tri moi</h6></div>
            <div class="card-body">
                <form action="{{ route('admin.attributes.values.store', $attribute->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ten gia tri <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="VD: 16cm" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="Tu dong tao">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="2" placeholder="Mo ta gia tri nay (tuy chon)">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gia tri hien thi</label>
                        <input type="text" class="form-control @error('display_value') is-invalid @enderror" name="display_value" value="{{ old('display_value') }}" placeholder="VD: ma mau #FF5733, URL anh...">
                        <div class="form-text">Dung cho kieu Color swatches hoac Hinh anh</div>
                        @error('display_value')
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
                    <button type="submit" class="btn btn-pink w-100">
                        <i class="bi bi-plus-lg me-1"></i> Them gia tri
                    </button>
                </form>
            </div>
        </div>

        {{-- Thong tin thuoc tinh --}}
        <div class="card mt-4">
            <div class="card-header"><h6 class="mb-0">Thong tin thuoc tinh</h6></div>
            <div class="card-body">
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Ten:</span><strong>{{ $attribute->name }}</strong>
                </div>
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Slug:</span><span>{{ $attribute->slug }}</span>
                </div>
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Kieu hien thi:</span>
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
                </div>
                <div class="mb-2 d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">Loc san pham:</span>
                    @if($attribute->is_filterable)
                        <span class="text-success"><i class="bi bi-check-circle-fill"></i> Co</span>
                    @else
                        <span class="text-muted"><i class="bi bi-x-circle-fill"></i> Khong</span>
                    @endif
                </div>
                <div class="d-flex justify-content-between" style="font-size:0.85rem">
                    <span class="text-muted">So san pham su dung:</span><strong>{{ $attribute->products_count ?? 0 }}</strong>
                </div>
                <hr>
                <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-soft btn-sm w-100">
                    <i class="bi bi-pencil me-1"></i> Chinh sua thuoc tinh
                </a>
            </div>
        </div>
    </div>

    {{-- RIGHT: Danh sach gia tri --}}
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size:0.85rem"><strong>{{ $values->count() }}</strong> gia tri</span>
                <div class="d-flex gap-2">
                    <button class="btn btn-soft btn-sm"><i class="bi bi-sort-down me-1"></i> Sap xep</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:30px"><i class="bi bi-grip-vertical text-muted"></i></th>
                            <th>Ten gia tri</th>
                            <th>Slug</th>
                            <th>Mo ta</th>
                            <th>So SP</th>
                            <th>Thu tu</th>
                            <th style="width:100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($values as $value)
                        <tr>
                            <td><i class="bi bi-grip-vertical text-muted" style="cursor:grab"></i></td>
                            <td><strong>{{ $value->name }}</strong></td>
                            <td class="text-muted">{{ $value->slug }}</td>
                            <td class="text-muted" style="font-size:0.8rem">{{ $value->description ?? '—' }}</td>
                            <td><span class="badge badge-soft-pink">{{ $value->products_count ?? 0 }}</span></td>
                            <td>{{ $value->sort_order }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="action-btn edit" title="Sua nhanh" data-bs-toggle="modal" data-bs-target="#editValueModal-{{ $value->id }}"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.attributes.values.destroy', [$attribute->id, $value->id]) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa gia tri nay?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Chua co gia tri nao.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Preview --}}
        @if($values->count() > 0)
        <div class="card mt-4">
            <div class="card-header"><h6 class="mb-0"><i class="bi bi-eye me-2 text-muted"></i>Xem truoc hien thi tren web</h6></div>
            <div class="card-body">
                <label style="font-size:0.85rem;font-weight:600;margin-bottom:8px;display:block">{{ $attribute->name }}:</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($values as $index => $value)
                        <button type="button" class="btn btn-sm {{ $index === 0 ? 'btn-pink' : 'btn-outline-pink' }}" style="border-radius:8px;min-width:60px">{{ $value->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Modals sua nhanh --}}
@foreach($values as $value)
<div class="modal fade" id="editValueModal-{{ $value->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px">
            <div class="modal-header" style="border-bottom:1px solid #f1f5f9">
                <h6 class="modal-title">Sua gia tri: {{ $value->name }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.attributes.values.store', $attribute->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="value_id" value="{{ $value->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Ten gia tri</label>
                        <input type="text" class="form-control" name="name" value="{{ $value->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $value->slug }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta</label>
                        <textarea class="form-control" name="description" rows="2">{{ $value->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thu tu</label>
                        <input type="number" class="form-control" name="sort_order" value="{{ $value->sort_order }}">
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #f1f5f9">
                    <button type="button" class="btn btn-soft" data-bs-dismiss="modal">Huy</button>
                    <button type="submit" class="btn btn-pink">Luu thay doi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
