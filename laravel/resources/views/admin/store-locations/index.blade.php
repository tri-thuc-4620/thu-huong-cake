@extends('admin.layouts.app')

@section('title', 'Dia diem cua hang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Dia diem cua hang</h4>
    <a href="{{ route('admin.store-locations.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Them cua hang
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
                        <th>Ten</th>
                        <th>Dia chi</th>
                        <th>Thanh pho</th>
                        <th>SDT</th>
                        <th>Hoat dong</th>
                        <th>Thu tu</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Thu Huong - Doi Can</td>
                        <td>15 Doi Can, Ba Dinh</td>
                        <td>Ha Noi</td>
                        <td>0243 123 4567</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td>1</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Thu Huong - Tay Ho</td>
                        <td>25 Xuan Dieu, Tay Ho</td>
                        <td>Ha Noi</td>
                        <td>0243 234 5678</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td>2</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Thu Huong - Quan 1</td>
                        <td>100 Nguyen Hue, Quan 1</td>
                        <td>TP HCM</td>
                        <td>0283 345 6789</td>
                        <td><span class="badge bg-secondary">Tam tat</span></td>
                        <td>3</td>
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
