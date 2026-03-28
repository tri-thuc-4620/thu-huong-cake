@extends('admin.layouts.app')

@section('title', 'Bai viet')

@section('content')
<div class="page-header">
    <div>
        <h4>Bai viet</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly bai viet va tin tuc</p>
    </div>
    <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them bai viet
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Danh muc</label>
        <select class="form-select form-select-sm" style="min-width:150px">
            <option value="">Tat ca danh muc</option>
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
        <span style="font-size:0.85rem"><strong>{{ $posts->total() }}</strong> bai viet</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:56px">Anh</th>
                    <th>Tieu de</th>
                    <th>Danh muc</th>
                    <th>Tac gia</th>
                    <th>Trang thai</th>
                    <th>Luot xem</th>
                    <th>Ngay dang</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        @if($post->featured_image)
                            <img src="{{ Storage::url($post->featured_image) }}" class="rounded-3" width="48" height="48" style="object-fit:cover">
                        @else
                            <img src="https://placehold.co/48x48/fff0f6/e84393?text=No" class="rounded-3" width="48" height="48" style="object-fit:cover">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.blog-posts.edit', $post) }}" style="font-weight:600;color:#0f172a;text-decoration:none">{{ $post->title }}</a>
                    </td>
                    <td>
                        @if($post->category)
                            <span class="badge badge-soft-info">{{ $post->category->name }}</span>
                        @else
                            <span class="text-muted">--</span>
                        @endif
                    </td>
                    <td class="text-muted" style="font-size:0.85rem">{{ $post->author?->name ?? '--' }}</td>
                    <td>
                        @if($post->is_published)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td class="text-muted">{{ number_format($post->views ?? 0) }}</td>
                    <td class="text-muted" style="font-size:0.8rem">{{ $post->published_at?->format('d/m/Y') ?? '—' }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.blog-posts.edit', $post) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-4">Chua co bai viet nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-3">
    {{ $posts->links('pagination::bootstrap-5') }}
</div>
@endsection
