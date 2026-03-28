@extends('admin.layouts.app')

@section('title', 'Dia diem cua hang')

@section('content')
<div class="page-header">
    <div>
        <h4>Dia diem cua hang</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly cac chi nhanh cua hang</p>
    </div>
    <a href="{{ route('admin.store-locations.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them cua hang
    </a>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Thanh pho</label>
        <select class="form-select form-select-sm" style="min-width:140px">
            <option value="">Tat ca</option>
            <option>Ha Noi</option>
            <option>TP HCM</option>
        </select>
    </div>
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
        <span style="font-size:0.85rem"><strong>{{ $locations->total() }}</strong> cua hang</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th>Ten</th>
                    <th>Dia chi</th>
                    <th>Thanh pho</th>
                    <th>SDT</th>
                    <th>Hoat dong</th>
                    <th>Thu tu</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($locations as $location)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">{{ $location->name }}</td>
                    <td class="text-muted" style="font-size:0.85rem">{{ $location->address }}</td>
                    <td>
                        @if($location->city)
                            <span class="badge badge-soft-info">{{ $location->city }}</span>
                        @else
                            <span class="text-muted">--</span>
                        @endif
                    </td>
                    <td class="text-muted" style="font-size:0.85rem">{{ $location->phone ?? '--' }}</td>
                    <td>
                        @if($location->is_active)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <i class="bi bi-x-circle-fill text-muted"></i>
                        @endif
                    </td>
                    <td class="text-muted">{{ $location->sort_order }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.store-locations.edit', $location) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.store-locations.destroy', $location) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">Chua co cua hang nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-3">
    {{ $locations->links('pagination::bootstrap-5') }}
</div>
@endsection
