@extends('admin.layouts.app')

@section('title', 'Danh muc')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh muc</h4>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg"></i> Them danh muc
    </a>
</div>

{{-- Categories Table --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px">Anh</th>
                        <th>Ten</th>
                        <th>Slug</th>
                        <th>Danh muc cha</th>
                        <th>So SP</th>
                        <th>Hien thi</th>
                        <th>Menu</th>
                        <th>Thu tu</th>
                        <th style="width:120px">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://placehold.co/40x40/FFE4E1/333?text=BK" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh kem</strong></td>
                        <td><code>banh-kem</code></td>
                        <td class="text-muted">-</td>
                        <td>45</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-success">Co</span></td>
                        <td>1</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categories.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/40x40/E8F5E9/333?text=BM" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh mi</strong></td>
                        <td><code>banh-mi</code></td>
                        <td class="text-muted">-</td>
                        <td>28</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-success">Co</span></td>
                        <td>2</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categories.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/40x40/FFF3E0/333?text=BN" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh ngot</strong></td>
                        <td><code>banh-ngot</code></td>
                        <td class="text-muted">-</td>
                        <td>35</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-success">Co</span></td>
                        <td>3</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categories.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/40x40/E3F2FD/333?text=BM" class="rounded" width="40" height="40"></td>
                        <td class="ps-4"><i class="bi bi-arrow-return-right text-muted"></i> <strong>Banh man</strong></td>
                        <td><code>banh-man</code></td>
                        <td>Banh ngot</td>
                        <td>12</td>
                        <td><span class="badge bg-success">Hien</span></td>
                        <td><span class="badge bg-secondary">Khong</span></td>
                        <td>1</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categories.edit', 4) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/40x40/F3E5F5/333?text=BT" class="rounded" width="40" height="40"></td>
                        <td><strong>Banh trang tri</strong></td>
                        <td><code>banh-trang-tri</code></td>
                        <td class="text-muted">-</td>
                        <td>36</td>
                        <td><span class="badge bg-secondary">An</span></td>
                        <td><span class="badge bg-secondary">Khong</span></td>
                        <td>4</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categories.edit', 5) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
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
