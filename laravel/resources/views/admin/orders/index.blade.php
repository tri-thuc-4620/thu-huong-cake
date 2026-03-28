@extends('admin.layouts.app')

@section('title', 'Don hang')

@section('content')
<div class="page-header">
    <div>
        <h4>Don hang</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly va xu ly don hang</p>
    </div>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Tao don hang
    </a>
</div>

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#fef3c7;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-clock" style="color:#f59e0b"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Cho xu ly</div>
                    <div style="font-size:1.1rem;font-weight:700">{{ $orders->where('status', 'pending')->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-fire" style="color:#3b82f6"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Dang lam</div>
                    <div style="font-size:1.1rem;font-weight:700">{{ $orders->where('status', 'processing')->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#fce7f3;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-truck" style="color:#e84393"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Dang giao</div>
                    <div style="font-size:1.1rem;font-weight:700">{{ $orders->where('status', 'shipping')->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card" style="min-width:140px">
            <div class="card-body py-2 px-3 d-flex align-items-center gap-2">
                <div style="width:36px;height:36px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center">
                    <i class="bi bi-check-circle" style="color:#10b981"></i>
                </div>
                <div>
                    <div style="font-size:0.7rem;color:#94a3b8">Hoan thanh</div>
                    <div style="font-size:1.1rem;font-weight:700">{{ $orders->where('status', 'completed')->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Filter Bar --}}
<form method="GET" action="{{ route('admin.orders.index') }}" class="filter-bar d-flex flex-wrap gap-3 align-items-end">
    <div>
        <label class="form-label">Trang thai</label>
        <select class="form-select form-select-sm" name="status" style="min-width:150px">
            <option value="">Tat ca</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Cho xu ly</option>
            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Da xac nhan</option>
            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Dang lam banh</option>
            <option value="shipping" {{ request('status') == 'shipping' ? 'selected' : '' }}>Dang giao</option>
            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Da giao</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Hoan thanh</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Da huy</option>
        </select>
    </div>
    <div>
        <label class="form-label">Hinh thuc</label>
        <select class="form-select form-select-sm" name="delivery_type" style="min-width:140px">
            <option value="">Tat ca</option>
            <option value="delivery" {{ request('delivery_type') == 'delivery' ? 'selected' : '' }}>Giao tan noi</option>
            <option value="pickup" {{ request('delivery_type') == 'pickup' ? 'selected' : '' }}>Nhan tai CH</option>
        </select>
    </div>
    <div>
        <label class="form-label">Thanh toan</label>
        <select class="form-select form-select-sm" name="payment_method" style="min-width:140px">
            <option value="">Tat ca</option>
            <option value="bank_transfer" {{ request('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Chuyen khoan</option>
            <option value="cod" {{ request('payment_method') == 'cod' ? 'selected' : '' }}>COD</option>
        </select>
    </div>
    <div>
        <label class="form-label">Tu ngay</label>
        <input type="date" class="form-control form-control-sm" name="from_date" value="{{ request('from_date') }}" style="min-width:140px">
    </div>
    <div>
        <label class="form-label">Den ngay</label>
        <input type="date" class="form-control form-control-sm" name="to_date" value="{{ request('to_date') }}" style="min-width:140px">
    </div>
    <button type="submit" class="btn btn-soft btn-sm"><i class="bi bi-funnel me-1"></i> Loc</button>
</form>

{{-- Table --}}
<div class="card table-card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span style="font-size:0.85rem"><strong>{{ number_format($orders->total()) }}</strong> don hang</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:40px"><input type="checkbox" class="form-check-input"></th>
                    <th>Ma don</th>
                    <th>Khach hang</th>
                    <th>Tong tien</th>
                    <th>Trang thai</th>
                    <th>Hinh thuc</th>
                    <th>Thanh toan</th>
                    <th>Ngay nhan</th>
                    <th>Ngay dat</th>
                    <th style="width:160px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td><span style="font-weight:600">#{{ $order->order_number }}</span></td>
                    <td>
                        <div style="font-weight:500">{{ $order->customer_name }}</div>
                        <div class="text-muted" style="font-size:0.75rem">{{ $order->customer_phone }}</div>
                    </td>
                    <td style="font-weight:600">{{ number_format($order->total) }} &#273;</td>
                    <td>
                        @php
                            $statusBadge = match($order->status) {
                                'pending' => 'badge-soft-warning',
                                'confirmed' => 'badge-soft-info',
                                'processing' => 'badge-soft-primary',
                                'shipping' => 'badge-soft-pink',
                                'delivered' => 'badge-soft-success',
                                'completed' => 'badge-soft-success',
                                'cancelled' => 'badge-soft-danger',
                                'refunded' => 'badge-soft-secondary',
                                default => 'badge-soft-secondary',
                            };
                            $statusLabel = match($order->status) {
                                'pending' => 'Cho xu ly',
                                'confirmed' => 'Da xac nhan',
                                'processing' => 'Dang lam banh',
                                'shipping' => 'Dang giao',
                                'delivered' => 'Da giao',
                                'completed' => 'Hoan thanh',
                                'cancelled' => 'Da huy',
                                'refunded' => 'Hoan tien',
                                default => $order->status,
                            };
                        @endphp
                        <span class="badge {{ $statusBadge }}">{{ $statusLabel }}</span>
                    </td>
                    <td>
                        <span style="font-size:0.8rem">
                            @if($order->delivery_type == 'delivery')
                                <i class="bi bi-truck me-1 text-muted"></i>Giao tan noi
                            @else
                                <i class="bi bi-shop me-1 text-muted"></i>Nhan tai CH
                            @endif
                        </span>
                    </td>
                    <td>
                        <span style="font-size:0.8rem">
                            @php
                                $paymentLabel = match($order->payment_method) {
                                    'bank_transfer' => 'Chuyen khoan',
                                    'cod' => 'COD',
                                    'momo' => 'MoMo',
                                    default => $order->payment_method,
                                };
                            @endphp
                            {{ $paymentLabel }}
                        </span>
                    </td>
                    <td class="text-muted" style="font-size:0.8rem">{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d/m H:i') : '—' }}</td>
                    <td class="text-muted" style="font-size:0.8rem">{{ $order->created_at->format('d/m H:i') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="action-btn view"><i class="bi bi-eye"></i></a>
                            @if($order->status == 'pending')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="btn btn-sm btn-outline-success" style="border-radius:8px;font-size:0.75rem;padding:0.25rem 0.6rem">Xac nhan</button>
                                </form>
                            @elseif($order->status == 'confirmed')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="processing">
                                    <button type="submit" class="btn btn-sm btn-outline-primary" style="border-radius:8px;font-size:0.75rem;padding:0.25rem 0.6rem">Lam banh</button>
                                </form>
                            @elseif($order->status == 'processing')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="shipping">
                                    <button type="submit" class="btn btn-sm" style="border-radius:8px;font-size:0.75rem;padding:0.25rem 0.6rem;background:#fce7f3;color:#9d174d;border:1px solid #f9a8d4">Giao hang</button>
                                </form>
                            @elseif(in_array($order->status, ['completed', 'cancelled', 'refunded']))
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-muted py-4">Chua co don hang nao.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <span class="text-muted" style="font-size:0.85rem">Hien thi <strong>{{ $orders->firstItem() ?? 0 }}-{{ $orders->lastItem() ?? 0 }}</strong> / <strong>{{ number_format($orders->total()) }}</strong> don hang</span>
    {{ $orders->links('pagination::bootstrap-5') }}
</div>
@endsection
