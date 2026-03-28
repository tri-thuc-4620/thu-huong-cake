@extends('admin.layouts.app')

@section('title', 'Yeu cau goi lai')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Yeu cau goi lai</h4>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Ten</th>
                        <th>SDT</th>
                        <th>Ghi chu</th>
                        <th>Da xu ly</th>
                        <th>Ngay gui</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $cbRequest)
                    <tr>
                        <td>{{ $cbRequest->name }}</td>
                        <td>{{ $cbRequest->phone }}</td>
                        <td>{{ Str::limit($cbRequest->note, 40) }}</td>
                        <td>
                            @if($cbRequest->is_handled)
                                <span class="badge bg-success">Da xu ly</span>
                            @else
                                <span class="badge bg-warning text-dark">Chua xu ly</span>
                            @endif
                        </td>
                        <td>{{ $cbRequest->created_at->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.callback-requests.show', $cbRequest) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.callback-requests.edit', $cbRequest) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Chua co yeu cau nao.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $requests->links('pagination::bootstrap-5') }}
</div>
@endsection
