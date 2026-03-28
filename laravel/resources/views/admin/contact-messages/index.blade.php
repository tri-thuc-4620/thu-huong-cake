@extends('admin.layouts.app')

@section('title', 'Tin nhan lien he')

@section('content')
<div class="page-header">
    <div>
        <h4>Tin nhan lien he</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly tin nhan tu khach hang</p>
    </div>
</div>

{{-- Filter Bar --}}
<div class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" style="min-width:130px">
            <option value="">Tat ca</option>
            <option>Da doc</option>
            <option>Chua doc</option>
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
        <span style="font-size:0.85rem"><strong>{{ $messages->total() }}</strong> tin nhan</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th>Ten</th>
                    <th>SDT</th>
                    <th>Email</th>
                    <th>Noi dung</th>
                    <th>Trang thai</th>
                    <th>Ngay gui</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td style="font-weight:600;color:#0f172a">{{ $msg->name }}</td>
                    <td class="text-muted" style="font-size:0.85rem">{{ $msg->phone ?? '--' }}</td>
                    <td class="text-muted" style="font-size:0.85rem">{{ $msg->email ?? '--' }}</td>
                    <td class="text-muted" style="font-size:0.85rem">{{ Str::limit($msg->content, 40) }}</td>
                    <td>
                        @if($msg->is_read)
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                            <span class="badge badge-soft-warning">Chua doc</span>
                        @endif
                    </td>
                    <td class="text-muted" style="font-size:0.8rem">{{ $msg->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.contact-messages.show', $msg) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.contact-messages.edit', $msg) }}" class="action-btn edit" title="Tra loi"><i class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">Chua co tin nhan nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-3">
    {{ $messages->links('pagination::bootstrap-5') }}
</div>
@endsection
