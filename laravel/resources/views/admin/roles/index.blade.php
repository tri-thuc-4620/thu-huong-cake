@extends('admin.layouts.app')

@section('title', 'Phan quyen')

@section('content')
<div class="page-header">
    <div>
        <h4>Phan quyen & Vai tro</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Quan ly vai tro va quyen truy cap he thong</p>
    </div>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg me-1"></i> Them vai tro
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@php
    $roleColors = ['#10b981', '#6366f1', '#f59e0b', '#10b981', '#3b82f6', '#94a3b8'];
@endphp

{{-- Danh sach vai tro --}}
<div class="row g-4">
    @forelse($roles as $index => $role)
    <div class="col-md-6 col-xl-4">
        <div class="card h-100" style="border-top:3px solid {{ $roleColors[$index % count($roleColors)] }}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="mb-1" style="font-weight:700">{{ $role->name }}</h6>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem">{{ $role->permissions_count }} quyen</span>
                </div>
                <div class="d-flex flex-wrap gap-1 mb-3">
                    @foreach($role->permissions->take(5) as $perm)
                        <span class="badge badge-soft-success" style="font-size:0.7rem">{{ $perm->name }}</span>
                    @endforeach
                    @if($role->permissions_count > 5)
                        <span class="badge badge-soft-success" style="font-size:0.7rem">+{{ $role->permissions_count - 5 }}</span>
                    @endif
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ route('admin.roles.edit', $role) }}" class="action-btn edit"><i class="bi bi-pencil"></i></a>
                    @if($role->name !== 'super-admin')
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa vai tro nay?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete"><i class="bi bi-trash"></i></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted py-4">Chua co vai tro nao.</p>
    </div>
    @endforelse
</div>
@endsection
