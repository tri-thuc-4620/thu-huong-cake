@extends('admin.layouts.app')

@section('title', 'Trang tinh')

@section('content')
<div class="page-header">
    <div>
        <h4>Trang tinh</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly trang gioi thieu, chinh sach, huong dan</p>
    </div>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them trang
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Layout</label>
        <select class="form-select form-select-sm" style="min-width:140px">
            <option value="">Tat ca</option>
            <option>Mac dinh</option>
            <option>Co sidebar</option>
            <option>Toan trang</option>
        </select>
    </div>
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Da dang</option>
            <option>Nhap</option>
        </select>
    </div>
    <button class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
    <button class="btn btn-soft btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Xoa loc</button>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>{{ $pages->total() }}</strong> trang tinh</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th>Tieu de</th>
                    <th>Slug</th>
                    <th>Layout</th>
                    <th>Da dang</th>
                    <th>Ngay cap nhat</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page) }}" style="font-weight:600;color:#0f172a;text-decoration:none">{{ $page->title }}</a>
                    </td>
                    <td><span class="text-muted" style="font-size:0.8rem">{{ $page->slug }}</span></td>
                    <td><span class="badge badge-soft-info">{{ $page->layout ?? 'default' }}</span></td>
                    <td>
                        @if($page->is_published)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td class="text-muted" style="font-size:0.8rem">{{ $page->updated_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Chua co trang nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-3">
    {{ $pages->links('pagination::bootstrap-5') }}
</div>
@endsection
