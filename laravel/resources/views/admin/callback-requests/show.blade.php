@extends('admin.layouts.app')

@section('title', 'Chi tiet yeu cau goi lai')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chi tiet yeu cau goi lai</h4>
    <a href="{{ route('admin.callback-requests.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <!-- Thong tin -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Thong tin</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width:120px" class="text-muted">Ho ten</th>
                        <td>{{ $callbackRequest->name ?? 'Nguyen Thi F' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">SDT</th>
                        <td>{{ $callbackRequest->phone ?? '0912 111 222' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Ghi chu</th>
                        <td>{{ $callbackRequest->note ?? 'Muon hoi ve banh cuoi' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <!-- Trang thai -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Trang thai</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width:120px" class="text-muted">Da xu ly</th>
                        <td>
                            @if(($callbackRequest->is_handled ?? true))
                                <span class="badge bg-success">Da xu ly</span>
                            @else
                                <span class="badge bg-warning text-dark">Chua xu ly</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Xu ly luc</th>
                        <td>{{ $callbackRequest->handled_at ?? '27/03/2026 14:00' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
