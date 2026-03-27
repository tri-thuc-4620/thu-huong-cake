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

        {{-- Meta Title --}}
        <div class="mb-3">
            <label class="form-label" style="font-size:0.85rem">Meta Title</label>
            <input type="text" class="form-control form-control-sm" id="seoMetaTitle" name="meta_title" placeholder="Tieu de SEO (50-60 ky tu)">
            <div class="d-flex justify-content-between mt-1">
                <small class="text-muted" id="seoTitleHint"></small>
                <small id="seoTitleCount" style="font-size:0.75rem">0 / 60</small>
            </div>
        </div>

        {{-- Meta Description --}}
        <div class="mb-3">
            <label class="form-label" style="font-size:0.85rem">Meta Description</label>
            <textarea class="form-control form-control-sm" id="seoMetaDesc" name="meta_description" rows="2" placeholder="Mo ta SEO (120-160 ky tu)"></textarea>
            <div class="d-flex justify-content-between mt-1">
                <small class="text-muted" id="seoDescHint"></small>
                <small id="seoDescCount" style="font-size:0.75rem">0 / 160</small>
            </div>
        </div>

        {{-- Slug --}}
        <div class="mb-3">
            <label class="form-label" style="font-size:0.85rem">URL Slug</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text" style="font-size:0.8rem">thuhuongcake.vn/product/</span>
                <input type="text" class="form-control" id="seoSlug" name="slug" placeholder="slug-san-pham">
            </div>
        </div>

        {{-- SEO Analysis Sections (collapsible) --}}

        {{-- SEO Co ban --}}
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoBasicSection">
                <strong style="font-size:0.85rem">SEO co ban</strong>
                <span class="badge" id="seoBasicBadge">0 / 7</span>
            </div>
            <div class="collapse show" id="seoBasicSection">
                <ul class="list-unstyled mb-0" id="seoBasicList" style="font-size:0.82rem">
                    <!-- JS will populate -->
                </ul>
            </div>
        </div>

        <hr style="border-color:#f0e4e9">

        {{-- Bo sung --}}
        <div class="mb-2">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoExtraSection">
                <strong style="font-size:0.85rem">Bo sung</strong>
                <span class="badge" id="seoExtraBadge">0 / 5</span>
            </div>
            <div class="collapse show" id="seoExtraSection">
                <ul class="list-unstyled mb-0" id="seoExtraList" style="font-size:0.82rem">
                    <!-- JS will populate -->
                </ul>
            </div>
        </div>

        <hr style="border-color:#f0e4e9">

        {{-- Kha nang doc --}}
        <div class="mb-0">
            <div class="d-flex justify-content-between align-items-center py-2" style="cursor:pointer" data-bs-toggle="collapse" data-bs-target="#seoReadSection">
                <strong style="font-size:0.85rem">Kha nang doc</strong>
                <span class="badge" id="seoReadBadge">0 / 3</span>
            </div>
            <div class="collapse show" id="seoReadSection">
                <ul class="list-unstyled mb-0" id="seoReadList" style="font-size:0.82rem">
                    <!-- JS will populate -->
                </ul>
            </div>
        </div>
    </div>
</div>
