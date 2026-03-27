@extends('admin.layouts.app')

@section('title', 'Trang tinh')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Trang tinh</h4>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg"></i> Them trang
    </a>
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
                        <th>Tieu de</th>
                        <th>Slug</th>
                        <th>Layout</th>
                        <th>Da dang</th>
                        <th>Ngay cap nhat</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Gioi thieu</td>
                        <td><code>gioi-thieu</code></td>
                        <td>Mac dinh</td>
                        <td><span class="badge bg-success">Da dang</span></td>
                        <td>25/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.pages.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Chinh sach bao hanh</td>
                        <td><code>chinh-sach-bao-hanh</code></td>
                        <td>Co sidebar</td>
                        <td><span class="badge bg-success">Da dang</span></td>
                        <td>20/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.pages.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Huong dan dat hang</td>
                        <td><code>huong-dan-dat-hang</code></td>
                        <td>Toan trang</td>
                        <td><span class="badge bg-secondary">Nhap</span></td>
                        <td>18/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.pages.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
