@use('Illuminate\Support\Facades\Storage')
@extends('admin.layouts.app')

@section('title', 'San pham')

@section('content')
<div class="page-header">
    <div>
        <h4>San pham</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly tat ca san pham cua hang</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them san pham
    </a>
</div>

{{-- Filter Bar --}}
<form method="GET" action="{{ route('admin.products.index') }}" class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Danh muc</label>
        <select class="form-select form-select-sm" name="category_id" style="min-width:160px">
            <option value="">Tat ca danh muc</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" name="is_visible" style="min-width:130px">
            <option value="">Tat ca</option>
            <option value="1" {{ request('is_visible') === '1' ? 'selected' : '' }}>Hien thi</option>
            <option value="0" {{ request('is_visible') === '0' ? 'selected' : '' }}>An</option>
        </select>
    </div>
    <div>
        <label class="form-label">Hot</label>
        <select class="form-select form-select-sm" name="is_hot" style="min-width:110px">
            <option value="">Tat ca</option>
            <option value="1" {{ request('is_hot') === '1' ? 'selected' : '' }}>Co</option>
            <option value="0" {{ request('is_hot') === '0' ? 'selected' : '' }}>Khong</option>
        </select>
    </div>
    <div>
        <label class="form-label">Kho hang</label>
        <select class="form-select form-select-sm" name="stock_status" style="min-width:130px">
            <option value="">Tat ca</option>
            <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>Con banh</option>
            <option value="out_of_stock" {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Het banh</option>
            <option value="pre_order" {{ request('stock_status') == 'pre_order' ? 'selected' : '' }}>Dat truoc</option>
        </select>
    </div>
    <button type="submit" class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</a>
</form>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>{{ $products->total() }}</strong> san pham</span>
        <div class="d-flex gap-2">
            <button class="btn btn-soft btn-sm"><i class="bi bi-download me-1"></i> Xuat Excel</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:56px">Anh</th>
                    <th>Ten san pham</th>
                    <th>Danh muc</th>
                    <th>Gia</th>
                    <th>Gia KM</th>
                    <th>Hien thi</th>
                    <th>Hot</th>
                    <th>Kho</th>
                    <th>Luot xem</th>
                    <th>Ngay tao</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td><input type="checkbox" class="form-check-input" value="{{ $product->id }}"></td>
                    <td>
                        @if($product->primaryImage)
                            <img src="{{ Storage::url($product->primaryImage->image) }}" class="rounded-3" width="48" height="48" style="object-fit:cover">
                        @else
                            <img src="https://placehold.co/48x48/fff0f6/e84393?text=🎂" class="rounded-3" width="48" height="48" style="object-fit:cover">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" style="font-weight:600;color:#0f172a;text-decoration:none">{{ $product->name }}</a>
                        @if($product->sku)
                            <div class="text-muted" style="font-size:0.75rem">SKU: {{ $product->sku }}</div>
                        @endif
                    </td>
                    <td><span class="badge badge-soft-pink">{{ $product->category?->name ?? '—' }}</span></td>
                    <td style="font-weight:500">{{ number_format($product->price) }} &#273;</td>
                    <td>
                        @if($product->sale_price)
                            <span style="font-weight:500;color:var(--pink)">{{ number_format($product->sale_price) }} &#273;</span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if($product->is_visible)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td>
                        @if($product->is_hot)
                            <span class="badge badge-soft-danger">Hot</span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @switch($product->stock_status)
                            @case('in_stock')
                                <span class="badge badge-soft-success">Con banh</span>
                                @break
                            @case('out_of_stock')
                                <span class="badge badge-soft-danger">Het banh</span>
                                @break
                            @case('pre_order')
                                <span class="badge badge-soft-info">Dat truoc</span>
                                @break
                            @case('low_stock')
                                <span class="badge badge-soft-warning">Sap het</span>
                                @break
                            @default
                                <span class="badge badge-soft-secondary">{{ $product->stock_status }}</span>
                        @endswitch
                    </td>
                    <td class="text-muted">{{ number_format($product->views ?? 0) }}</td>
                    <td class="text-muted" style="font-size:0.8rem">{{ $product->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.products.show', $product->id) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa san pham nay?')" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center text-muted py-4">Chua co san pham nao</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($products->hasPages())
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>{{ $products->firstItem() }}-{{ $products->lastItem() }}</strong> / <strong>{{ $products->total() }}</strong> san pham</span>
    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
</div>
@endif
@endsection
