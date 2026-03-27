@extends('admin.layouts.app')

@section('title', 'Cot banh')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Cot banh</h4>
    <a href="{{ route('admin.cake-bases.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Them cot banh
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
                        <th>Mo ta</th>
                        <th>Thu tu</th>
                        <th>Trang thai</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bong lan trung</td>
                        <td>Cot banh bong lan truyen thong</td>
                        <td>1</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bong lan socola</td>
                        <td>Cot banh bong lan vi socola</td>
                        <td>2</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bong lan matcha</td>
                        <td>Cot banh vi tra xanh Nhat Ban</td>
                        <td>3</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bong lan red velvet</td>
                        <td>Cot banh red velvet dac trung</td>
                        <td>4</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Bong lan pho mai</td>
                        <td>Cot banh pho mai beo ngay</td>
                        <td>5</td>
                        <td><span class="badge bg-secondary">Tam tat</span></td>
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
