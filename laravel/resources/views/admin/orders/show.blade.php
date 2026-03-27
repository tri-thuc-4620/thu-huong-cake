@extends('admin.layouts.app')

@section('title', 'Chi tiet don hang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chi tiet don hang <strong>#DH001</strong></h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<!-- Action buttons -->
<div class="d-flex gap-2 mb-4">
    <button class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Xac nhan</button>
    <button class="btn btn-info btn-sm text-white"><i class="bi bi-fire"></i> Lam banh</button>
    <button class="btn btn-warning btn-sm"><i class="bi bi-truck"></i> Giao hang</button>
    <button class="btn btn-success btn-sm"><i class="bi bi-check2-all"></i> Hoan thanh</button>
    <button class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Huy don</button>
</div>

<div class="row g-4">
    <!-- Left column -->
    <div class="col-lg-8">
        <!-- Thong tin khach hang -->
        <div class="card mb-4">
            <div class="card-header"><strong>Thong tin khach hang</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Ho ten</p>
                        <p class="fw-semibold">Nguyen Van A</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">So dien thoai</p>
                        <p class="fw-semibold">0901234567</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Email</p>
                        <p class="fw-semibold">nguyenvana@email.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Giao hang -->
        <div class="card mb-4">
            <div class="card-header"><strong>Giao hang</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Hinh thuc</p>
                        <p class="fw-semibold">Giao hang tan noi</p>
                    </div>
                    <div class="col-md-8">
                        <p class="text-muted mb-1">Dia chi</p>
                        <p class="fw-semibold">123 Nguyen Hue, Quan 1, TP.HCM</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thoi gian nhan -->
        <div class="card mb-4">
            <div class="card-header"><strong>Thoi gian nhan</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Ngay nhan</p>
                        <p class="fw-semibold">28/03/2026</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Gio nhan</p>
                        <p class="fw-semibold">14:00 - 16:00</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ghi chu -->
        <div class="card mb-4">
            <div class="card-header"><strong>Ghi chu</strong></div>
            <div class="card-body">
                <p>Giao truoc 3 gio chieu, goi truoc khi giao. Cam on!</p>
            </div>
        </div>

        <!-- Qua tang -->
        <div class="card mb-4">
            <div class="card-header"><strong>Qua tang</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Nguoi nhan</p>
                        <p class="fw-semibold">Tran Thi B</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">SDT nguoi nhan</p>
                        <p class="fw-semibold">0912345678</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- San pham da dat -->
        <div class="card mb-4">
            <div class="card-header"><strong>San pham da dat</strong></div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Ten SP</th>
                                <th>Size</th>
                                <th>Cot banh</th>
                                <th class="text-center">SL</th>
                                <th class="text-end">Don gia</th>
                                <th class="text-end">Thanh tien</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Banh kem dau tay</td>
                                <td>Size 20cm</td>
                                <td>Bong lan trung</td>
                                <td class="text-center">1</td>
                                <td class="text-end">350,000d</td>
                                <td class="text-end">350,000d</td>
                            </tr>
                            <tr>
                                <td>Banh mousse socola</td>
                                <td>Size 16cm</td>
                                <td>Bong lan socola</td>
                                <td class="text-center">1</td>
                                <td class="text-end">280,000d</td>
                                <td class="text-end">280,000d</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="col-lg-4">
        <!-- Thanh toan -->
        <div class="card mb-4">
            <div class="card-header"><strong>Thanh toan</strong></div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Tam tinh</span>
                    <span>630,000d</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Phi giao hang</span>
                    <span>30,000d</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Giam gia</span>
                    <span class="text-danger">-50,000d</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Tong cong</strong>
                    <strong class="text-danger fs-5">610,000d</strong>
                </div>
                <hr>
                <p class="text-muted mb-1">Phuong thuc thanh toan</p>
                <p class="fw-semibold mb-0">Tien mat (COD)</p>
            </div>
        </div>

        <!-- Trang thai -->
        <div class="card mb-4">
            <div class="card-header"><strong>Trang thai</strong></div>
            <div class="card-body">
                <p class="mb-3">
                    Hien tai: <span class="badge bg-warning text-dark">Cho xac nhan</span>
                </p>
                <form method="POST" action="#">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Cap nhat trang thai</label>
                        <select class="form-select form-select-sm" name="status">
                            <option value="pending" selected>Cho xac nhan</option>
                            <option value="confirmed">Da xac nhan</option>
                            <option value="processing">Dang lam banh</option>
                            <option value="shipping">Dang giao hang</option>
                            <option value="completed">Hoan thanh</option>
                            <option value="cancelled">Da huy</option>
                            <option value="refunded">Hoan tien</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary w-100">Cap nhat</button>
                </form>
            </div>
        </div>

        <!-- Ghi chu admin -->
        <div class="card mb-4">
            <div class="card-header"><strong>Ghi chu admin</strong></div>
            <div class="card-body">
                <form method="POST" action="#">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <textarea class="form-control" name="admin_note" rows="4" placeholder="Ghi chu noi bo..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary w-100">Luu ghi chu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
