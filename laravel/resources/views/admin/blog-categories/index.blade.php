@extends('admin.layouts.app')

@section('title', 'Danh muc blog')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh muc blog</h4>
    <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Them danh muc
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
                        <th>#</th>
                        <th>Ten</th>
                        <th>Slug</th>
                        <th>So bai viet</th>
                        <th>Hien thi</th>
                        <th>Thu tu</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Huong dan</td>
                        <td><code>huong-dan</code></td>
                        <td>12</td>
                        <td><span class="badge bg-success">Hien thi</span></td>
                        <td>1</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tin tuc</td>
                        <td><code>tin-tuc</code></td>
                        <td>8</td>
                        <td><span class="badge bg-success">Hien thi</span></td>
                        <td>2</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Cong thuc</td>
                        <td><code>cong-thuc</code></td>
                        <td>5</td>
                        <td><span class="badge bg-success">Hien thi</span></td>
                        <td>3</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Khuyen mai</td>
                        <td><code>khuyen-mai</code></td>
                        <td>3</td>
                        <td><span class="badge bg-success">Hien thi</span></td>
                        <td>4</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Su kien</td>
                        <td><code>su-kien</code></td>
                        <td>0</td>
                        <td><span class="badge bg-secondary">An</span></td>
                        <td>5</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
