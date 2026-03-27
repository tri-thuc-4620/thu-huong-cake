@extends('admin.layouts.app')

@section('title', 'Bai viet')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Bai viet</h4>
    <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg"></i> Them bai viet
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
                        <th style="width:60px">Anh</th>
                        <th>Tieu de</th>
                        <th>Danh muc</th>
                        <th>Tac gia</th>
                        <th>Da dang</th>
                        <th>Luot xem</th>
                        <th>Ngay dang</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://placehold.co/50x50" class="rounded" alt=""></td>
                        <td>Cach chon banh sinh nhat dep</td>
                        <td>Huong dan</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Da dang</span></td>
                        <td>1,250</td>
                        <td>20/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.blog-posts.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/50x50" class="rounded" alt=""></td>
                        <td>Xu huong banh kem 2026</td>
                        <td>Tin tuc</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Da dang</span></td>
                        <td>980</td>
                        <td>18/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.blog-posts.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/50x50" class="rounded" alt=""></td>
                        <td>Bao quan banh kem dung cach</td>
                        <td>Huong dan</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Da dang</span></td>
                        <td>750</td>
                        <td>15/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.blog-posts.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/50x50" class="rounded" alt=""></td>
                        <td>Khai truong chi nhanh moi tai Quan 7</td>
                        <td>Tin tuc</td>
                        <td>Admin</td>
                        <td><span class="badge bg-secondary">Nhap</span></td>
                        <td>0</td>
                        <td>--</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.blog-posts.edit', 4) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/50x50" class="rounded" alt=""></td>
                        <td>Cong thuc lam banh bong lan tai nha</td>
                        <td>Cong thuc</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Da dang</span></td>
                        <td>2,100</td>
                        <td>10/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.blog-posts.edit', 5) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
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
