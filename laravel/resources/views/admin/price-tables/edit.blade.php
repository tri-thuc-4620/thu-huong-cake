@extends('admin.layouts.app')

@section('title', 'Sua bang gia')

@section('content')
<div class="page-header">
    <div>
        <h4>Sua bang gia: Banh kem dau tay Premium</h4>
    </div>
    <a href="{{ route('admin.price-tables.index') }}" class="btn btn-soft">
        <i class="bi bi-arrow-left me-1"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.price-tables.update', 1) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Ma tran gia: Kich thuoc x Cot banh</h6>
            <button type="button" class="btn btn-soft btn-sm"><i class="bi bi-calculator me-1"></i> Tu dong tinh lai</button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" style="font-size:0.85rem">
                    <thead>
                        <tr style="background:#fff0f6">
                            <th style="background:#fdf2f8"></th>
                            <th class="text-center">Gato Vani</th>
                            <th class="text-center">Red Velvet</th>
                            <th class="text-center">Socola</th>
                            <th class="text-center">Matcha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">14cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="250000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="280000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="270000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="290000"></td>
                        </tr>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">16cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="350000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="380000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="370000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="390000"></td>
                        </tr>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">18cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="450000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="480000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="470000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="490000"></td>
                        </tr>
                        <tr>
                            <td style="background:#fdf2f8;font-weight:600">20cm</td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="550000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="580000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="570000"></td>
                            <td><input type="text" class="form-control form-control-sm text-center" value="590000"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-pink"><i class="bi bi-check-lg me-1"></i> Luu thay doi</button>
        <a href="{{ route('admin.price-tables.index') }}" class="btn btn-soft">Huy</a>
    </div>
</form>
@endsection
