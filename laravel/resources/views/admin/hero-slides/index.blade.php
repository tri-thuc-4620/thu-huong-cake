@extends('admin.layouts.app')

@section('title', 'Slider')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Slider</h4>
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-pink">
        <i class="bi bi-plus-lg"></i> Them slider
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
                        <th>Anh</th>
                        <th>Badge</th>
                        <th>Tieu de</th>
                        <th>Hoat dong</th>
                        <th>Thu tu</th>
                        <th class="text-end">Hanh dong</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://placehold.co/80x45?text=Slide+1" class="rounded" style="width:80px;height:45px;object-fit:cover"></td>
                        <td>Moi</td>
                        <td>Banh sinh nhat tuyet dep</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td>1</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.hero-slides.edit', 1) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/80x45?text=Slide+2" class="rounded" style="width:80px;height:45px;object-fit:cover"></td>
                        <td>Hot</td>
                        <td>Khuyen mai mua he</td>
                        <td><span class="badge bg-success">Hoat dong</span></td>
                        <td>2</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.hero-slides.edit', 2) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://placehold.co/80x45?text=Slide+3" class="rounded" style="width:80px;height:45px;object-fit:cover"></td>
                        <td>Sale</td>
                        <td>Giam gia 20% tat ca</td>
                        <td><span class="badge bg-secondary">Tam tat</span></td>
                        <td>3</td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.hero-slides.edit', 3) }}" class="action-btn edit" title="Sua"><i class="bi bi-pencil"></i></a>
                                <button class="action-btn delete" title="Xoa"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
