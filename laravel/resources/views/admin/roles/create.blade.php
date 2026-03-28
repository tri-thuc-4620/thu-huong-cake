@extends('admin.layouts.app')

@section('title', 'Them vai tro')

@section('content')
<div class="page-header">
    <div>
        <h4>Them vai tro moi</h4>
    </div>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-soft"><i class="bi bi-arrow-left me-1"></i> Quay lai</a>
</div>

<form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h6 class="mb-0">Thong tin vai tro</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Ten vai tro <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="VD: content-editor" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-pink w-100"><i class="bi bi-check-lg me-1"></i> Luu vai tro</button>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Chon quyen</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll" style="font-size:0.85rem">Chon tat ca</label>
                    </div>
                </div>
                <div class="card-body">
                    @php
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
                                    <input class="form-check-input perm-checkbox" type="checkbox" name="permissions[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" {{ in_array($perm->id, old('permissions', [])) ? 'checked' : '' }}>
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

@push('scripts')
<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        document.querySelectorAll('.perm-checkbox').forEach(cb => cb.checked = this.checked);
    });
</script>
@endpush
@endsection
