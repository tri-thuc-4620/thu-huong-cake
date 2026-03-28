@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div>
        <h4>Dashboard</h4>
        <nav class="breadcrumb">
            <span class="breadcrumb-item text-muted">Tong quan hoat dong cua hang</span>
        </nav>
    </div>
    <span class="text-muted" style="font-size:0.8rem">
        <i class="bi bi-clock me-1"></i>{{ now()->format('d/m/Y H:i') }}
    </span>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="card stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:rgba(99,102,241,0.1);color:#6366f1">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="stat-label">Tong san pham</div>
                    <div class="stat-value">{{ number_format($totalProducts) }}</div>
                </div>
                <div class="stat-change text-success">
                    <i class="bi bi-arrow-up"></i> 12%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:rgba(232,67,147,0.1);color:#e84393">
                    <i class="bi bi-receipt"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="stat-label">Tong don hang</div>
                    <div class="stat-value">{{ number_format($totalOrders) }}</div>
                </div>
                <div class="stat-change text-success">
                    <i class="bi bi-arrow-up"></i> 5%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:rgba(245,158,11,0.1);color:#f59e0b">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="stat-label">Cho xu ly</div>
                    <div class="stat-value">{{ number_format($pendingOrders) }}</div>
                </div>
                <div class="stat-change text-danger">
                    <i class="bi bi-arrow-up"></i> 3
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:rgba(16,185,129,0.1);color:#10b981">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="stat-label">Doanh thu hom nay</div>
                    <div class="stat-value" style="font-size:1.25rem">{{ number_format($todayRevenue) }} &#273;</div>
                </div>
                <div class="stat-change text-success">
                    <i class="bi bi-arrow-up"></i> 8%
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('admin.products.create') }}" class="btn btn-pink btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Them san pham
            </a>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-pink btn-sm">
                <i class="bi bi-receipt me-1"></i> Xem don hang
            </a>
            <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-soft btn-sm">
                <i class="bi bi-pencil-square me-1"></i> Viet bai moi
            </a>
            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-soft btn-sm position-relative">
                <i class="bi bi-envelope me-1"></i> Tin nhan
                <span class="badge bg-danger rounded-pill ms-1" style="font-size:0.65rem">3</span>
            </a>
        </div>
    </div>
</div>

{{-- Main Content Row --}}
<div class="row g-3">
    {{-- Recent Orders --}}
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0" style="font-size:0.95rem">
                    <i class="bi bi-receipt me-2 text-muted"></i>Don hang moi nhat
                </h6>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-soft" style="font-size:0.8rem">
                    Xem tat ca <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ma don</th>
                            <th>Khach hang</th>
                            <th>Tong tien</th>
                            <th>Trang thai</th>
                            <th>Thoi gian</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestOrders as $order)
                        <tr>
                            <td><span style="font-weight:600">#{{ $order->order_number }}</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-avatar" style="width:30px;height:30px;font-size:0.65rem;border-radius:8px">{{ mb_substr($order->customer_name, 0, 1) }}</div>
                                    {{ $order->customer_name }}
                                </div>
                            </td>
                            <td style="font-weight:500">{{ number_format($order->total) }} &#273;</td>
                            <td>
                                @switch($order->status)
                                    @case('pending')
                                        <span class="badge badge-soft-warning">Cho xu ly</span>
                                        @break
                                    @case('processing')
                                        <span class="badge badge-soft-primary">Dang lam banh</span>
                                        @break
                                    @case('shipping')
                                        <span class="badge badge-soft-info">Dang giao</span>
                                        @break
                                    @case('completed')
                                        <span class="badge badge-soft-success">Hoan thanh</span>
                                        @break
                                    @case('cancelled')
                                        <span class="badge badge-soft-danger">Da huy</span>
                                        @break
                                    @default
                                        <span class="badge badge-soft-secondary">{{ $order->status }}</span>
                                @endswitch
                            </td>
                            <td class="text-muted" style="font-size:0.8rem">{{ $order->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.orders.show', $order->id) }}" class="action-btn view"><i class="bi bi-eye"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Chua co don hang nao</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="col-lg-4">
        {{-- Revenue Chart Placeholder --}}
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0" style="font-size:0.95rem">
                    <i class="bi bi-graph-up me-2 text-muted"></i>Doanh thu 7 ngay
                </h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-end gap-1" style="height:120px">
                    <div style="flex:1;background:rgba(232,67,147,0.15);border-radius:6px 6px 0 0;height:40%"></div>
                    <div style="flex:1;background:rgba(232,67,147,0.2);border-radius:6px 6px 0 0;height:60%"></div>
                    <div style="flex:1;background:rgba(232,67,147,0.15);border-radius:6px 6px 0 0;height:35%"></div>
                    <div style="flex:1;background:rgba(232,67,147,0.25);border-radius:6px 6px 0 0;height:75%"></div>
                    <div style="flex:1;background:rgba(232,67,147,0.3);border-radius:6px 6px 0 0;height:90%"></div>
                    <div style="flex:1;background:rgba(232,67,147,0.2);border-radius:6px 6px 0 0;height:55%"></div>
                    <div style="flex:1;background:linear-gradient(to top, #e84393, #fd79a8);border-radius:6px 6px 0 0;height:100%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2" style="font-size:0.7rem;color:#94a3b8">
                    <span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>CN</span>
                </div>
                <div class="text-center mt-3">
                    <div style="font-size:0.75rem;color:#94a3b8">Tong tuan nay</div>
                    <div style="font-size:1.25rem;font-weight:700;color:#0f172a">87,500,000 &#273;</div>
                    <span class="badge badge-soft-success" style="font-size:0.7rem">
                        <i class="bi bi-arrow-up"></i> 12% so voi tuan truoc
                    </span>
                </div>
            </div>
        </div>

        {{-- Top Products --}}
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0" style="font-size:0.95rem">
                    <i class="bi bi-fire me-2 text-muted"></i>San pham ban chay
                </h6>
            </div>
            <div class="card-body p-0">
                <div class="d-flex align-items-center gap-3 p-3 border-bottom" style="border-color:#f1f5f9!important">
                    <div style="width:44px;height:44px;border-radius:10px;background:#fce7f3;display:flex;align-items:center;justify-content:center">
                        <i class="bi bi-cake2" style="color:#e84393"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div style="font-size:0.85rem;font-weight:600">Banh kem dau</div>
                        <div style="font-size:0.75rem;color:#94a3b8">45 da ban</div>
                    </div>
                    <div style="font-size:0.85rem;font-weight:600;color:#10b981">350K</div>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 border-bottom" style="border-color:#f1f5f9!important">
                    <div style="width:44px;height:44px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center">
                        <i class="bi bi-cake2" style="color:#3b82f6"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div style="font-size:0.85rem;font-weight:600">Banh mousse socola</div>
                        <div style="font-size:0.75rem;color:#94a3b8">38 da ban</div>
                    </div>
                    <div style="font-size:0.85rem;font-weight:600;color:#10b981">420K</div>
                </div>
                <div class="d-flex align-items-center gap-3 p-3">
                    <div style="width:44px;height:44px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center">
                        <i class="bi bi-cake2" style="color:#10b981"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div style="font-size:0.85rem;font-weight:600">Banh sinh nhat mini</div>
                        <div style="font-size:0.75rem;color:#94a3b8">32 da ban</div>
                    </div>
                    <div style="font-size:0.85rem;font-weight:600;color:#10b981">250K</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
