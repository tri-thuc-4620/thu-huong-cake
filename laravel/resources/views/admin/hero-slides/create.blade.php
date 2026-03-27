@extends('admin.layouts.app')

@section('title', 'Them slider')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Them slider</h4>
    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="badge_text" class="form-label">Badge text</label>
                <input type="text" class="form-control @error('badge_text') is-invalid @enderror" id="badge_text" name="badge_text" value="{{ old('badge_text') }}" placeholder="VD: Moi, Hot, Sale...">
                @error('badge_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="title_line_1" class="form-label">Tieu de dong 1</label>
                <input type="text" class="form-control @error('title_line_1') is-invalid @enderror" id="title_line_1" name="title_line_1" value="{{ old('title_line_1') }}">
                @error('title_line_1') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="title_line_2" class="form-label">Tieu de dong 2</label>
                <input type="text" class="form-control @error('title_line_2') is-invalid @enderror" id="title_line_2" name="title_line_2" value="{{ old('title_line_2') }}">
                @error('title_line_2') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mo ta</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="button_1_text" class="form-label">Nut 1 - Text</label>
                    <input type="text" class="form-control @error('button_1_text') is-invalid @enderror" id="button_1_text" name="button_1_text" value="{{ old('button_1_text') }}">
                    @error('button_1_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="button_1_url" class="form-label">Nut 1 - URL</label>
                    <input type="text" class="form-control @error('button_1_url') is-invalid @enderror" id="button_1_url" name="button_1_url" value="{{ old('button_1_url') }}">
                    @error('button_1_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="button_2_text" class="form-label">Nut 2 - Text</label>
                    <input type="text" class="form-control @error('button_2_text') is-invalid @enderror" id="button_2_text" name="button_2_text" value="{{ old('button_2_text') }}">
                    @error('button_2_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="button_2_url" class="form-label">Nut 2 - URL</label>
                    <input type="text" class="form-control @error('button_2_url') is-invalid @enderror" id="button_2_url" name="button_2_url" value="{{ old('button_2_url') }}">
                    @error('button_2_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hinh anh</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Hoat dong</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sort_order" class="form-label">Thu tu</label>
                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                    @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
