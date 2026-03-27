@extends('admin.layouts.app')

@section('title', 'Chinh sua don hang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chinh sua don hang <strong>#{{ $order->id ?? 'DH001' }}</strong></h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.orders.update', $order ?? 1) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Left column -->
        <div class="col-lg-8">
            <!-- Khach hang -->
            <div class="card mb-4">
                <div class="card-header"><strong>Khach hang</strong></div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Ho ten <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name', $order->customer_name ?? '') }}" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">So dien thoai <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" value="{{ old('customer_phone', $order->customer_phone ?? '') }}" required>
                            @error('customer_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" value="{{ old('customer_email', $order->customer_email ?? '') }}">
                            @error('customer_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Giao hang -->
            <div class="card mb-4">
                <div class="card-header"><strong>Giao hang</strong></div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Hinh thuc giao <span class="text-danger">*</span></label>
                            <select class="form-select @error('delivery_type') is-invalid @enderror" name="delivery_type" required>
                                <option value="">-- Chon --</option>
                                <option value="delivery" {{ old('delivery_type', $order->delivery_type ?? '') == 'delivery' ? 'selected' : '' }}>Giao hang tan noi</option>
                                <option value="pickup" {{ old('delivery_type', $order->delivery_type ?? '') == 'pickup' ? 'selected' : '' }}>Nhan tai cua hang</option>
                            </select>
                            @error('delivery_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cua hang</label>
                            <select class="form-select" name="store_location_id">
                                <option value="">-- Chon cua hang --</option>
                                <option value="1">Thu Huong Cake - Quan 1</option>
                                <option value="2">Thu Huong Cake - Quan 3</option>
                                <option value="3">Thu Huong Cake - Binh Thanh</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Dia chi giao hang</label>
                            <input type="text" class="form-control @error('delivery_address') is-invalid @enderror" name="delivery_address" value="{{ old('delivery_address', $order->delivery_address ?? '') }}">
                            @error('delivery_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ngay nhan <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date" value="{{ old('delivery_date', $order->delivery_date ?? '') }}" required>
                            @error('delivery_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gio nhan</label>
                            <input type="time" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" value="{{ old('delivery_time', $order->delivery_time ?? '') }}">
                            @error('delivery_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ghi chu -->
            <div class="card mb-4">
                <div class="card-header"><strong>Ghi chu</strong></div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Ghi chu don hang</label>
                            <textarea class="form-control" name="note" rows="3">{{ old('note', $order->note ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nguoi nhan qua</label>
                            <input type="text" class="form-control" name="gift_recipient_name" value="{{ old('gift_recipient_name', $order->gift_recipient_name ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">SDT nguoi nhan qua</label>
                            <input type="text" class="form-control" name="gift_recipient_phone" value="{{ old('gift_recipient_phone', $order->gift_recipient_phone ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- San pham -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>San pham</strong>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="btn-add-item">
                        <i class="bi bi-plus-lg"></i> Them san pham
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="order-items-table">
                            <thead class="table-light">
                                <tr>
                                    <th>San pham</th>
                                    <th>Size</th>
                                    <th>Cot banh</th>
                                    <th style="width:80px">SL</th>
                                    <th style="width:130px">Don gia</th>
                                    <th style="width:130px">Thanh tien</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm" name="items[0][product_id]">
                                            <option value="">-- Chon SP --</option>
                                            <option value="1" selected>Banh kem dau tay</option>
                                            <option value="2">Banh mousse socola</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm" name="items[0][cake_size_id]">
                                            <option value="">-- Size --</option>
                                            <option value="1">16cm</option>
                                            <option value="2" selected>20cm</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm" name="items[0][cake_base_id]">
                                            <option value="">-- Cot --</option>
                                            <option value="1" selected>Bong lan trung</option>
                                            <option value="2">Bong lan socola</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm" name="items[0][quantity]" value="1" min="1"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="items[0][unit_price]" value="350000"></td>
                                    <td><input type="text" class="form-control form-control-sm bg-light" value="350,000" readonly></td>
                                    <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
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
                    <div class="mb-3">
                        <label class="form-label">Tam tinh</label>
                        <input type="number" class="form-control" name="subtotal" value="{{ old('subtotal', $order->subtotal ?? 0) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phi giao hang</label>
                        <input type="number" class="form-control @error('shipping_fee') is-invalid @enderror" name="shipping_fee" value="{{ old('shipping_fee', $order->shipping_fee ?? 0) }}">
                        @error('shipping_fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giam gia</label>
                        <input type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount', $order->discount ?? 0) }}">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tong cong</label>
                        <input type="number" class="form-control fw-bold" name="total" value="{{ old('total', $order->total ?? 0) }}" readonly>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Phuong thuc thanh toan</label>
                        <select class="form-select @error('payment_method') is-invalid @enderror" name="payment_method">
                            <option value="cod" {{ old('payment_method', $order->payment_method ?? '') == 'cod' ? 'selected' : '' }}>Tien mat (COD)</option>
                            <option value="bank_transfer" {{ old('payment_method', $order->payment_method ?? '') == 'bank_transfer' ? 'selected' : '' }}>Chuyen khoan</option>
                            <option value="momo" {{ old('payment_method', $order->payment_method ?? '') == 'momo' ? 'selected' : '' }}>MoMo</option>
                        </select>
                        @error('payment_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Trang thai -->
            <div class="card mb-4">
                <div class="card-header"><strong>Trang thai</strong></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Trang thai don hang</label>
                        <select class="form-select" name="status">
                            <option value="pending" {{ old('status', $order->status ?? '') == 'pending' ? 'selected' : '' }}>Cho xac nhan</option>
                            <option value="confirmed" {{ old('status', $order->status ?? '') == 'confirmed' ? 'selected' : '' }}>Da xac nhan</option>
                            <option value="processing" {{ old('status', $order->status ?? '') == 'processing' ? 'selected' : '' }}>Dang lam banh</option>
                            <option value="shipping" {{ old('status', $order->status ?? '') == 'shipping' ? 'selected' : '' }}>Dang giao hang</option>
                            <option value="completed" {{ old('status', $order->status ?? '') == 'completed' ? 'selected' : '' }}>Hoan thanh</option>
                            <option value="cancelled" {{ old('status', $order->status ?? '') == 'cancelled' ? 'selected' : '' }}>Da huy</option>
                            <option value="refunded" {{ old('status', $order->status ?? '') == 'refunded' ? 'selected' : '' }}>Hoan tien</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Ghi chu admin</label>
                        <textarea class="form-control" name="admin_note" rows="3">{{ old('admin_note', $order->admin_note ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-check-lg"></i> Cap nhat don hang
            </button>
        </div>
    </div>
</form>
@endsection
