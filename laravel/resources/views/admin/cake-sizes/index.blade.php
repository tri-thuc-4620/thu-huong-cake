@extends('admin.layouts.app')

@section('title', 'Kich thuoc banh')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Kich thuoc banh</h4>
    <a href="{{ route('admin.cake-sizes.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Them kich thuoc
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
                        <td>Size 16cm</td>
                        <td>Banh nho, 2-4 nguoi an</td>
                        <td>1</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Size 20cm</td>
                        <td>Banh vua, 4-6 nguoi an</td>
                        <td>2</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Size 24cm</td>
                        <td>Banh lon, 8-10 nguoi an</td>
                        <td>3</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Size 28cm</td>
                        <td>Banh rat lon, 12-15 nguoi an</td>
                        <td>4</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Size 32cm</td>
                        <td>Banh dac biet, 15-20 nguoi an</td>
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
