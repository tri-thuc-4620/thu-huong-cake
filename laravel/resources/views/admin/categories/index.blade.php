@extends('admin.layouts.app')

@section('title', 'Danh muc')

@section('content')
<div class="page-header">
    <div>
        <h4>Danh muc</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly danh muc san pham</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them danh muc
    </a>
</div>

{{-- Filter Bar --}}
<form method="GET" action="{{ route('admin.categories.index') }}" class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Hien thi</label>
        <select class="form-select form-select-sm" name="is_visible" style="min-width:130px">
            <option value="">Tat ca</option>
            <option value="1" {{ request('is_visible') === '1' ? 'selected' : '' }}>Hien thi</option>
            <option value="0" {{ request('is_visible') === '0' ? 'selected' : '' }}>An</option>
        </select>
    </div>
    <div>
        <label class="form-label">Hien menu</label>
        <select class="form-select form-select-sm" name="show_in_menu" style="min-width:130px">
            <option value="">Tat ca</option>
            <option value="1" {{ request('show_in_menu') === '1' ? 'selected' : '' }}>Co</option>
            <option value="0" {{ request('show_in_menu') === '0' ? 'selected' : '' }}>Khong</option>
        </select>
    </div>
    <button type="submit" class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</a>
</form>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>{{ $categories->total() }}</strong> danh muc</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:56px">Anh</th>
                    <th>Ten</th>
                    <th>Slug</th>
                    <th>Danh muc cha</th>
                    <th>So SP</th>
                    <th>Hien thi</th>
                    <th>Menu</th>
                    <th>Trang chu</th>
                    <th>Thu tu</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" class="rounded-3" width="48" height="48" style="object-fit:cover">
                        @else
                            <img src="https://placehold.co/48x48/f1f5f9/94a3b8?text={{ mb_substr($category->name, 0, 2) }}" class="rounded-3" width="48" height="48" style="object-fit:cover">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" style="font-weight:600;color:#0f172a;text-decoration:none">
                            @if($category->parent_id)
                                <i class="bi bi-arrow-return-right text-muted me-1" style="font-size:0.8rem"></i>
                            @endif
                            {{ $category->name }}
                        </a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">{{ $category->slug }}</span></td>
                    <td>
                        @if($category->parent)
                            <span class="badge badge-soft-pink">{{ $category->parent->name }}</span>
                        @else
                            <span class="text-muted">&mdash;</span>
                        @endif
                    </td>
                    <td>{{ $category->products_count }}</td>
                    <td>
                        @if($category->is_visible)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td>
                        @if($category->show_in_menu)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td>
                        @if($category->show_on_home)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td class="text-muted">{{ $category->sort_order }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa danh muc nay?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-muted py-4">Chua co danh muc nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>{{ $categories->firstItem() ?? 0 }}-{{ $categories->lastItem() ?? 0 }}</strong> / <strong>{{ $categories->total() }}</strong> danh muc</span>
    {{ $categories->links('pagination::bootstrap-5') }}
</div>
@endsection
