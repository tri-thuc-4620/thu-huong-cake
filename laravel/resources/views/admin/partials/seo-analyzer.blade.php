{{-- SEO Analyzer - Rank Math Style --}}
<div class="card mb-4" id="seoAnalyzer">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0"><i class="bi bi-search me-2 text-muted"></i>SEO</h6>
        <span class="badge" id="seoScoreBadge" style="font-size:0.8rem">0 / 100</span>
    </div>
    <div class="card-body">
        {{-- Focus Keyword --}}
        <div class="mb-3">
            <label class="form-label" style="font-size:0.85rem;font-weight:600">Tu khoa chinh <i class="bi bi-question-circle text-muted" title="Tu khoa ban muon SEO"></i></label>
            <div class="d-flex gap-2">
                <input type="text" class="form-control form-control-sm" id="seoKeyword" name="focus_keyword" placeholder="VD: Banh sinh nhat trang tri trai do">
                <span class="text-muted" style="font-size:0.8rem;white-space:nowrap;line-height:2.2" id="seoScoreNum">0 / 100</span>
            </div>
        </div>

        {{-- Google Preview --}}
        <div class="mb-3" style="background:#f8fafc;border-radius:10px;padding:1rem;border:1px solid #e2e8f0">
            <div style="font-size:0.7rem;color:#94a3b8;margin-bottom:6px">Xem truoc tren Google:</div>
            <div style="font-size:1.05rem;color:#1a0dab;font-weight:500" id="seoPreviewTitle">Tieu de san pham - Thu Huong Cake</div>
            <div style="font-size:0.8rem;color:#006621" id="seoPreviewUrl">thuhuongcake.vn/product/slug-san-pham</div>
            <div style="font-size:0.8rem;color:#545454" id="seoPreviewDesc">Mo ta san pham se hien thi o day...</div>
        </div>

        <input type="hidden" id="seoMetaTitle" name="meta_title">
        <input type="hidden" id="seoMetaDesc" name="meta_description">
        <input type="hidden" id="seoSlug" name="slug">

        {{-- SEO Co ban --}}
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoBasicSection">
                <strong style="font-size:0.85rem">SEO co ban</strong>
                <span id="seoBasicBadge"></span>
            </div>
            <div class="collapse show" id="seoBasicSection">
                <ul class="list-unstyled mb-0" id="seoBasicList" style="font-size:0.82rem"></ul>
            </div>
        </div>

        <hr style="border-color:#f0e4e9">

        {{-- Bo sung --}}
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoExtraSection">
                <strong style="font-size:0.85rem">Bo sung</strong>
                <span id="seoExtraBadge"></span>
            </div>
            <div class="collapse show" id="seoExtraSection">
                <ul class="list-unstyled mb-0" id="seoExtraList" style="font-size:0.82rem"></ul>
            </div>
        </div>

        <hr style="border-color:#f0e4e9">

        {{-- Kha nang doc tieu de --}}
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoReadTitleSection">
                <strong style="font-size:0.85rem">Kha nang doc tieu de</strong>
                <span id="seoReadTitleBadge"></span>
            </div>
            <div class="collapse show" id="seoReadTitleSection">
                <ul class="list-unstyled mb-0" id="seoReadTitleList" style="font-size:0.82rem"></ul>
            </div>
        </div>

        <hr style="border-color:#f0e4e9">

        {{-- Kha nang doc noi dung --}}
        <div class="mb-0">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoReadContentSection">
                <strong style="font-size:0.85rem">Kha nang doc noi dung</strong>
                <span id="seoReadContentBadge"></span>
            </div>
            <div class="collapse show" id="seoReadContentSection">
                <ul class="list-unstyled mb-0" id="seoReadContentList" style="font-size:0.82rem"></ul>
            </div>
        </div>
    </div>
</div>
