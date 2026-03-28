@extends('admin.layouts.app')

@section('title', 'Tra loi tin nhan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Tra loi tin nhan</h4>
    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.contact-messages.update', $message) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Ho ten</label>
                <input type="text" class="form-control" id="name" value="{{ $message->name }}" disabled>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">SDT</label>
                    <input type="text" class="form-control" id="phone" value="{{ $message->phone }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" value="{{ $message->email }}" disabled>
                </div>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Noi dung</label>
                <textarea class="form-control" id="content" rows="3" disabled>{{ $message->content }}</textarea>
            </div>

            <hr>

            <div class="mb-3">
                <label for="admin_reply" class="form-label">Tra loi</label>
                <textarea class="form-control @error('admin_reply') is-invalid @enderror" id="admin_reply" name="admin_reply" rows="4">{{ old('admin_reply', $message->admin_reply) }}</textarea>
                @error('admin_reply') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
