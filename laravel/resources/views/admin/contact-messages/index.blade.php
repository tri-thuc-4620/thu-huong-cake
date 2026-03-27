@extends('admin.layouts.app')

@section('title', 'Tin nhan lien he')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Tin nhan lien he</h4>
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
                        <th>SDT</th>
                        <th>Email</th>
                        <th>Noi dung</th>
                        <th>Da doc</th>
                        <th>Ngay gui</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nguyen Van A</td>
                        <td>0912 345 678</td>
                        <td>nguyenvana@email.com</td>
                        <td>Toi muon dat banh sinh nhat cho...</td>
                        <td><span class="badge bg-success">Da doc</span></td>
                        <td>27/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.contact-messages.show', 1) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.contact-messages.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tran Thi B</td>
                        <td>0987 654 321</td>
                        <td>tranthib@email.com</td>
                        <td>Cho toi hoi ve gia banh kem 3...</td>
                        <td><span class="badge bg-warning text-dark">Chua doc</span></td>
                        <td>26/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.contact-messages.show', 2) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.contact-messages.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Le Van C</td>
                        <td>0901 234 567</td>
                        <td>levanc@email.com</td>
                        <td>Cua hang co giao hang tan noi...</td>
                        <td><span class="badge bg-success">Da doc</span></td>
                        <td>25/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.contact-messages.show', 3) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.contact-messages.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pham Thi D</td>
                        <td>0976 543 210</td>
                        <td>phamthid@email.com</td>
                        <td>Toi muon hop tac kinh doanh voi...</td>
                        <td><span class="badge bg-warning text-dark">Chua doc</span></td>
                        <td>24/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.contact-messages.show', 4) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.contact-messages.edit', 4) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hoang Van E</td>
                        <td>0934 567 890</td>
                        <td>hoangvane@email.com</td>
                        <td>Bao gia banh cuoi cho 200 khach...</td>
                        <td><span class="badge bg-warning text-dark">Chua doc</span></td>
                        <td>23/03/2026</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.contact-messages.show', 5) }}" class="action-btn view" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.contact-messages.edit', 5) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
