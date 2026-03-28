@extends('admin.layouts.app')

@section('title', 'Chi tiet don hang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chi tiet don hang <strong>#{{ $order->order_number }}</strong></h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<!-- Action buttons -->
<div class="d-flex gap-2 mb-4">
    @if($order->status == 'pending')
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="status" value="confirmed">
            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Xac nhan</button>
        </form>
    @endif
    @if($order->status == 'confirmed')
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="status" value="processing">
            <button type="submit" class="btn btn-info btn-sm text-white"><i class="bi bi-fire"></i> Lam banh</button>
        </form>
    @endif
    @if($order->status == 'processing')
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="status" value="shipping">
            <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-truck"></i> Giao hang</button>
        </form>
    @endif
    @if($order->status == 'shipping')
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="status" value="completed">
            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check2-all"></i> Hoan thanh</button>
        </form>
    @endif
    @if(!in_array($order->status, ['cancelled', 'completed', 'refunded']))
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon huy don hang nay?')">
            @csrf @method('PUT')
            <input type="hidden" name="status" value="cancelled">
            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Huy don</button>
        </form>
    @endif
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
                        <p class="fw-semibold">{{ $order->customer_name }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">So dien thoai</p>
                        <p class="fw-semibold">{{ $order->customer_phone }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Email</p>
                        <p class="fw-semibold">{{ $order->customer_email ?? '—' }}</p>
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
                        <p class="fw-semibold">
                            @if($order->delivery_type == 'delivery')
                                Giao hang tan noi
                            @else
                                Nhan tai cua hang
                            @endif
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p class="text-muted mb-1">Dia chi</p>
                        <p class="fw-semibold">
                            @if($order->delivery_type == 'pickup' && $order->pickupStore)
                                {{ $order->pickupStore->name }} - {{ $order->pickupStore->address }}
                            @else
                                {{ $order->delivery_address ?? '—' }}
                            @endif
                        </p>
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
                        <p class="fw-semibold">{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y') : '—' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Gio nhan</p>
                        <p class="fw-semibold">{{ $order->delivery_time ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ghi chu -->
        @if($order->note)
        <div class="card mb-4">
            <div class="card-header"><strong>Ghi chu</strong></div>
            <div class="card-body">
                <p>{{ $order->note }}</p>
            </div>
        </div>
        @endif

        <!-- Qua tang -->
        @if($order->gift_recipient_name || $order->gift_recipient_phone)
        <div class="card mb-4">
            <div class="card-header"><strong>Qua tang</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Nguoi nhan</p>
                        <p class="fw-semibold">{{ $order->gift_recipient_name ?? '—' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">SDT nguoi nhan</p>
                        <p class="fw-semibold">{{ $order->gift_recipient_phone ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

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
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name ?? ($item->product->name ?? '—') }}</td>
                                <td>{{ $item->cake_size ?? '—' }}</td>
                                <td>{{ $item->cake_base ?? '—' }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">{{ number_format($item->unit_price) }} &#273;</td>
                                <td class="text-end">{{ number_format($item->quantity * $item->unit_price) }} &#273;</td>
                            </tr>
                            @endforeach
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
                    <span>{{ number_format($order->subtotal) }} &#273;</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Phi giao hang</span>
                    <span>{{ number_format($order->shipping_fee) }} &#273;</span>
                </div>
                @if($order->discount > 0)
                <div class="d-flex justify-content-between mb-2">
                    <span>Giam gia</span>
                    <span class="text-danger">-{{ number_format($order->discount) }} &#273;</span>
                </div>
                @endif
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Tong cong</strong>
                    <strong class="text-danger fs-5">{{ number_format($order->total) }} &#273;</strong>
                </div>
                <hr>
                <p class="text-muted mb-1">Phuong thuc thanh toan</p>
                <p class="fw-semibold mb-0">
                    @php
                        $paymentLabel = match($order->payment_method) {
                            'bank_transfer' => 'Chuyen khoan',
                            'cod' => 'Tien mat (COD)',
                            'momo' => 'MoMo',
                            default => $order->payment_method,
                        };
                    @endphp
                    {{ $paymentLabel }}
                </p>
            </div>
        </div>

        <!-- Trang thai -->
        <div class="card mb-4">
            <div class="card-header"><strong>Trang thai</strong></div>
            <div class="card-body">
                <p class="mb-3">
                    Hien tai:
                    @php
                        $statusBadge = match($order->status) {
                            'pending' => 'bg-warning text-dark',
                            'confirmed' => 'bg-info text-white',
                            'processing' => 'bg-primary',
                            'shipping' => 'bg-pink',
                            'delivered' => 'bg-success',
                            'completed' => 'bg-success',
                            'cancelled' => 'bg-danger',
                            'refunded' => 'bg-secondary',
                            default => 'bg-secondary',
                        };
                        $statusLabel = match($order->status) {
                            'pending' => 'Cho xac nhan',
                            'confirmed' => 'Da xac nhan',
                            'processing' => 'Dang lam banh',
                            'shipping' => 'Dang giao hang',
                            'delivered' => 'Da giao',
                            'completed' => 'Hoan thanh',
                            'cancelled' => 'Da huy',
                            'refunded' => 'Hoan tien',
                            default => $order->status,
                        };
                    @endphp
                    <span class="badge {{ $statusBadge }}">{{ $statusLabel }}</span>
                </p>
                <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Cap nhat trang thai</label>
                        <select class="form-select form-select-sm" name="status">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Cho xac nhan</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Da xac nhan</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Dang lam banh</option>
                            <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Dang giao hang</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoan thanh</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Da huy</option>
                            <option value="refunded" {{ $order->status == 'refunded' ? 'selected' : '' }}>Hoan tien</option>
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
                <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <textarea class="form-control" name="admin_note" rows="4" placeholder="Ghi chu noi bo...">{{ $order->admin_note }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary w-100">Luu ghi chu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
