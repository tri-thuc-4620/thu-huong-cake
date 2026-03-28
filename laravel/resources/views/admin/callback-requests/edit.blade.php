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
        <form action="{{ route('admin.callback-requests.update', $callbackRequest) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Ho ten</label>
                <input type="text" class="form-control" id="name" value="{{ $callbackRequest->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">SDT</label>
                <input type="text" class="form-control" id="phone" value="{{ $callbackRequest->phone }}" disabled>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Ghi chu</label>
                <textarea class="form-control" id="note" rows="3" disabled>{{ $callbackRequest->note }}</textarea>
            </div>

            <hr>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_handled" name="is_handled" value="1" {{ old('is_handled', $callbackRequest->is_handled) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_handled">Da xu ly</label>
                </div>
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
