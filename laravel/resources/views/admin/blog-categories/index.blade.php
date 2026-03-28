@extends('admin.layouts.app')

@section('title', 'Danh muc blog')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Danh muc blog</h4>
    <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg"></i> Them danh muc
    </a>
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
                        <th>#</th>
                        <th>Ten</th>
                        <th>Slug</th>
                        <th>So bai viet</th>
                        <th>Hien thi</th>
                        <th>Thu tu</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td>{{ $category->posts_count }}</td>
                        <td>
                            @if($category->is_visible)
                                <span class="badge bg-success">Hien thi</span>
                            @else
                                <span class="badge bg-secondary">An</span>
                            @endif
                        </td>
                        <td>{{ $category->sort_order }}</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.blog-categories.edit', $category) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Ban co chac chan muon xoa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Chua co danh muc nao.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $categories->links('pagination::bootstrap-5') }}
</div>
@endsection
