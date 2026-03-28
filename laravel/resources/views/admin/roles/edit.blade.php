@extends('admin.layouts.app')

@section('title', 'Sua vai tro')

@section('content')
<div class="page-header">
    <div>
        <h4>Sua vai tro: <span style="color:var(--pink)">{{ $role->name }}</span></h4>
    </div>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-soft"><i class="bi bi-arrow-left me-1"></i> Quay lai</a>
</div>

<form action="{{ route('admin.roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h6 class="mb-0">Thong tin vai tro</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Ten vai tro</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $role->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-pink"><i class="bi bi-check-lg me-1"></i> Luu thay doi</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-soft">Huy</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Quyen cua vai tro nay</h6>
                    <span class="badge badge-soft-pink">{{ $role->permissions->count() }} / {{ $permissions->count() }} quyen</span>
                </div>
                <div class="card-body">
                    @php
                        $rolePermissionIds = $role->permissions->pluck('id')->toArray();
                        $groupedPermissions = $permissions->groupBy(function($perm) {
                            return explode('.', $perm->name)[0] ?? 'other';
                        });
                    @endphp

                    @foreach($groupedPermissions as $group => $perms)
                        <h6 style="font-size:0.85rem;font-weight:700;color:var(--pink);margin-bottom:8px">{{ ucfirst($group) }}</h6>
                        <div class="row g-2 mb-3">
                            @foreach($perms as $perm)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input perm-checkbox" type="checkbox" name="permissions[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" {{ in_array($perm->id, old('permissions', $rolePermissionIds)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm_{{ $perm->id }}" style="font-size:0.8rem">{{ $perm->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
