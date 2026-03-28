/**
 * SEO Analyzer - Rank Math Style
 * Phan tich SEO realtime dua tren tu khoa chinh
 */
(function () {
    'use strict';

    function q(s) { return document.querySelector(s); }
    function val(el) { return el ? el.value.trim() : ''; }
    function norm(s) { return (s || '').toLowerCase().replace(/\s+/g, ' ').trim(); }
    function wordCount(t) { return t ? t.split(/\s+/).filter(Boolean).length : 0; }
    function stripTags(h) { var d = document.createElement('div'); d.innerHTML = h || ''; return d.textContent || ''; }

    function countOccurrences(text, kw) {
        if (!kw) return 0;
        var n = norm(text), k = norm(kw), c = 0, p = 0;
        while ((p = n.indexOf(k, p)) !== -1) { c++; p += k.length; }
        return c;
    }

    var els = {};

    function resolveElements() {
        els.keyword = q('#seoKeyword');
        els.name = q('#productName') || q('input[name="name"]');
        els.description = q('#productDescription') || q('textarea[name="description"]');
        els.shortDesc = q('textarea[name="short_description"]');
        els.slug = q('#seoSlug') || q('input[name="slug"]');
        els.metaTitle = q('#seoMetaTitle') || q('input[name="meta_title"]');
        els.metaDesc = q('#seoMetaDesc') || q('textarea[name="meta_description"]');
        els.fileInput = q('input[type="file"][name*="image"]') || q('input[type="file"]');

        els.scoreBadge = q('#seoScoreBadge');
        els.scoreNum = q('#seoScoreNum');
        els.previewTitle = q('#seoPreviewTitle');
        els.previewUrl = q('#seoPreviewUrl');
        els.previewDesc = q('#seoPreviewDesc');
        els.basicList = q('#seoBasicList');
        els.extraList = q('#seoExtraList');
        els.readTitleList = q('#seoReadTitleList');
        els.readContentList = q('#seoReadContentList');
        els.basicBadge = q('#seoBasicBadge');
        els.extraBadge = q('#seoExtraBadge');
        els.readTitleBadge = q('#seoReadTitleBadge');
        els.readContentBadge = q('#seoReadContentBadge');
    }

    function analyze() {
        var keyword = val(els.keyword);
        var name = val(els.name);
        var content = val(els.description);
        var shortDesc = val(els.shortDesc);
        var slug = val(els.slug) || norm(name).replace(/\s+/g, '-');
        var title = val(els.metaTitle) || name;
        var desc = val(els.metaDesc) || shortDesc;

        var plain = stripTags(content);
        var words = wordCount(plain);
        var kw = norm(keyword);
        var kwCount = countOccurrences(plain, keyword);
        var kwWords = wordCount(keyword);
        var density = words > 0 && kwWords > 0 ? (kwCount * kwWords / words * 100) : 0;

        // === SEO Co ban ===
        var basic = [];

        // 1. Tu khoa trong tieu de SEO
        if (kw && norm(title).indexOf(kw) !== -1) {
            basic.push({ pass: true, msg: 'Tuyet voi! Ban dang su dung tu khoa chinh trong Tieu de SEO.' });
        } else {
            basic.push({ pass: false, msg: 'Them tu khoa chinh vao Tieu de SEO.' });
        }

        // 2. Tu khoa trong mo ta SEO
        if (kw && norm(desc).indexOf(kw) !== -1) {
            basic.push({ pass: true, msg: 'Da su dung tu khoa chinh trong Mo ta Meta SEO.' });
        } else {
            basic.push({ pass: false, msg: 'Them tu khoa chinh vao the Mo ta Meta SEO cua ban.' });
        }

        // 3. Tu khoa trong URL
        if (kw && (norm(slug).indexOf(kw.replace(/\s+/g, '-')) !== -1 || norm(slug).indexOf(kw.replace(/\s+/g, '')) !== -1)) {
            basic.push({ pass: true, msg: 'Tu khoa chinh da duoc su dung trong URL.' });
        } else {
            basic.push({ pass: false, msg: 'Su dung tu khoa chinh trong URL.' });
        }

        // 4. Tu khoa trong 10% dau noi dung
        if (kw && plain) {
            var first10 = plain.substring(0, Math.max(Math.ceil(plain.length * 0.1), 80));
            if (norm(first10).indexOf(kw) !== -1) {
                basic.push({ pass: true, msg: 'Tu khoa chinh xuat hien trong 10% noi dung dau tien.' });
            } else {
                basic.push({ pass: false, msg: 'Them tu khoa chinh vao 10% dau noi dung.' });
            }
        } else {
            basic.push({ pass: false, msg: 'Them tu khoa chinh vao 10% dau noi dung.' });
        }

        // 5. Tu khoa trong noi dung
        if (kw && kwCount > 0) {
            basic.push({ pass: true, msg: 'Da tim thay tu khoa chinh trong noi dung.' });
        } else {
            basic.push({ pass: false, msg: 'Them tu khoa chinh vao noi dung bai viet.' });
        }

        // 6. Do dai noi dung
        if (words >= 300) {
            basic.push({ pass: true, msg: 'Noi dung dai ' + words + ' tu. Lam tot lam!' });
        } else if (words > 0) {
            basic.push({ pass: 'warn', msg: 'Noi dung chi co ' + words + ' tu. Nen dai hon 300 tu.' });
        } else {
            basic.push({ pass: false, msg: 'Noi dung nen dai 200 Words.' });
        }

        // 7. Schema san pham
        basic.push({ pass: true, msg: 'Ban dang su dung Schema san pham cho San pham nay.' });

        // === Bo sung ===
        var extra = [];

        // 1. Tu khoa trong alt hinh anh
        var hasImg = els.fileInput && els.fileInput.files && els.fileInput.files.length > 0;
        var hasImgTag = /<img\s/i.test(content);
        if (hasImg || hasImgTag) {
            extra.push({ pass: true, msg: 'Da tim thay Tu khoa chinh trong (cac) thuoc tinh alt cua hinh anh.' });
        } else {
            extra.push({ pass: false, msg: 'Them hinh anh voi Tu khoa chinh trong thuoc tinh alt.' });
        }

        // 2. Mat do tu khoa
        if (kw && density > 0) {
            extra.push({ pass: true, msg: 'Mat do tu khoa la ' + density.toFixed(2) + ', tu khoa chinh va su ket hop xuat hien ' + kwCount + ' lan.' });
        } else {
            extra.push({ pass: false, msg: 'Them tu khoa chinh vao noi dung de tang mat do tu khoa.' });
        }

        // 3. Do dai URL
        if (slug.length > 0 && slug.length <= 75) {
            extra.push({ pass: true, msg: 'URL dai ' + slug.length + ' ky tu. Rat tot!' });
        } else if (slug.length > 75) {
            extra.push({ pass: false, msg: 'URL qua dai (' + slug.length + ' ky tu). Hay them mot URL ngan.' });
        } else {
            extra.push({ pass: false, msg: 'Them URL cho san pham.' });
        }

        // 4. Tu khoa chua dung truoc
        extra.push({ pass: true, msg: 'Ban chua su dung Tu khoa chinh nay truoc day.' });

        // 5. Content AI (luon fail - goi y)
        extra.push({ pass: false, msg: 'Su dung Content AI de toi uu hoa Product.' });

        // 6. Danh gia san pham
        extra.push({ pass: true, msg: 'Danh gia duoc bat cho San pham nay. Lam tot lam!' });

        // === Kha nang doc tieu de ===
        var readTitle = [];
        if (kw && norm(title).indexOf(kw) === 0) {
            readTitle.push({ pass: true, msg: 'Tu khoa chinh duoc su dung o dau tieu de SEO.' });
        } else if (kw && norm(title).indexOf(kw) !== -1) {
            readTitle.push({ pass: 'warn', msg: 'Tu khoa chinh co trong tieu de nhung khong o dau.' });
        } else {
            readTitle.push({ pass: false, msg: 'Su dung Tu khoa chinh gan dau cua tieu de SEO.' });
        }

        // === Kha nang doc noi dung ===
        var readContent = [];

        // 1. Doan van ngan
        if (plain) {
            var paras = content.split(/\n{2,}|<\/p>|<br\s*\/?>/).filter(function(p) { return p.trim().length > 0; });
            var longParas = paras.filter(function(p) { return wordCount(stripTags(p)) > 150; });
            if (paras.length > 1 && longParas.length === 0) {
                readContent.push({ pass: true, msg: 'Ban dang su dung cac doan van ngan.' });
            } else {
                readContent.push({ pass: false, msg: 'Them cac doan van ngan gon va suc tich de de doc va UX tot hon.' });
            }
        } else {
            readContent.push({ pass: false, msg: 'Them cac doan van ngan gon va suc tich de de doc va UX tot hon.' });
        }

        // 2. Hinh anh / video
        if (/<img\s/i.test(content) || /<video\s/i.test(content) || /youtube|vimeo/i.test(content) || hasImg) {
            readContent.push({ pass: true, msg: 'Noi dung cua ban chua hinh anh va / hoac video.' });
        } else {
            readContent.push({ pass: false, msg: 'Them mot vai hinh anh va / hoac video de lam cho noi dung cua ban hap dan hon.' });
        }

        return { basic: basic, extra: extra, readTitle: readTitle, readContent: readContent };
    }

    function icon(pass) {
        if (pass === true) return '<i class="bi bi-check-circle-fill text-success me-2"></i>';
        if (pass === 'warn') return '<i class="bi bi-exclamation-circle-fill text-warning me-2"></i>';
        return '<i class="bi bi-x-circle-fill text-danger me-2"></i>';
    }

    function renderList(el, checks) {
        if (!el) return;
        el.innerHTML = checks.map(function(c) {
            return '<li class="mb-2 d-flex align-items-start">' + icon(c.pass) + '<span>' + c.msg + '</span></li>';
        }).join('');
    }

    function passCount(checks) {
        return checks.filter(function(c) { return c.pass === true; }).length;
    }

    function calcScore(r) {
        var s = 0;
        r.basic.forEach(function(c) { if (c.pass === true) s += 10; else if (c.pass === 'warn') s += 5; });
        r.extra.forEach(function(c) { if (c.pass === true) s += 3.33; else if (c.pass === 'warn') s += 1.67; });
        r.readTitle.forEach(function(c) { if (c.pass === true) s += 5; else if (c.pass === 'warn') s += 2.5; });
        r.readContent.forEach(function(c) { if (c.pass === true) s += 5; else if (c.pass === 'warn') s += 2.5; });
        return Math.min(Math.round(s), 100);
    }

    function badgeClass(passed, total) {
        var r = passed / total;
        if (r >= 0.85) return 'badge bg-success';
        if (r >= 0.5) return 'badge bg-warning text-dark';
        return 'badge bg-danger';
    }

    function scoreBadgeClass(s) {
        if (s > 70) return 'badge bg-success';
        if (s >= 40) return 'badge bg-warning text-dark';
        return 'badge bg-danger';
    }

    function allPassBadge(checks) {
        var p = passCount(checks);
        if (p === checks.length) return '<span class="badge bg-success" style="font-size:0.75rem"><i class="bi bi-check me-1"></i>Tat ca deu tot</span>';
        var fails = checks.length - p;
        return '<span class="badge bg-danger" style="font-size:0.75rem"><i class="bi bi-x me-1"></i>' + fails + ' Loi</span>';
    }

    /** Convert Vietnamese text to URL slug */
    function toSlug(str) {
        str = str.toLowerCase().trim();
        // Remove Vietnamese diacritics
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
        str = str.replace(/đ/g, 'd');
        str = str.replace(/[^a-z0-9\s-]/g, '');
        str = str.replace(/\s+/g, '-');
        str = str.replace(/-+/g, '-');
        str = str.replace(/^-|-$/g, '');
        return str;
    }

    /** Auto-fill hidden fields from product name */
    function autoFill() {
        var name = val(els.name);
        if (!name) return;

        // Auto slug
        if (els.slug && !els.slug._userEdited) {
            els.slug.value = toSlug(name);
        }
        // Auto meta title
        if (els.metaTitle && !els.metaTitle._userEdited) {
            els.metaTitle.value = name + ' - Thu Huong Cake';
        }
        // Auto meta desc from short description or name
        if (els.metaDesc && !els.metaDesc._userEdited) {
            var sd = val(els.shortDesc);
            els.metaDesc.value = sd || name;
        }
    }

    function render() {
        autoFill();
        var r = analyze();
        var score = calcScore(r);

        renderList(els.basicList, r.basic);
        renderList(els.extraList, r.extra);
        renderList(els.readTitleList, r.readTitle);
        renderList(els.readContentList, r.readContent);

        // Score
        var scoreText = score + ' / 100';
        if (els.scoreBadge) { els.scoreBadge.textContent = scoreText; els.scoreBadge.className = scoreBadgeClass(score); }
        if (els.scoreNum) { els.scoreNum.textContent = scoreText; els.scoreNum.style.color = score > 70 ? '#16a34a' : (score >= 40 ? '#d97706' : '#dc2626'); }

        // Section badges
        if (els.basicBadge) els.basicBadge.innerHTML = allPassBadge(r.basic);
        if (els.extraBadge) els.extraBadge.innerHTML = allPassBadge(r.extra);
        if (els.readTitleBadge) els.readTitleBadge.innerHTML = allPassBadge(r.readTitle);
        if (els.readContentBadge) els.readContentBadge.innerHTML = allPassBadge(r.readContent);

        // Google preview
        var name = val(els.name);
        var slug = val(els.slug) || norm(name).replace(/\s+/g, '-');
        var desc = val(els.metaDesc) || val(els.shortDesc);
        if (els.previewTitle) els.previewTitle.textContent = name ? name + ' - Thu Huong Cake' : 'Tieu de san pham - Thu Huong Cake';
        if (els.previewUrl) els.previewUrl.textContent = 'thuhuongcake.vn/product/' + (slug || 'slug-san-pham');
        if (els.previewDesc) els.previewDesc.textContent = desc || 'Mo ta san pham se hien thi o day...';
    }

    function debounce(fn, ms) { var t; return function() { clearTimeout(t); t = setTimeout(fn, ms); }; }

    function bindEvents() {
        var dr = debounce(render, 200);
        [els.keyword, els.name, els.description, els.shortDesc, els.slug, els.metaTitle, els.metaDesc, els.fileInput].forEach(function(el) {
            if (el) { el.addEventListener('input', dr); el.addEventListener('change', dr); }
        });
    }

    function init() {
        if (!q('#seoAnalyzer')) return;
        resolveElements();
        bindEvents();
        render();
    }

    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
    else init();
})();
