@extends('admin.layouts.app')

@section('title', 'Don hang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Don hang</h4>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tao don hang
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Filter bar -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="#">
            <div class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="form-label">Trang thai</label>
                    <select class="form-select form-select-sm" name="status">
                        <option value="">Tat ca</option>
                        <option value="pending">Cho xac nhan</option>
                        <option value="confirmed">Da xac nhan</option>
                        <option value="processing">Dang lam banh</option>
                        <option value="shipping">Dang giao hang</option>
                        <option value="completed">Hoan thanh</option>
                        <option value="cancelled">Da huy</option>
                        <option value="refunded">Hoan tien</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Hinh thuc giao</label>
                    <select class="form-select form-select-sm" name="delivery_type">
                        <option value="">Tat ca</option>
                        <option value="delivery">Giao hang</option>
                        <option value="pickup">Nhan tai cua hang</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Thanh toan</label>
                    <select class="form-select form-select-sm" name="payment_method">
                        <option value="">Tat ca</option>
                        <option value="cod">Tien mat (COD)</option>
                        <option value="bank_transfer">Chuyen khoan</option>
                        <option value="momo">MoMo</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Tu ngay</label>
                    <input type="date" class="form-control form-control-sm" name="from_date">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Den ngay</label>
                    <input type="date" class="form-control form-control-sm" name="to_date">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm btn-primary w-100">
                        <i class="bi bi-funnel"></i> Loc
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Orders table -->
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Ma don</th>
                        <th>Khach hang</th>
                        <th>SDT</th>
                        <th>Tong tien</th>
                        <th>Trang thai</th>
                        <th>Hinh thuc</th>
                        <th>Thanh toan</th>
                        <th>Ngay nhan</th>
                        <th>Ngay dat</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#DH001</strong></td>
                        <td>Nguyen Van A</td>
                        <td>0901234567</td>
                        <td>450,000d</td>
                        <td><span class="badge bg-warning text-dark">Cho xac nhan</span></td>
                        <td>Giao hang</td>
                        <td>COD</td>
                        <td>28/03/2026</td>
                        <td>27/03/2026</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Xac nhan</a></li>
                                    <li><a class="dropdown-item" href="#">Lam banh</a></li>
                                    <li><a class="dropdown-item" href="#">Giao hang</a></li>
                                    <li><a class="dropdown-item" href="#">Hoan thanh</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#">Huy don</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#DH002</strong></td>
                        <td>Tran Thi B</td>
                        <td>0912345678</td>
                        <td>680,000d</td>
                        <td><span class="badge bg-primary">Da xac nhan</span></td>
                        <td>Giao hang</td>
                        <td>Chuyen khoan</td>
                        <td>29/03/2026</td>
                        <td>26/03/2026</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Xac nhan</a></li>
                                    <li><a class="dropdown-item" href="#">Lam banh</a></li>
                                    <li><a class="dropdown-item" href="#">Giao hang</a></li>
                                    <li><a class="dropdown-item" href="#">Hoan thanh</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#">Huy don</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#DH003</strong></td>
                        <td>Le Van C</td>
                        <td>0923456789</td>
                        <td>350,000d</td>
                        <td><span class="badge bg-info text-dark">Dang lam banh</span></td>
                        <td>Nhan tai cua hang</td>
                        <td>MoMo</td>
                        <td>28/03/2026</td>
                        <td>25/03/2026</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Xac nhan</a></li>
                                    <li><a class="dropdown-item" href="#">Lam banh</a></li>
                                    <li><a class="dropdown-item" href="#">Giao hang</a></li>
                                    <li><a class="dropdown-item" href="#">Hoan thanh</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#">Huy don</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#DH004</strong></td>
                        <td>Pham Thi D</td>
                        <td>0934567890</td>
                        <td>1,200,000d</td>
                        <td><span class="badge bg-success">Hoan thanh</span></td>
                        <td>Giao hang</td>
                        <td>Chuyen khoan</td>
                        <td>24/03/2026</td>
                        <td>22/03/2026</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Xac nhan</a></li>
                                    <li><a class="dropdown-item" href="#">Lam banh</a></li>
                                    <li><a class="dropdown-item" href="#">Giao hang</a></li>
                                    <li><a class="dropdown-item" href="#">Hoan thanh</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#">Huy don</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#DH005</strong></td>
                        <td>Hoang Van E</td>
                        <td>0945678901</td>
                        <td>520,000d</td>
                        <td><span class="badge bg-danger">Da huy</span></td>
                        <td>Giao hang</td>
                        <td>COD</td>
                        <td>27/03/2026</td>
                        <td>25/03/2026</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Xac nhan</a></li>
                                    <li><a class="dropdown-item" href="#">Lam banh</a></li>
                                    <li><a class="dropdown-item" href="#">Giao hang</a></li>
                                    <li><a class="dropdown-item" href="#">Hoan thanh</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#">Huy don</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
