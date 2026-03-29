@extends('admin.layouts.app')

@section('title', 'Them san pham')

@section('content')
<div class="page-header">
    <div>
        <h4>Them san pham moi</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem">Tao san pham voi thuoc tinh va bien the</p>
    </div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-soft">
        <i class="bi bi-arrow-left me-1"></i> Quay lai
    </a>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-4">
        {{-- ================================================================ --}}
        {{-- LEFT COLUMN --}}
        {{-- ================================================================ --}}
        <div class="col-lg-8">

            {{-- 1. Ten san pham (no card, like WP) --}}
            <div class="mb-4">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ten san pham" required style="font-size:1.3rem;padding:0.6rem 0.8rem;border-radius:4px;border:1px solid #dcdcde">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <div class="mt-1" style="font-size:0.8rem;color:#646970">
                    Duong dan: <span style="color:var(--pink)">thuhuongcake.wuaze.com/san-pham/<strong>ten-san-pham</strong>/</span>
                </div>
            </div>

            {{-- 2. Mo ta san pham (rich editor area) --}}
            <div class="card mb-4">
                <div class="card-header py-2"><h6 class="mb-0" style="font-size:0.9rem">Mo ta san pham</h6></div>
                <div class="card-body p-0">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="12" placeholder="Nhap mo ta chi tiet san pham..." style="border:none;border-radius:0;resize:vertical">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="card-footer py-1" style="background:#f8fafc;border-top:1px solid #f0e4e9">
                    <span class="text-muted" style="font-size:0.75rem"><i class="bi bi-info-circle me-1"></i>Rich editor se duoc tich hop</span>
                </div>
            </div>

            {{-- 3. Thiet lap Bien the (KEPT AS-IS from original) --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0"><i class="bi bi-sliders me-2 text-muted"></i>Thiet lap Bien the</h6>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-soft btn-sm" onclick="document.getElementById('variationSection').style.display='none'">
                            <i class="bi bi-toggle-off me-1"></i> Bat / Tat
                        </button>
                    </div>
                </div>
                <div class="card-body p-0" id="variationSection">
                    {{-- Preset Tabs --}}
                    <div class="border-bottom" style="overflow-x:auto;white-space:nowrap">
                        <ul class="nav nav-tabs px-3 pt-2" style="flex-wrap:nowrap;border-bottom:none" id="variationPresetTabs">
                            <li class="nav-item">
                                <button class="nav-link active btn-sm" data-bs-toggle="tab" data-bs-target="#preset-mini" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Sinh Nhat Mini
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-special" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Dac Biet
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-heart" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Trai Tim
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-fruit" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Hoa Qua
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-rectangle" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Hinh Chu Nhat
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-drawing" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Ve Hinh
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-tier" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Tang
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-cream" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    Banh Hoa Kem
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn-sm" data-bs-toggle="tab" data-bs-target="#preset-custom" style="font-size:0.8rem;padding:0.4rem 0.8rem;border-radius:8px 8px 0 0">
                                    <i class="bi bi-plus"></i> Tuy chinh
                                </button>
                            </li>
                        </ul>
                    </div>

                    {{-- Tab Content: 3 columns checkbox --}}
                    <div class="tab-content">
                        {{-- Preset: Banh Sinh Nhat Mini --}}
                        <div class="tab-pane fade show active" id="preset-mini">
                            <div class="row g-0">
                                {{-- Col 1: Loai bien the --}}
                                <div class="col-md-4 p-3" style="border-right:1px solid #f0e4e9">
                                    <h6 style="font-size:0.85rem;font-weight:600;margin-bottom:4px">Chon loai Bien the</h6>
                                    <p class="text-muted" style="font-size:0.75rem;margin-bottom:12px">Chon loai de tao Bien the Banh. <strong>Chi duoc chon 1 Muc</strong></p>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-normal" name="variation_type[]" value="normal" checked>
                                        <label class="form-check-label" for="type-normal" style="font-size:0.85rem">Banh thuong</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-no14" name="variation_type[]" value="no14" checked>
                                        <label class="form-check-label" for="type-no14" style="font-size:0.85rem;color:var(--pink)">Banh khong lam duoc size 14, banh ve</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-mini-cream" name="variation_type[]" value="mini-cream">
                                        <label class="form-check-label" for="type-mini-cream" style="font-size:0.85rem">Banh Mini kem Chay, hoa kem, cot khac 2 lop</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-mini12" name="variation_type[]" value="mini12">
                                        <label class="form-check-label" for="type-mini12" style="font-size:0.85rem">Banh mini cao 12cm</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-heart" name="variation_type[]" value="heart">
                                        <label class="form-check-label" for="type-heart" style="font-size:0.85rem;color:var(--pink)">Banh mini Trai tim</label>
                                    </div>
                                </div>

                                {{-- Col 2: Cot banh --}}
                                <div class="col-md-4 p-3" style="border-right:1px solid #f0e4e9">
                                    <h6 style="font-size:0.85rem;font-weight:600;margin-bottom:4px">Chon Cot banh</h6>
                                    <p class="text-muted" style="font-size:0.75rem;margin-bottom:12px">Chon loai Cot banh de tao Bien the</p>
                                    <div style="max-height:250px;overflow-y:auto">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-redvelvet" name="cake_base[]" value="red-velvet">
                                            <label class="form-check-label" for="cot-redvelvet" style="font-size:0.85rem">Gato Red Velvet</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-socola" name="cake_base[]" value="socola">
                                            <label class="form-check-label" for="cot-socola" style="font-size:0.85rem">Gato Socola</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-traxanh" name="cake_base[]" value="tra-xanh">
                                            <label class="form-check-label" for="cot-traxanh" style="font-size:0.85rem">Gato Tra Xanh</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-vani" name="cake_base[]" value="vani" checked>
                                            <label class="form-check-label" for="cot-vani" style="font-size:0.85rem">Gato Vani</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-tiramisu" name="cake_base[]" value="tiramisu">
                                            <label class="form-check-label" for="cot-tiramisu" style="font-size:0.85rem">Gato vani kem tiramisu</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-vietquat" name="cake_base[]" value="viet-quat" checked>
                                            <label class="form-check-label" for="cot-vietquat" style="font-size:0.85rem">Gato Vani Nhan Viet Quat</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-hongcam" name="cake_base[]" value="hong-cam">
                                            <label class="form-check-label" for="cot-hongcam" style="font-size:0.85rem">Hong Cam</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="cot-set" name="cake_base[]" value="set">
                                            <label class="form-check-label" for="cot-set" style="font-size:0.85rem">Set</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Col 3: Size banh --}}
                                <div class="col-md-4 p-3">
                                    <h6 style="font-size:0.85rem;font-weight:600;margin-bottom:4px">Chon Size banh</h6>
                                    <p class="text-muted" style="font-size:0.75rem;margin-bottom:12px">Chon loai Size banh de tao Bien the</p>
                                    <div style="max-height:250px;overflow-y:auto">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-1coc" name="cake_size[]" value="1-coc">
                                            <label class="form-check-label" for="size-1coc" style="font-size:0.85rem">1 coc</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-12coc" name="cake_size[]" value="12-coc">
                                            <label class="form-check-label" for="size-12coc" style="font-size:0.85rem">12 coc</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-12vien" name="cake_size[]" value="12-vien">
                                            <label class="form-check-label" for="size-12vien" style="font-size:0.85rem">12 vien</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-12cm" name="cake_size[]" value="12cm" checked>
                                            <label class="form-check-label" for="size-12cm" style="font-size:0.85rem">12cm</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-12x12" name="cake_size[]" value="12x12cm">
                                            <label class="form-check-label" for="size-12x12" style="font-size:0.85rem">12x12cm</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-14cm" name="cake_size[]" value="14cm" checked>
                                            <label class="form-check-label" for="size-14cm" style="font-size:0.85rem">14cm</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-14cai" name="cake_size[]" value="14cm-cai">
                                            <label class="form-check-label" for="size-14cai" style="font-size:0.85rem">14cm/cai</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-14x12" name="cake_size[]" value="14x12cm">
                                            <label class="form-check-label" for="size-14x12" style="font-size:0.85rem">14x12cm</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-16cm" name="cake_size[]" value="16cm" checked>
                                            <label class="form-check-label" for="size-16cm" style="font-size:0.85rem">16cm</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-18cm" name="cake_size[]" value="18cm" checked>
                                            <label class="form-check-label" for="size-18cm" style="font-size:0.85rem">18cm</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="size-20cm" name="cake_size[]" value="20cm">
                                            <label class="form-check-label" for="size-20cm" style="font-size:0.85rem">20cm</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Preset: Banh Dac Biet --}}
                        <div class="tab-pane fade" id="preset-special">
                            <div class="row g-0">
                                <div class="col-md-4 p-3" style="border-right:1px solid #f0e4e9">
                                    <h6 style="font-size:0.85rem;font-weight:600">Chon loai Bien the</h6>
                                    <p class="text-muted" style="font-size:0.75rem">Cau hinh rieng cho Banh Dac Biet</p>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" style="font-size:0.85rem">Banh thuong</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label" style="font-size:0.85rem">Banh cao cap</label>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3" style="border-right:1px solid #f0e4e9">
                                    <h6 style="font-size:0.85rem;font-weight:600">Chon Cot banh</h6>
                                    <p class="text-muted" style="font-size:0.75rem">Cot banh cho dong Dac Biet</p>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.85rem">Gato Vani</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.85rem">Red Velvet</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.85rem">Socola Bi</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.85rem">Matcha</label></div>
                                </div>
                                <div class="col-md-4 p-3">
                                    <h6 style="font-size:0.85rem;font-weight:600">Chon Size banh</h6>
                                    <p class="text-muted" style="font-size:0.75rem">Size cho dong Dac Biet</p>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.85rem">16cm</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.85rem">18cm</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label" style="font-size:0.85rem">20cm</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.85rem">22cm</label></div>
                                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label" style="font-size:0.85rem">25cm</label></div>
                                </div>
                            </div>
                        </div>

                        {{-- Preset: others (placeholder) --}}
                        <div class="tab-pane fade" id="preset-heart"><div class="p-4 text-center text-muted">Cau hinh bien the cho Banh Trai Tim</div></div>
                        <div class="tab-pane fade" id="preset-fruit"><div class="p-4 text-center text-muted">Cau hinh bien the cho Banh Hoa Qua</div></div>
                        <div class="tab-pane fade" id="preset-rectangle"><div class="p-4 text-center text-muted">Cau hinh bien the cho Banh Hinh Chu Nhat</div></div>
                        <div class="tab-pane fade" id="preset-drawing"><div class="p-4 text-center text-muted">Cau hinh bien the cho Banh Ve Hinh</div></div>
                        <div class="tab-pane fade" id="preset-tier"><div class="p-4 text-center text-muted">Cau hinh bien the cho Banh Tang</div></div>
                        <div class="tab-pane fade" id="preset-cream"><div class="p-4 text-center text-muted">Cau hinh bien the cho Banh Hoa Kem</div></div>
                        <div class="tab-pane fade" id="preset-custom">
                            <div class="p-3">
                                <p class="text-muted" style="font-size:0.85rem">Tuy chinh bien the rieng cho san pham nay</p>
                                <div class="d-flex gap-2 mb-3">
                                    <button type="button" class="btn btn-soft btn-sm">Them Bien The Tuy Chinh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background:#f8fafc;border-top:1px solid #f0e4e9">
                    <div class="d-flex justify-content-between align-items-center" style="font-size:0.8rem">
                        <span class="text-muted"><i class="bi bi-info-circle me-1"></i> Tick chon cac gia tri bien the. Tung to hop se tu dong tao khi luu san pham.</span>
                        <span class="badge badge-soft-pink">Da chon: 2 loai &bull; 2 cot &bull; 4 size</span>
                    </div>
                </div>
            </div>

            {{-- 4. Du lieu san pham (WooCommerce vertical tabs) - TAM COMMENT --}}
            @if(false)
            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-2">
                    <div class="d-flex align-items-center gap-2">
                        <h6 class="mb-0" style="font-size:0.9rem">Du lieu san pham</h6>
                        <span class="text-muted">---</span>
                        <select class="form-select form-select-sm" style="width:180px" id="productType" onchange="toggleProductType()">
                            <option value="simple">San pham don gian</option>
                            <option value="variable">San pham co bien the</option>
                            <option value="grouped">San pham nhom</option>
                        </select>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="form-check" style="font-size:0.85rem">
                            <input class="form-check-input" type="checkbox" id="virtualProduct">
                            <label class="form-check-label" for="virtualProduct">San pham ao</label>
                        </div>
                        <div class="form-check" style="font-size:0.85rem">
                            <input class="form-check-input" type="checkbox" id="downloadProduct">
                            <label class="form-check-label" for="downloadProduct">Co the tai xuong</label>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row g-0">
                        {{-- Left sidebar vertical tabs --}}
                        <div class="col-md-3" style="border-right:1px solid #f0e4e9;background:#f8f0f4">
                            <div class="nav flex-column nav-pills" id="productDataTabs" role="tablist">
                                <button class="nav-link active text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-general" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-wrench me-2" style="width:16px"></i>Cai dat chung
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-inventory" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-box me-2" style="width:16px"></i>Kiem ke kho hang
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-shipping" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-truck me-2" style="width:16px"></i>Van chuyen
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-linked" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-link-45deg me-2" style="width:16px"></i>San pham duoc lien ket
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-attributes" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-sliders me-2" style="width:16px"></i>Thuoc tinh
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-advanced" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-gear me-2" style="width:16px"></i>Nang cao
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-layout" style="font-size:0.82rem;color:#50575e;border-bottom:1px solid #f0e4e9">
                                    <i class="bi bi-layout-text-window me-2" style="width:16px"></i>Bo cuc san pham
                                </button>
                                <button class="nav-link text-start rounded-0 py-2 px-3" data-bs-toggle="pill" data-bs-target="#pdTab-more" style="font-size:0.82rem;color:#50575e">
                                    <i class="bi bi-plus-lg me-2" style="width:16px"></i>Them
                                </button>
                            </div>
                        </div>

                        {{-- Right tab content --}}
                        <div class="col-md-9">
                            <div class="tab-content p-3" id="productDataContent">

                                {{-- Tab: Cai dat chung --}}
                                <div class="tab-pane fade show active" id="pdTab-general">
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Gia thuong (&#273;)</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-sm" name="price" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Gia khuyen mai (&#273;)</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="text" class="form-control form-control-sm" name="sale_price" placeholder="0">
                                                    <a href="#" style="font-size:0.8rem;color:var(--pink);white-space:nowrap">Len lich</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab: Kiem ke kho hang --}}
                                <div class="tab-pane fade" id="pdTab-inventory">
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Ma hang (SKU)</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-sm" name="sku" placeholder="VD: THC-001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Quan ly ton kho</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="manageStock" name="manage_stock">
                                                    <label class="form-check-label" for="manageStock" style="font-size:0.85rem">Bat quan ly ton kho o cap san pham</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Trang thai kho</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-select form-select-sm" name="stock_status">
                                                    <option value="in_stock">Con hang</option>
                                                    <option value="out_of_stock">Het hang</option>
                                                    <option value="pre_order">Dat truoc</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab: Van chuyen --}}
                                <div class="tab-pane fade" id="pdTab-shipping">
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Trong luong (g)</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control form-control-sm" name="weight" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Kich thuoc (D x R x C)</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <input type="number" class="form-control form-control-sm" name="length" placeholder="Dai">
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" class="form-control form-control-sm" name="width" placeholder="Rong">
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" class="form-control form-control-sm" name="height" placeholder="Cao">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Thoi gian lam banh</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-sm" name="prep_time" placeholder="VD: 2-3 gio">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab: San pham duoc lien ket --}}
                                <div class="tab-pane fade" id="pdTab-linked">
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">San pham ban kem</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-sm" name="upsell_ids" placeholder="Tim kiem san pham...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">San pham lien quan</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-sm" name="crosssell_ids" placeholder="Tim kiem san pham...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab: Thuoc tinh --}}
                                <div class="tab-pane fade" id="pdTab-attributes">
                                    <div class="d-flex gap-2 mb-3">
                                        <select class="form-select form-select-sm" style="width:220px" id="newAttrSelect">
                                            <option value="">-- Chon thuoc tinh co san --</option>
                                            <option>Kich thuoc</option>
                                            <option>Cot banh</option>
                                            <option>Mau sac</option>
                                            <option>Huong vi</option>
                                            <option>Lop banh</option>
                                        </select>
                                        <button type="button" class="btn btn-soft btn-sm">Them</button>
                                    </div>

                                    <div id="attributeList">
                                        {{-- Attribute 1: Kich thuoc --}}
                                        <div class="card mb-3 attribute-item" style="border:1px solid #e2e8f0">
                                            <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#f8fafc;cursor:pointer" data-bs-toggle="collapse" data-bs-target="#attr-1">
                                                <strong style="font-size:0.85rem"><i class="bi bi-grip-vertical me-1 text-muted"></i> Kich thuoc</strong>
                                                <div>
                                                    <span class="badge badge-soft-pink me-2">4 gia tri</span>
                                                    <button type="button" class="btn btn-sm text-danger p-0" title="Xoa"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                            <div class="collapse show" id="attr-1">
                                                <div class="card-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Ten thuoc tinh</label>
                                                            <input type="text" class="form-control form-control-sm" name="attributes[0][name]" value="Kich thuoc">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="form-label">Cac gia tri <span class="text-muted">(cach nhau boi dau |)</span></label>
                                                            <input type="text" class="form-control form-control-sm" name="attributes[0][values]" value="14cm | 16cm | 18cm | 20cm" placeholder="VD: 14cm | 16cm | 18cm | 20cm">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="attrVisible0" checked>
                                                                <label class="form-check-label" for="attrVisible0" style="font-size:0.85rem">Hien thi tren trang san pham</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="attrVariation0" checked>
                                                                <label class="form-check-label" for="attrVariation0" style="font-size:0.85rem">Dung cho bien the</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Attribute 2: Cot banh --}}
                                        <div class="card mb-3 attribute-item" style="border:1px solid #e2e8f0">
                                            <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#f8fafc;cursor:pointer" data-bs-toggle="collapse" data-bs-target="#attr-2">
                                                <strong style="font-size:0.85rem"><i class="bi bi-grip-vertical me-1 text-muted"></i> Cot banh</strong>
                                                <div>
                                                    <span class="badge badge-soft-pink me-2">4 gia tri</span>
                                                    <button type="button" class="btn btn-sm text-danger p-0" title="Xoa"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                            <div class="collapse show" id="attr-2">
                                                <div class="card-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Ten thuoc tinh</label>
                                                            <input type="text" class="form-control form-control-sm" name="attributes[1][name]" value="Cot banh">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="form-label">Cac gia tri <span class="text-muted">(cach nhau boi dau |)</span></label>
                                                            <input type="text" class="form-control form-control-sm" name="attributes[1][values]" value="Gato Vani | Red Velvet | Socola | Matcha" placeholder="VD: Gato Vani | Red Velvet | Socola">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                                <label class="form-check-label" style="font-size:0.85rem">Hien thi tren trang san pham</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                                <label class="form-check-label" style="font-size:0.85rem">Dung cho bien the</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab: Nang cao --}}
                                <div class="tab-pane fade" id="pdTab-advanced">
                                    <div class="mb-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Ghi chu mua hang</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control form-control-sm" name="purchase_note" rows="3" placeholder="Ghi chu gui toi khach hang sau khi mua..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0" style="font-size:0.85rem">Thu tu menu</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control form-control-sm" name="menu_order" value="0" style="width:100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab: Bo cuc san pham --}}
                                <div class="tab-pane fade" id="pdTab-layout">
                                    <p class="text-muted" style="font-size:0.85rem">Tuy chon bo cuc hien thi trang san pham se duoc cap nhat sau.</p>
                                </div>

                                {{-- Tab: Them --}}
                                <div class="tab-pane fade" id="pdTab-more">
                                    <p class="text-muted" style="font-size:0.85rem">Cac tuy chon bo sung se duoc them o day.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif

            {{-- 5. Mo ta ngan cua san pham --}}
            <div class="card mb-4">
                <div class="card-header py-2"><h6 class="mb-0" style="font-size:0.9rem">Mo ta ngan cua san pham</h6></div>
                <div class="card-body p-0">
                    <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" rows="6" placeholder="Nhap mo ta ngan gon hien thi tren trang san pham..." style="border:none;border-radius:0;resize:vertical">{{ old('short_description') }}</textarea>
                    @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="card-footer py-1" style="background:#f8fafc;border-top:1px solid #f0e4e9">
                    <span class="text-muted" style="font-size:0.75rem"><i class="bi bi-info-circle me-1"></i>Rich editor se duoc tich hop</span>
                </div>
            </div>

            {{-- 6. SEO Analyzer --}}
            @include('admin.partials.seo-analyzer')

            @push('scripts')
            <script>
                (function(){
                    const nameInput = document.getElementById('name');
                    const slugInput = document.getElementById('slug'); // may not exist in create view
                    const seoSlug = document.getElementById('seoSlug');
                    const seoPreviewUrl = document.getElementById('seoPreviewUrl');
                    const seoPreviewTitle = document.getElementById('seoPreviewTitle');
                    if (!nameInput) return;

                    let isSlugEdited = false;

                    function slugify(text) {
                        return text.toString().toLowerCase()
                            .normalize('NFD')
                            .replace(/[\u0300-\u036f]/g, '')
                            .replace(/[^a-z0-9\s-]/g, '')
                            .trim()
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
                    }

                    function updateAll(s) {
                        if (slugInput && !isSlugEdited) slugInput.value = s;
                        if (seoSlug) seoSlug.value = s;
                        if (seoPreviewUrl) seoPreviewUrl.textContent = 'thuhuongcake.vn/san-pham/' + (s || 'slug-san-pham');
                        if (seoPreviewTitle) seoPreviewTitle.textContent = (nameInput.value.trim() || 'Tieu de san pham') + ' - Thu Huong Cake';
                    }

                    nameInput.addEventListener('input', function(){
                        const s = slugify(this.value);
                        updateAll(s);
                    });

                    if (slugInput) {
                        slugInput.addEventListener('input', function(){
                            isSlugEdited = this.value.trim() !== '';
                            if (seoSlug) seoSlug.value = this.value.trim();
                            if (seoPreviewUrl) seoPreviewUrl.textContent = 'thuhuongcake.vn/san-pham/' + (this.value.trim() || slugify(nameInput.value || ''));
                        });
                    }
                })();
            </script>
            @endpush

        </div>

        {{-- ================================================================ --}}
        {{-- RIGHT COLUMN --}}
        {{-- ================================================================ --}}
        <div class="col-lg-4">

            {{-- 1. Xuat ban --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-send me-2 text-muted"></i>Xuat ban</h6></div>
                <div class="card-body">
                    {{-- Save draft + Preview --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button type="button" class="btn btn-soft btn-sm">Luu nhap</button>
                        <button type="button" class="btn btn-soft btn-sm">Xem truoc</button>
                    </div>
                    <hr class="my-2">
                    {{-- Status --}}
                    <div class="d-flex justify-content-between align-items-center mb-2" style="font-size:0.85rem">
                        <span><i class="bi bi-pin-angle me-1 text-muted"></i> Trang thai: <strong>Ban nhap</strong></span>
                        <a href="#" style="color:var(--pink);font-size:0.8rem">Chinh sua</a>
                    </div>
                    {{-- Visibility --}}
                    <div class="d-flex justify-content-between align-items-center mb-2" style="font-size:0.85rem">
                        <span><i class="bi bi-eye me-1 text-muted"></i> Hien thi: <strong>Cong khai</strong></span>
                        <a href="#" style="color:var(--pink);font-size:0.8rem">Chinh sua</a>
                    </div>
                    {{-- Publish date --}}
                    <div class="d-flex justify-content-between align-items-center mb-2" style="font-size:0.85rem">
                        <span><i class="bi bi-calendar me-1 text-muted"></i> Xuat ban: <strong>ngay bay gio</strong></span>
                        <a href="#" style="color:var(--pink);font-size:0.8rem">Chinh sua</a>
                    </div>
                    <hr class="my-2">
                    {{-- Lock modified date --}}
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="lockModifiedDate">
                        <label class="form-check-label" for="lockModifiedDate" style="font-size:0.85rem">Lock Modified Date</label>
                    </div>
                    {{-- SEO Score --}}
                    <div class="d-flex align-items-center gap-2 mb-2" style="font-size:0.85rem">
                        <span>SEO score:</span>
                        <span class="badge badge-soft-pink">4 / 100</span>
                    </div>
                    {{-- Copy to draft --}}
                    <div class="mb-3">
                        <a href="#" style="font-size:0.8rem;color:var(--pink)">Sao chep toi mot ban nhap</a>
                    </div>
                    <hr class="my-2">
                    {{-- Publish button --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-pink">
                            <i class="bi bi-check-lg me-1"></i> Xuat ban
                        </button>
                    </div>
                </div>
            </div>

            {{-- 2. Anh san pham --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-image me-2 text-muted"></i>Anh san pham</h6></div>
                <div class="card-body">
                    <div style="width:100%;aspect-ratio:1;border:2px dashed #e2e8f0;border-radius:12px;display:flex;align-items:center;justify-content:center;cursor:pointer;background:#f8fafc" onclick="this.querySelector('input').click()">
                        <div class="text-center">
                            <i class="bi bi-image" style="font-size:2.5rem;color:#d3c4ca"></i>
                            <div style="font-size:0.85rem;color:var(--pink);margin-top:0.5rem">Dat anh san pham</div>
                        </div>
                        <input type="file" name="featured_image" accept="image/*" hidden>
                    </div>
                </div>
            </div>

            {{-- 3. Album hinh anh san pham --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-images me-2 text-muted"></i>Album hinh anh san pham</h6></div>
                <div class="card-body">
                    <div style="border:2px dashed #e2e8f0;border-radius:12px;padding:1.5rem;text-align:center;cursor:pointer;background:#f8fafc" onclick="this.querySelector('input').click()">
                        <i class="bi bi-images" style="font-size:2rem;color:#d3c4ca"></i>
                        <div style="font-size:0.85rem;color:var(--pink);margin-top:0.5rem">Them anh thu vien san pham</div>
                        <input type="file" name="gallery[]" accept="image/*" multiple hidden>
                    </div>
                </div>
            </div>

            {{-- 4. Danh muc san pham --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-folder2 me-2 text-muted"></i>Danh muc san pham</h6></div>
                <div class="card-body p-0">
                    {{-- Category tabs --}}
                    <ul class="nav nav-tabs px-3 pt-2" style="border-bottom:1px solid #f0e4e9;font-size:0.82rem" id="categoryTabs">
                        <li class="nav-item">
                            <button class="nav-link active py-1 px-2" data-bs-toggle="tab" data-bs-target="#catTab-all" style="font-size:0.82rem">Tat ca danh muc</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-1 px-2" data-bs-toggle="tab" data-bs-target="#catTab-popular" style="font-size:0.82rem">Dung nhieu nhat</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active p-3" id="catTab-all" style="max-height:200px;overflow-y:auto">
                            @foreach($categories as $cat)
                            <div class="form-check mb-2{{ $cat->parent_id ? ' ms-3' : '' }}">
                                <input class="form-check-input" type="checkbox" id="cat{{ $cat->id }}" name="categories[]" value="{{ $cat->id }}" {{ in_array($cat->id, old('categories', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat{{ $cat->id }}" style="font-size:0.85rem">{{ $cat->name }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade p-3" id="catTab-popular" style="max-height:200px;overflow-y:auto">
                            @foreach($categories->take(5) as $cat)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" {{ in_array($cat->id, old('categories', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" style="font-size:0.85rem">{{ $cat->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-3 pb-3">
                        <a href="#" style="font-size:0.8rem;color:var(--pink)" onclick="document.getElementById('newCatSection').style.display=document.getElementById('newCatSection').style.display==='none'?'block':'none';return false">
                            <i class="bi bi-plus me-1"></i>Them danh muc moi
                        </a>
                        <div id="newCatSection" style="display:none" class="mt-2">
                            <input type="text" class="form-control form-control-sm mb-2" placeholder="Ten danh muc moi">
                            <select class="form-select form-select-sm mb-2">
                                <option value="">-- Danh muc cha --</option>
                                <option>Banh sinh nhat</option>
                                <option>Set qua tang</option>
                                <option>Banh dac biet</option>
                            </select>
                            <button type="button" class="btn btn-soft btn-sm">Them danh muc moi</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 5. The san pham --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-tags me-2 text-muted"></i>The san pham</h6></div>
                <div class="card-body">
                    <div class="d-flex gap-2 mb-2">
                        <input type="text" class="form-control form-control-sm" placeholder="Nhap the..." name="tags">
                        <button type="button" class="btn btn-soft btn-sm">Them</button>
                    </div>
                    <div class="form-text mb-2">Phan tach cac the bang dau phay</div>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge badge-soft-pink">sinh nhat <button type="button" class="btn-close btn-close-sm ms-1" style="font-size:0.5rem"></button></span>
                        <span class="badge badge-soft-pink">dau tay <button type="button" class="btn-close btn-close-sm ms-1" style="font-size:0.5rem"></button></span>
                        <span class="badge badge-soft-pink">premium <button type="button" class="btn-close btn-close-sm ms-1" style="font-size:0.5rem"></button></span>
                    </div>
                </div>
            </div>

            {{-- 6. Thuong hieu --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-shop me-2 text-muted"></i>Thuong hieu</h6></div>
                <div class="card-body p-0">
                    <ul class="nav nav-tabs px-3 pt-2" style="border-bottom:1px solid #f0e4e9;font-size:0.82rem">
                        <li class="nav-item">
                            <button class="nav-link active py-1 px-2" data-bs-toggle="tab" data-bs-target="#brandTab-all" style="font-size:0.82rem">Tat ca thuong hieu</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-1 px-2" data-bs-toggle="tab" data-bs-target="#brandTab-popular" style="font-size:0.82rem">Dung nhieu nhat</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active p-3" id="brandTab-all" style="max-height:150px;overflow-y:auto">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand1" name="brand" value="1" checked>
                                <label class="form-check-label" for="brand1" style="font-size:0.85rem">Thu Huong Cake</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand2" name="brand" value="2">
                                <label class="form-check-label" for="brand2" style="font-size:0.85rem">Thuong hieu khac</label>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3" id="brandTab-popular" style="max-height:150px;overflow-y:auto">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label" style="font-size:0.85rem">Thu Huong Cake</label>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 pb-3">
                        <a href="#" style="font-size:0.8rem;color:var(--pink)"><i class="bi bi-plus me-1"></i>Them thuong hieu moi</a>
                    </div>
                </div>
            </div>

            {{-- 7. Hien thi --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-stars me-2 text-muted"></i>Hien thi</h6></div>
                <div class="card-body">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured" style="font-size:0.85rem">San pham noi bat</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_hot" name="is_hot" value="1" {{ old('is_hot') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_hot" style="font-size:0.85rem">San pham Hot</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_new" name="is_new" value="1" {{ old('is_new', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_new" style="font-size:0.85rem">San pham Moi</label>
                    </div>
                    <hr>
                    <div>
                        <label class="form-label" style="font-size:0.85rem">Thu tu hien thi</label>
                        <input type="number" class="form-control form-control-sm" name="sort_order" value="{{ old('sort_order', 0) }}">
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@push('styles')
<style>
    #productDataTabs .nav-link.active {
        background: #fff !important;
        color: var(--pink) !important;
        font-weight: 600;
        border-left: 3px solid var(--pink);
    }
    #productDataTabs .nav-link:hover:not(.active) {
        background: #f0e4e9 !important;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/seo-analyzer.js') }}"></script>
@endpush
@endsection
