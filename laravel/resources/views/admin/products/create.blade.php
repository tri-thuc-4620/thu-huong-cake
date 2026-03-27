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

    <div class="row g-4">
        {{-- LEFT COLUMN --}}
        <div class="col-lg-8">

            {{-- Thong tin co ban --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-info-circle me-2 text-muted"></i>Thong tin co ban</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Ten san pham <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="VD: Banh kem dau tay Premium" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Tu dong tao tu ten">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ma SKU</label>
                            <input type="text" class="form-control" name="sku" placeholder="VD: THC-001">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Loai san pham + Tabs --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0"><i class="bi bi-box-seam me-2 text-muted"></i>Du lieu san pham</h6>
                    <select class="form-select form-select-sm" style="width:200px" id="productType" onchange="toggleProductType()">
                        <option value="simple">San pham don gian</option>
                        <option value="variable">San pham co bien the</option>
                    </select>
                </div>
                <div class="card-body p-0">
                    {{-- Tabs --}}
                    <ul class="nav nav-tabs px-3 pt-3" id="productTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-general">
                                <i class="bi bi-tag me-1"></i> Chung
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-inventory">
                                <i class="bi bi-box me-1"></i> Kho hang
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-attributes">
                                <i class="bi bi-sliders me-1"></i> Thuoc tinh
                            </button>
                        </li>
                        <li class="nav-item" id="tabVariations" style="display:none">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-variations">
                                <i class="bi bi-grid-3x3 me-1"></i> Bien the
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-shipping">
                                <i class="bi bi-truck me-1"></i> Giao hang
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content p-3">

                        {{-- TAB: Chung --}}
                        <div class="tab-pane fade show active" id="tab-general">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Gia ban (&#273;) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="price" placeholder="350000">
                                    <div class="form-text">Gia goc cua san pham</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gia khuyen mai (&#273;)</label>
                                    <input type="text" class="form-control" name="sale_price" placeholder="300000">
                                    <div class="form-text">De trong neu khong khuyen mai</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ngay bat dau KM</label>
                                    <input type="date" class="form-control" name="sale_start">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ngay ket thuc KM</label>
                                    <input type="date" class="form-control" name="sale_end">
                                </div>
                            </div>
                        </div>

                        {{-- TAB: Kho hang --}}
                        <div class="tab-pane fade" id="tab-inventory">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Ma SKU</label>
                                    <input type="text" class="form-control" name="sku2" placeholder="THC-001">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Trang thai kho</label>
                                    <select class="form-select" name="stock_status">
                                        <option value="in_stock">Con banh</option>
                                        <option value="out_of_stock">Het banh</option>
                                        <option value="pre_order">Dat truoc</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="manageStock" onchange="document.getElementById('stockQtyRow').style.display=this.checked?'flex':'none'">
                                        <label class="form-check-label" for="manageStock">Quan ly ton kho</label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="stockQtyRow" style="display:none">
                                    <label class="form-label">So luong ton kho</label>
                                    <input type="number" class="form-control" name="stock_quantity" value="0">
                                </div>
                                <div class="col-md-6" id="stockLowRow" style="display:none">
                                    <label class="form-label">Nguong canh bao het hang</label>
                                    <input type="number" class="form-control" name="low_stock_threshold" value="5">
                                </div>
                            </div>
                        </div>

                        {{-- TAB: Thuoc tinh --}}
                        <div class="tab-pane fade" id="tab-attributes">
                            <p class="text-muted" style="font-size:0.85rem">Them thuoc tinh cho san pham (VD: Kich thuoc, Cot banh, Mau sac...). Thuoc tinh dung de tao bien the.</p>

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

                            <div class="d-flex gap-2">
                                <select class="form-select form-select-sm" style="width:200px" id="newAttrSelect">
                                    <option value="">-- Chon thuoc tinh co san --</option>
                                    <option>Kich thuoc</option>
                                    <option>Cot banh</option>
                                    <option>Mau sac</option>
                                    <option>Huong vi</option>
                                    <option>Lop banh</option>
                                </select>
                                <button type="button" class="btn btn-soft btn-sm">Them</button>
                                <span class="text-muted mx-2" style="font-size:0.85rem;line-height:2">hoac</span>
                                <button type="button" class="btn btn-outline-pink btn-sm">
                                    <i class="bi bi-plus me-1"></i> Tao thuoc tinh moi
                                </button>
                            </div>
                        </div>

                        {{-- TAB: Bien the --}}
                        <div class="tab-pane fade" id="tab-variations">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="text-muted mb-0" style="font-size:0.85rem">Moi bien the co the co gia, kho hang, anh, SKU rieng.</p>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-pink btn-sm" id="btnGenVariations">
                                        <i class="bi bi-grid-3x3 me-1"></i> Tao tu dong tu thuoc tinh
                                    </button>
                                    <button type="button" class="btn btn-soft btn-sm">
                                        <i class="bi bi-plus me-1"></i> Them thu cong
                                    </button>
                                </div>
                            </div>

                            <div id="variationList">
                                {{-- Variation 1 --}}
                                <div class="card mb-2 variation-item" style="border:1px solid #e2e8f0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#fff0f6;cursor:pointer" data-bs-toggle="collapse" data-bs-target="#var-1">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-grip-vertical text-muted"></i>
                                            <span class="badge badge-soft-pink">14cm</span>
                                            <span class="badge badge-soft-info">Gato Vani</span>
                                            <span class="text-muted mx-1">—</span>
                                            <strong style="font-size:0.85rem">250,000 &#273;</strong>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge badge-soft-success" style="font-size:0.7rem">Con banh</span>
                                            <button type="button" class="btn btn-sm text-danger p-0"><i class="bi bi-trash"></i></button>
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="collapse" id="var-1">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Kich thuoc</label>
                                                    <select class="form-select form-select-sm">
                                                        <option selected>14cm</option>
                                                        <option>16cm</option>
                                                        <option>18cm</option>
                                                        <option>20cm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Cot banh</label>
                                                    <select class="form-select form-select-sm">
                                                        <option selected>Gato Vani</option>
                                                        <option>Red Velvet</option>
                                                        <option>Socola</option>
                                                        <option>Matcha</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Gia ban (&#273;)</label>
                                                    <input type="text" class="form-control form-control-sm" value="250000">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Gia KM (&#273;)</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="De trong">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">SKU</label>
                                                    <input type="text" class="form-control form-control-sm" value="THC-001-14-GV">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Ton kho</label>
                                                    <input type="number" class="form-control form-control-sm" value="20">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trong luong (g)</label>
                                                    <input type="number" class="form-control form-control-sm" value="500">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trang thai</label>
                                                    <select class="form-select form-select-sm">
                                                        <option value="in_stock">Con banh</option>
                                                        <option value="out_of_stock">Het banh</option>
                                                        <option value="pre_order">Dat truoc</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Anh bien the</label>
                                                    <input type="file" class="form-control form-control-sm" accept="image/*">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Mo ta bien the</label>
                                                    <textarea class="form-control form-control-sm" rows="2" placeholder="Mo ta rieng cho bien the nay..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Variation 2 --}}
                                <div class="card mb-2 variation-item" style="border:1px solid #e2e8f0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#f8fafc;cursor:pointer" data-bs-toggle="collapse" data-bs-target="#var-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-grip-vertical text-muted"></i>
                                            <span class="badge badge-soft-pink">14cm</span>
                                            <span class="badge badge-soft-info">Red Velvet</span>
                                            <span class="text-muted mx-1">—</span>
                                            <strong style="font-size:0.85rem">280,000 &#273;</strong>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge badge-soft-success" style="font-size:0.7rem">Con banh</span>
                                            <button type="button" class="btn btn-sm text-danger p-0"><i class="bi bi-trash"></i></button>
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="collapse" id="var-2">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Kich thuoc</label>
                                                    <select class="form-select form-select-sm"><option selected>14cm</option></select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Cot banh</label>
                                                    <select class="form-select form-select-sm"><option selected>Red Velvet</option></select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Gia ban (&#273;)</label>
                                                    <input type="text" class="form-control form-control-sm" value="280000">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Gia KM (&#273;)</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="De trong">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">SKU</label>
                                                    <input type="text" class="form-control form-control-sm" value="THC-001-14-RV">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Ton kho</label>
                                                    <input type="number" class="form-control form-control-sm" value="15">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trong luong (g)</label>
                                                    <input type="number" class="form-control form-control-sm" value="500">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trang thai</label>
                                                    <select class="form-select form-select-sm"><option selected>Con banh</option></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Variation 3 --}}
                                <div class="card mb-2 variation-item" style="border:1px solid #e2e8f0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#f8fafc;cursor:pointer" data-bs-toggle="collapse" data-bs-target="#var-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-grip-vertical text-muted"></i>
                                            <span class="badge badge-soft-pink">16cm</span>
                                            <span class="badge badge-soft-info">Gato Vani</span>
                                            <span class="text-muted mx-1">—</span>
                                            <strong style="font-size:0.85rem">350,000 &#273;</strong>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge badge-soft-success" style="font-size:0.7rem">Con banh</span>
                                            <button type="button" class="btn btn-sm text-danger p-0"><i class="bi bi-trash"></i></button>
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="collapse" id="var-3">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Kich thuoc</label>
                                                    <select class="form-select form-select-sm"><option selected>16cm</option></select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Cot banh</label>
                                                    <select class="form-select form-select-sm"><option selected>Gato Vani</option></select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Gia ban (&#273;)</label>
                                                    <input type="text" class="form-control form-control-sm" value="350000">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Gia KM (&#273;)</label>
                                                    <input type="text" class="form-control form-control-sm" value="300000">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">SKU</label>
                                                    <input type="text" class="form-control form-control-sm" value="THC-001-16-GV">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Ton kho</label>
                                                    <input type="number" class="form-control form-control-sm" value="30">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trong luong (g)</label>
                                                    <input type="number" class="form-control form-control-sm" value="700">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Trang thai</label>
                                                    <select class="form-select form-select-sm"><option selected>Con banh</option></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Variation 4 --}}
                                <div class="card mb-2 variation-item" style="border:1px solid #e2e8f0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#f8fafc;cursor:pointer" data-bs-toggle="collapse" data-bs-target="#var-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-grip-vertical text-muted"></i>
                                            <span class="badge badge-soft-pink">16cm</span>
                                            <span class="badge badge-soft-info">Red Velvet</span>
                                            <span class="text-muted mx-1">—</span>
                                            <strong style="font-size:0.85rem">380,000 &#273;</strong>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge badge-soft-warning" style="font-size:0.7rem">Sap het</span>
                                            <button type="button" class="btn btn-sm text-danger p-0"><i class="bi bi-trash"></i></button>
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="collapse" id="var-4"></div>
                                </div>

                                {{-- Variation 5 --}}
                                <div class="card mb-2 variation-item" style="border:1px solid #e2e8f0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-2" style="background:#f8fafc;cursor:pointer">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-grip-vertical text-muted"></i>
                                            <span class="badge badge-soft-pink">18cm</span>
                                            <span class="badge badge-soft-info">Gato Vani</span>
                                            <span class="text-muted mx-1">—</span>
                                            <strong style="font-size:0.85rem">450,000 &#273;</strong>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge badge-soft-success" style="font-size:0.7rem">Con banh</span>
                                            <button type="button" class="btn btn-sm text-danger p-0"><i class="bi bi-trash"></i></button>
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-muted text-center py-2" style="font-size:0.8rem">
                                Hien thi 5 / 16 bien the &bull; <a href="#" style="color:var(--pink)">Xem tat ca</a>
                            </div>
                        </div>

                        {{-- TAB: Giao hang --}}
                        <div class="tab-pane fade" id="tab-shipping">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Trong luong (g)</label>
                                    <input type="number" class="form-control" name="weight" placeholder="500">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Thoi gian lam banh</label>
                                    <input type="text" class="form-control" name="prep_time" placeholder="VD: 2-3 gio">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Dat truoc toi thieu</label>
                                    <input type="text" class="form-control" name="advance_order" placeholder="VD: 4 gio">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Mo ta --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-text-paragraph me-2 text-muted"></i>Mo ta san pham</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Mo ta ngan</label>
                        <textarea class="form-control" name="short_description" rows="3" placeholder="Mo ta ngan gon hien thi tren trang danh sach..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta chi tiet</label>
                        <textarea class="form-control" name="description" rows="8" placeholder="Mo ta day du san pham, thanh phan, huong dan bao quan..."></textarea>
                        <div class="form-text">Rich editor se duoc tich hop sau</div>
                    </div>
                </div>
            </div>

            {{-- SEO --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-search me-2 text-muted"></i>SEO</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" placeholder="Tieu de hien thi tren Google">
                        <div class="form-text">0 / 60 ky tu</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description" rows="2" placeholder="Mo ta hien thi tren Google"></textarea>
                        <div class="form-text">0 / 160 ky tu</div>
                    </div>
                    {{-- SEO Preview --}}
                    <div style="background:#f8fafc;border-radius:10px;padding:1rem;border:1px solid #e2e8f0">
                        <div style="font-size:0.7rem;color:#94a3b8;margin-bottom:4px">Xem truoc tren Google:</div>
                        <div style="font-size:1rem;color:#1a0dab;font-weight:500">Banh kem dau tay Premium - Thu Huong Cake</div>
                        <div style="font-size:0.8rem;color:#006621">thuhuongcake.wuaze.com/product/banh-kem-dau-tay</div>
                        <div style="font-size:0.8rem;color:#545454">Banh kem dau tay tuoi ngon, lam tu nguyen lieu sach, giao hang nhanh trong 1 gio...</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN --}}
        <div class="col-lg-4">

            {{-- Xuat ban --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-send me-2 text-muted"></i>Xuat ban</h6></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span style="font-size:0.85rem"><i class="bi bi-eye me-1 text-muted"></i> Trang thai:</span>
                        <select class="form-select form-select-sm" style="width:140px">
                            <option>Ban nhap</option>
                            <option selected>Xuat ban</option>
                            <option>An</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span style="font-size:0.85rem"><i class="bi bi-calendar me-1 text-muted"></i> Ngay dang:</span>
                        <span style="font-size:0.85rem" class="text-muted">Ngay bay gio</span>
                    </div>
                    <hr>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-pink">
                            <i class="bi bi-check-lg me-1"></i> Luu san pham
                        </button>
                        <button type="button" class="btn btn-soft btn-sm">Luu ban nhap</button>
                    </div>
                </div>
            </div>

            {{-- Danh muc --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-folder2 me-2 text-muted"></i>Danh muc</h6></div>
                <div class="card-body" style="max-height:200px;overflow-y:auto">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat1" checked>
                        <label class="form-check-label" for="cat1" style="font-size:0.85rem">Banh sinh nhat</label>
                    </div>
                    <div class="form-check mb-2 ms-3">
                        <input class="form-check-input" type="checkbox" id="cat2">
                        <label class="form-check-label" for="cat2" style="font-size:0.85rem">Banh sinh nhat mini</label>
                    </div>
                    <div class="form-check mb-2 ms-3">
                        <input class="form-check-input" type="checkbox" id="cat3" checked>
                        <label class="form-check-label" for="cat3" style="font-size:0.85rem">Banh sinh nhat hoa qua</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat4">
                        <label class="form-check-label" for="cat4" style="font-size:0.85rem">Set qua tang</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat5">
                        <label class="form-check-label" for="cat5" style="font-size:0.85rem">Banh bong lan trung muoi</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat6">
                        <label class="form-check-label" for="cat6" style="font-size:0.85rem">Banh dac biet</label>
                    </div>
                    <hr class="my-2">
                    <a href="#" style="font-size:0.8rem;color:var(--pink)"><i class="bi bi-plus me-1"></i>Them danh muc moi</a>
                </div>
            </div>

            {{-- The san pham --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-tags me-2 text-muted"></i>The san pham</h6></div>
                <div class="card-body">
                    <input type="text" class="form-control form-control-sm" placeholder="Nhap the, cach nhau boi dau phay" name="tags">
                    <div class="form-text">VD: sinh nhat, dau tay, premium</div>
                    <div class="d-flex flex-wrap gap-1 mt-2">
                        <span class="badge badge-soft-pink">sinh nhat <button type="button" class="btn-close btn-close-sm ms-1" style="font-size:0.5rem"></button></span>
                        <span class="badge badge-soft-pink">dau tay <button type="button" class="btn-close btn-close-sm ms-1" style="font-size:0.5rem"></button></span>
                        <span class="badge badge-soft-pink">premium <button type="button" class="btn-close btn-close-sm ms-1" style="font-size:0.5rem"></button></span>
                    </div>
                </div>
            </div>

            {{-- Anh san pham --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-image me-2 text-muted"></i>Anh san pham</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" style="font-size:0.85rem">Anh dai dien</label>
                        <div style="width:100%;aspect-ratio:1;border:2px dashed #e2e8f0;border-radius:12px;display:flex;align-items:center;justify-content:center;cursor:pointer;background:#f8fafc" onclick="this.querySelector('input').click()">
                            <div class="text-center text-muted">
                                <i class="bi bi-cloud-arrow-up" style="font-size:2rem"></i>
                                <div style="font-size:0.8rem">Click de chon anh</div>
                            </div>
                            <input type="file" name="featured_image" accept="image/*" hidden>
                        </div>
                    </div>
                    <div>
                        <label class="form-label" style="font-size:0.85rem">Thu vien anh</label>
                        <div class="d-flex flex-wrap gap-2">
                            <div style="width:70px;height:70px;border:2px dashed #e2e8f0;border-radius:8px;display:flex;align-items:center;justify-content:center;cursor:pointer;background:#f8fafc" onclick="this.querySelector('input').click()">
                                <i class="bi bi-plus" style="font-size:1.5rem;color:#94a3b8"></i>
                                <input type="file" name="gallery[]" accept="image/*" multiple hidden>
                            </div>
                        </div>
                        <div class="form-text mt-1">Keo tha de sap xep thu tu</div>
                    </div>
                </div>
            </div>

            {{-- Hien thi --}}
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-stars me-2 text-muted"></i>Hien thi</h6></div>
                <div class="card-body">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured">
                        <label class="form-check-label" for="is_featured" style="font-size:0.85rem">San pham noi bat</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_hot" name="is_hot">
                        <label class="form-check-label" for="is_hot" style="font-size:0.85rem">San pham Hot 🔥</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_new" name="is_new" checked>
                        <label class="form-check-label" for="is_new" style="font-size:0.85rem">San pham Moi</label>
                    </div>
                    <hr>
                    <div>
                        <label class="form-label" style="font-size:0.85rem">Thu tu hien thi</label>
                        <input type="number" class="form-control form-control-sm" name="sort_order" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
function toggleProductType() {
    const type = document.getElementById('productType').value;
    const tabVar = document.getElementById('tabVariations');
    if (type === 'variable') {
        tabVar.style.display = 'block';
    } else {
        tabVar.style.display = 'none';
    }
}

// Manage stock toggle
document.getElementById('manageStock')?.addEventListener('change', function() {
    document.getElementById('stockLowRow').style.display = this.checked ? 'flex' : 'none';
});
</script>
@endpush
@endsection
