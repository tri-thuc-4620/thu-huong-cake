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
                    <tr>
                        <td>Nguyen Thi F</td>
                        <td>0912 111 222</td>
                        <td>Muon hoi ve banh cuoi</td>
                        <td><span class="badge bg-success">Da xu ly</span></td>
                        <td>27/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.callback-requests.show', 1) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.callback-requests.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tran Van G</td>
                        <td>0987 333 444</td>
                        <td>Can tu van dat tiec</td>
                        <td><span class="badge bg-warning text-dark">Chua xu ly</span></td>
                        <td>26/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.callback-requests.show', 2) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.callback-requests.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Le Thi H</td>
                        <td>0901 555 666</td>
                        <td>Hoi gia banh sinh nhat</td>
                        <td><span class="badge bg-warning text-dark">Chua xu ly</span></td>
                        <td>25/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.callback-requests.show', 3) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.callback-requests.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
