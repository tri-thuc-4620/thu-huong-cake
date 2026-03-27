@extends('admin.layouts.app')

@section('title', 'Chinh sua bai viet')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Chinh sua bai viet</h4>
    <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Left column -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tieu de <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blogPost->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $blogPost->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Tom tat</label>
                        <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Noi dung <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content', $blogPost->content) }}</textarea>
                        <small class="text-muted">Rich editor se duoc tich hop sau</small>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="card mb-4">
                <div class="card-header"><strong>SEO</strong></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title', $blogPost->meta_title) }}">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="meta_description" class="form-label">Meta description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $blogPost->meta_description) }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header"><strong>Xuat ban</strong></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="blog_category_id" class="form-label">Danh muc</label>
                        <select class="form-select @error('blog_category_id') is-invalid @enderror" id="blog_category_id" name="blog_category_id">
                            <option value="">-- Chon danh muc --</option>
                            <option value="1" {{ old('blog_category_id', $blogPost->blog_category_id) == 1 ? 'selected' : '' }}>Huong dan</option>
                            <option value="2" {{ old('blog_category_id', $blogPost->blog_category_id) == 2 ? 'selected' : '' }}>Tin tuc</option>
                            <option value="3" {{ old('blog_category_id', $blogPost->blog_category_id) == 3 ? 'selected' : '' }}>Cong thuc</option>
                        </select>
                        @error('blog_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author_id" class="form-label">Tac gia</label>
                        <select class="form-select @error('author_id') is-invalid @enderror" id="author_id" name="author_id">
                            <option value="">-- Chon tac gia --</option>
                            <option value="1" {{ old('author_id', $blogPost->author_id) == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('author_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Anh dai dien</label>
                        @if($blogPost->featured_image)
                            <div class="mb-2">
                                <img src="{{ $blogPost->featured_image }}" class="img-thumbnail" style="max-height:120px" alt="">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Xuat ban</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Ngay xuat ban</label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '') }}">
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-check-lg"></i> Luu
            </button>
        </div>
    </div>
</form>
@endsection
