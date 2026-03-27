@extends('admin.layouts.app')

@section('title', 'Chi tiet tin nhan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chi tiet tin nhan</h4>
    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <!-- Nguoi gui -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Nguoi gui</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width:120px" class="text-muted">Ho ten</th>
                        <td>{{ $contactMessage->name ?? 'Nguyen Van A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">SDT</th>
                        <td>{{ $contactMessage->phone ?? '0912 345 678' }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Email</th>
                        <td>{{ $contactMessage->email ?? 'nguyenvana@email.com' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Trang thai -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Trang thai</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width:120px" class="text-muted">Da doc</th>
                        <td>
                            @if(($contactMessage->is_read ?? true))
                                <span class="badge bg-success">Da doc</span>
                            @else
                                <span class="badge bg-warning text-dark">Chua doc</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Ngay gui</th>
                        <td>{{ $contactMessage->created_at ?? '27/03/2026 10:30' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <!-- Noi dung -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">Noi dung</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $contactMessage->content ?? 'Toi muon dat banh sinh nhat cho con gai, banh kem 2 tang, mau hong, co hinh cong chua. Xin vui long lien he lai de tu van them. Cam on!' }}</p>
            </div>
        </div>

        <!-- Tra loi -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Tra loi</h6>
            </div>
            <div class="card-body">
                @if(($contactMessage->admin_reply ?? null))
                    <p class="mb-0">{{ $contactMessage->admin_reply }}</p>
                @else
                    <p class="text-muted mb-0">Chua tra loi</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2">
    <form action="{{ route('admin.contact-messages.update', $contactMessage ?? 1) }}" method="POST" class="d-inline">
        @csrf
        @method('PUT')
        <input type="hidden" name="is_read" value="1">
        <button type="submit" class="btn btn-success">
            <i class="bi bi-check2-circle"></i> Danh dau da doc
        </button>
    </form>
    <a href="{{ route('admin.contact-messages.edit', $contactMessage ?? 1) }}" class="btn btn-primary">
        <i class="bi bi-reply"></i> Tra loi
    </a>
</div>
@endsection
