@extends('admin.layouts.app')

@section('title', 'Slider trang chu')

@section('content')
<div class="page-header">
    <div>
        <h4>Slider trang chu</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly slider anh trang chu</p>
    </div>
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them slider
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Hoat dong</option>
            <option>Tam tat</option>
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
        <span style="font-size:0.85rem"><strong>{{ $slides->total() }}</strong> slider</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th style="width:100px">Anh</th>
                    <th>Badge</th>
                    <th>Tieu de</th>
                    <th>Hoat dong</th>
                    <th>Thu tu</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($slides as $slide)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        @if($slide->image)
                            <img src="{{ Storage::url($slide->image) }}" class="rounded-3" style="width:80px;height:45px;object-fit:cover">
                        @else
                            <img src="https://placehold.co/80x45/fff0f6/e84393?text=No" class="rounded-3" style="width:80px;height:45px;object-fit:cover">
                        @endif
                    </td>
                    <td>
                        @if($slide->badge_text)
                            <span class="badge badge-soft-success">{{ $slide->badge_text }}</span>
                        @else
                            <span class="text-muted">--</span>
                        @endif
                    </td>
                    <td style="font-weight:600;color:#0f172a">{{ $slide->title_line_1 }} {{ $slide->title_line_2 }}</td>
                    <td>
                        @if($slide->is_active)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td class="text-muted">{{ $slide->sort_order }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Chua co slider nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-3">
    {{ $slides->links('pagination::bootstrap-5') }}
</div>
@endsection
