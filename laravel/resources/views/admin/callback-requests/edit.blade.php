@extends('admin.layouts.app')

@section('title', 'Chinh sua yeu cau goi lai')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chinh sua yeu cau goi lai</h4>
    <a href="{{ route('admin.callback-requests.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.callback-requests.update', $callbackRequest ?? 1) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Ho ten</label>
                <input type="text" class="form-control" id="name" value="{{ $callbackRequest->name ?? 'Nguyen Thi F' }}" disabled>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">SDT</label>
                <input type="text" class="form-control" id="phone" value="{{ $callbackRequest->phone ?? '0912 111 222' }}" disabled>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Ghi chu</label>
                <textarea class="form-control" id="note" rows="3" disabled>{{ $callbackRequest->note ?? 'Muon hoi ve banh cuoi' }}</textarea>
            </div>

            <hr>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_handled" name="is_handled" value="1" {{ old('is_handled', $callbackRequest->is_handled ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_handled">Da xu ly</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="handled_at" class="form-label">Thoi gian xu ly</label>
                <input type="datetime-local" class="form-control @error('handled_at') is-invalid @enderror" id="handled_at" name="handled_at" value="{{ old('handled_at', isset($callbackRequest->handled_at) ? \Carbon\Carbon::parse($callbackRequest->handled_at)->format('Y-m-d\TH:i') : '') }}">
                @error('handled_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Luu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
