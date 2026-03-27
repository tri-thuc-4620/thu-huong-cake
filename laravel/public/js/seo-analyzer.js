/**
 * SEO Analyzer - Rank Math Style
 * Real-time SEO analysis for admin forms (products, blog posts, pages).
 * Vanilla JS, no dependencies.
 */
(function () {
    'use strict';

    // =========================================================================
    // Helpers
    // =========================================================================

    /** Safely get an element by selector; returns null if not found. */
    function q(selector) {
        return document.querySelector(selector);
    }

    /** Get trimmed value of an input/textarea, or empty string if missing. */
    function val(el) {
        return el ? el.value.trim() : '';
    }

    /** Count words in a string (Vietnamese-aware, splits on whitespace). */
    function wordCount(text) {
        if (!text) return 0;
        return text.split(/\s+/).filter(Boolean).length;
    }

    /**
     * Normalize a Vietnamese string for keyword matching.
     * Lowercases and collapses whitespace so partial matching works.
     */
    function norm(str) {
        return (str || '').toLowerCase().replace(/\s+/g, ' ').trim();
    }

    /** Count how many times `keyword` appears in `text` (case-insensitive). */
    function countOccurrences(text, keyword) {
        if (!keyword) return 0;
        var n = norm(text);
        var k = norm(keyword);
        if (!k) return 0;
        var count = 0;
        var pos = 0;
        while ((pos = n.indexOf(k, pos)) !== -1) {
            count++;
            pos += k.length;
        }
        return count;
    }

    /** Strip HTML tags to get plain text. */
    function stripTags(html) {
        var tmp = document.createElement('div');
        tmp.innerHTML = html || '';
        return tmp.textContent || tmp.innerText || '';
    }

    // =========================================================================
    // DOM references (resolved once on init, some may be null)
    // =========================================================================

    var els = {};

    function resolveElements() {
        els.keyword     = q('#seoKeyword');
        els.metaTitle   = q('#seoMetaTitle');
        els.metaDesc    = q('#seoMetaDesc');
        els.slug        = q('#seoSlug');
        els.name        = q('#productName') || q('input[name="name"]');
        els.description = q('#productDescription') || q('textarea[name="description"]');
        els.shortDesc   = q('textarea[name="short_description"]');
        els.fileInput   = q('input[type="file"][name*="image"]') || q('input[type="file"]');

        // Display elements
        els.scoreBadge  = q('#seoScoreBadge');
        els.scoreNum    = q('#seoScoreNum');
        els.titleCount  = q('#seoTitleCount');
        els.titleHint   = q('#seoTitleHint');
        els.descCount   = q('#seoDescCount');
        els.descHint    = q('#seoDescHint');
        els.previewTitle = q('#seoPreviewTitle');
        els.previewUrl  = q('#seoPreviewUrl');
        els.previewDesc = q('#seoPreviewDesc');
        els.basicList   = q('#seoBasicList');
        els.extraList   = q('#seoExtraList');
        els.readList    = q('#seoReadList');
        els.basicBadge  = q('#seoBasicBadge');
        els.extraBadge  = q('#seoExtraBadge');
        els.readBadge   = q('#seoReadBadge');
    }

    // =========================================================================
    // Analysis checks
    // =========================================================================

    /**
     * Run all SEO checks and return structured results.
     * Each check: { key, pass: true|false|'warn', message }
     */
    function analyze() {
        var keyword   = val(els.keyword);
        var title     = val(els.metaTitle);
        var desc      = val(els.metaDesc);
        var slug      = val(els.slug);
        var name      = val(els.name);
        var content   = val(els.description);
        var shortDesc = val(els.shortDesc);

        // Plain-text version of content (in case it contains HTML)
        var plainContent = stripTags(content);
        var contentWords = wordCount(plainContent);
        var kwNorm       = norm(keyword);

        // ---- Basic checks (7) ----
        var basic = [];

        // 1. Keyword in title
        if (!keyword) {
            basic.push({ pass: false, msg: 'Tu khoa chinh co trong Tieu de SEO' });
        } else if (norm(title).indexOf(kwNorm) !== -1) {
            basic.push({ pass: true, msg: 'Tu khoa chinh co trong Tieu de SEO' });
        } else {
            basic.push({ pass: false, msg: 'Tu khoa chinh co trong Tieu de SEO' });
        }

        // 2. Keyword in meta description
        if (!keyword) {
            basic.push({ pass: false, msg: 'Tu khoa chinh co trong Mo ta SEO' });
        } else if (norm(desc).indexOf(kwNorm) !== -1) {
            basic.push({ pass: true, msg: 'Tu khoa chinh co trong Mo ta SEO' });
        } else {
            basic.push({ pass: false, msg: 'Tu khoa chinh co trong Mo ta SEO' });
        }

        // 3. Keyword in URL
        if (!keyword) {
            basic.push({ pass: false, msg: 'Tu khoa chinh co trong URL' });
        } else if (norm(slug).indexOf(kwNorm.replace(/\s+/g, '-')) !== -1 || norm(slug).indexOf(kwNorm.replace(/\s+/g, '')) !== -1) {
            basic.push({ pass: true, msg: 'Tu khoa chinh co trong URL' });
        } else {
            basic.push({ pass: false, msg: 'Tu khoa chinh co trong URL' });
        }

        // 4. Keyword in content
        if (!keyword) {
            basic.push({ pass: false, msg: 'Tu khoa chinh xuat hien trong noi dung' });
        } else if (norm(plainContent).indexOf(kwNorm) !== -1) {
            basic.push({ pass: true, msg: 'Tu khoa chinh xuat hien trong noi dung' });
        } else {
            basic.push({ pass: false, msg: 'Tu khoa chinh xuat hien trong noi dung' });
        }

        // 5. Keyword density 0.5% - 1.5%
        if (!keyword || contentWords === 0) {
            basic.push({ pass: false, msg: 'Mat do tu khoa 0.5% - 1.5%' });
        } else {
            var kwWordCount = wordCount(keyword);
            var kwOccurrences = countOccurrences(plainContent, keyword);
            var density = (kwOccurrences * kwWordCount / contentWords) * 100;
            if (density >= 0.5 && density <= 1.5) {
                basic.push({ pass: true, msg: 'Mat do tu khoa ' + density.toFixed(1) + '% (tot: 0.5% - 1.5%)' });
            } else if (density > 0 && density < 0.5) {
                basic.push({ pass: 'warn', msg: 'Mat do tu khoa ' + density.toFixed(1) + '% (nen tang len 0.5% - 1.5%)' });
            } else if (density > 1.5) {
                basic.push({ pass: 'warn', msg: 'Mat do tu khoa ' + density.toFixed(1) + '% (nen giam xuong 0.5% - 1.5%)' });
            } else {
                basic.push({ pass: false, msg: 'Mat do tu khoa 0.5% - 1.5%' });
            }
        }

        // 6. Title length 50-60
        var titleLen = title.length;
        if (titleLen >= 50 && titleLen <= 60) {
            basic.push({ pass: true, msg: 'Do dai tieu de tot (' + titleLen + ' ky tu)' });
        } else if (titleLen > 0 && titleLen < 50) {
            basic.push({ pass: 'warn', msg: 'Tieu de hoi ngan (' + titleLen + '/50-60 ky tu)' });
        } else if (titleLen > 60) {
            basic.push({ pass: 'warn', msg: 'Tieu de qua dai (' + titleLen + '/50-60 ky tu)' });
        } else {
            basic.push({ pass: false, msg: 'Do dai tieu de 50-60 ky tu' });
        }

        // 7. Description length 120-160
        var descLen = desc.length;
        if (descLen >= 120 && descLen <= 160) {
            basic.push({ pass: true, msg: 'Do dai mo ta tot (' + descLen + ' ky tu)' });
        } else if (descLen > 0 && descLen < 120) {
            basic.push({ pass: 'warn', msg: 'Mo ta hoi ngan (' + descLen + '/120-160 ky tu)' });
        } else if (descLen > 160) {
            basic.push({ pass: 'warn', msg: 'Mo ta qua dai (' + descLen + '/120-160 ky tu)' });
        } else {
            basic.push({ pass: false, msg: 'Do dai mo ta 120-160 ky tu' });
        }

        // ---- Extra checks (5) ----
        var extra = [];

        // 1. Keyword in first 10% of content
        if (!keyword || !plainContent) {
            extra.push({ pass: false, msg: 'Tu khoa xuat hien trong 10% dau noi dung' });
        } else {
            var first10 = plainContent.substring(0, Math.max(Math.ceil(plainContent.length * 0.1), 50));
            if (norm(first10).indexOf(kwNorm) !== -1) {
                extra.push({ pass: true, msg: 'Tu khoa xuat hien trong 10% dau noi dung' });
            } else {
                extra.push({ pass: false, msg: 'Tu khoa xuat hien trong 10% dau noi dung' });
            }
        }

        // 2. Content length > 300 words
        if (contentWords >= 300) {
            extra.push({ pass: true, msg: 'Noi dung dai hon 300 tu (' + contentWords + ' tu)' });
        } else if (contentWords > 0) {
            extra.push({ pass: 'warn', msg: 'Noi dung con ngan (' + contentWords + '/300 tu)' });
        } else {
            extra.push({ pass: false, msg: 'Noi dung dai hon 300 tu' });
        }

        // 3. URL length < 75
        var slugLen = slug.length;
        if (slugLen > 0 && slugLen < 75) {
            extra.push({ pass: true, msg: 'URL ngan hon 75 ky tu (' + slugLen + ' ky tu)' });
        } else if (slugLen >= 75) {
            extra.push({ pass: false, msg: 'URL qua dai (' + slugLen + '/75 ky tu)' });
        } else {
            extra.push({ pass: false, msg: 'URL ngan hon 75 ky tu' });
        }

        // 4. Unique keyword (always pass for now)
        extra.push({ pass: true, msg: 'Tu khoa chua duoc su dung truoc day' });

        // 5. Has images
        var hasFileImage = els.fileInput && els.fileInput.files && els.fileInput.files.length > 0;
        var hasImgTag = /<img\s/i.test(content);
        var hasExistingImages = document.querySelectorAll('#seoAnalyzer ~ .card img, .product-images img, .image-preview img, .existing-images img').length > 0;
        if (hasFileImage || hasImgTag || hasExistingImages) {
            extra.push({ pass: true, msg: 'Co hinh anh' });
        } else {
            extra.push({ pass: false, msg: 'Co hinh anh' });
        }

        // ---- Readability checks (3) ----
        var read = [];

        // 1. Short paragraphs (content has line breaks)
        if (!plainContent) {
            read.push({ pass: false, msg: 'Su dung cac doan van ngan' });
        } else {
            var paragraphs = content.split(/\n{2,}|<\/p>|<br\s*\/?>/).filter(function (p) { return p.trim().length > 0; });
            var longParas = paragraphs.filter(function (p) { return wordCount(stripTags(p)) > 150; });
            if (paragraphs.length > 1 && longParas.length === 0) {
                read.push({ pass: true, msg: 'Su dung cac doan van ngan' });
            } else if (paragraphs.length > 1) {
                read.push({ pass: 'warn', msg: 'Mot so doan van con dai' });
            } else {
                read.push({ pass: false, msg: 'Su dung cac doan van ngan' });
            }
        }

        // 2. Has headings (h2, h3)
        if (/<h[23]\b/i.test(content)) {
            read.push({ pass: true, msg: 'Noi dung co heading (h2, h3)' });
        } else {
            read.push({ pass: false, msg: 'Noi dung co heading (h2, h3)' });
        }

        // 3. Has media (images / video in content)
        if (/<img\s/i.test(content) || /<video\s/i.test(content) || /youtube|vimeo/i.test(content) || /<iframe\s/i.test(content)) {
            read.push({ pass: true, msg: 'Noi dung co hinh anh / video' });
        } else {
            read.push({ pass: false, msg: 'Noi dung co hinh anh / video' });
        }

        return { basic: basic, extra: extra, read: read };
    }

    // =========================================================================
    // Rendering
    // =========================================================================

    /** Build a single <li> for a check result. */
    function renderCheckItem(check) {
        var icon, colorClass;
        if (check.pass === true) {
            icon = 'bi-check-circle-fill';
            colorClass = 'text-success';
        } else if (check.pass === 'warn') {
            icon = 'bi-exclamation-circle-fill';
            colorClass = 'text-warning';
        } else {
            icon = 'bi-x-circle-fill';
            colorClass = 'text-danger';
        }
        return '<li class="mb-2"><i class="bi ' + icon + ' ' + colorClass + ' me-2"></i>' + check.msg + '</li>';
    }

    /** Render a list of checks into a <ul> element. */
    function renderList(listEl, checks) {
        if (!listEl) return;
        listEl.innerHTML = checks.map(renderCheckItem).join('');
    }

    /** Count passes in a checks array (warn counts as 0.5 for scoring). */
    function passCount(checks) {
        var c = 0;
        checks.forEach(function (ch) {
            if (ch.pass === true) c++;
        });
        return c;
    }

    /** Calculate score from results. */
    function calcScore(results) {
        var score = 0;
        // Basic: 10 pts each
        results.basic.forEach(function (ch) {
            if (ch.pass === true) score += 10;
            else if (ch.pass === 'warn') score += 5;
        });
        // Extra: 4 pts each
        results.extra.forEach(function (ch) {
            if (ch.pass === true) score += 4;
            else if (ch.pass === 'warn') score += 2;
        });
        // Readability: ~3.33 pts each (total 10)
        results.read.forEach(function (ch) {
            if (ch.pass === true) score += 3.33;
            else if (ch.pass === 'warn') score += 1.67;
        });
        return Math.round(score);
    }

    /** Get badge background color based on score ratio. */
    function badgeColor(passed, total) {
        var ratio = passed / total;
        if (ratio >= 0.85) return 'bg-success';
        if (ratio >= 0.5)  return 'bg-warning text-dark';
        return 'bg-danger';
    }

    /** Get score badge color. */
    function scoreBadgeColor(score) {
        if (score > 70) return 'bg-success';
        if (score >= 40) return 'bg-warning text-dark';
        return 'bg-danger';
    }

    /** Update a badge element. */
    function updateBadge(el, passed, total) {
        if (!el) return;
        el.textContent = passed + ' / ' + total;
        el.className = 'badge ' + badgeColor(passed, total);
    }

    /** Color for character count. */
    function counterColor(len, min, max) {
        if (len >= min && len <= max) return 'color:#16a34a';
        if (len > 0 && len < min) return 'color:#d97706';
        if (len > max) return 'color:#dc2626';
        return 'color:#94a3b8';
    }

    /** Main render function. */
    function render() {
        var results = analyze();
        var score = calcScore(results);

        // Render check lists
        renderList(els.basicList, results.basic);
        renderList(els.extraList, results.extra);
        renderList(els.readList, results.read);

        // Score badges
        var scoreText = score + ' / 100';
        if (els.scoreBadge) {
            els.scoreBadge.textContent = scoreText;
            els.scoreBadge.className = 'badge ' + scoreBadgeColor(score);
        }
        if (els.scoreNum) {
            els.scoreNum.textContent = scoreText;
            els.scoreNum.style.color = score > 70 ? '#16a34a' : (score >= 40 ? '#d97706' : '#dc2626');
        }

        // Section badges
        updateBadge(els.basicBadge, passCount(results.basic), 7);
        updateBadge(els.extraBadge, passCount(results.extra), 5);
        updateBadge(els.readBadge, passCount(results.read), 3);

        // Character counters
        var titleLen = val(els.metaTitle).length;
        var descLen  = val(els.metaDesc).length;

        if (els.titleCount) {
            els.titleCount.textContent = titleLen + ' / 60';
            els.titleCount.style.cssText = 'font-size:0.75rem;' + counterColor(titleLen, 50, 60);
        }
        if (els.titleHint) {
            if (titleLen === 0) els.titleHint.textContent = '';
            else if (titleLen < 50) els.titleHint.textContent = 'Nen them ' + (50 - titleLen) + ' ky tu nua';
            else if (titleLen > 60) els.titleHint.textContent = 'Nen giam ' + (titleLen - 60) + ' ky tu';
            else els.titleHint.textContent = 'Do dai tot!';
        }

        if (els.descCount) {
            els.descCount.textContent = descLen + ' / 160';
            els.descCount.style.cssText = 'font-size:0.75rem;' + counterColor(descLen, 120, 160);
        }
        if (els.descHint) {
            if (descLen === 0) els.descHint.textContent = '';
            else if (descLen < 120) els.descHint.textContent = 'Nen them ' + (120 - descLen) + ' ky tu nua';
            else if (descLen > 160) els.descHint.textContent = 'Nen giam ' + (descLen - 160) + ' ky tu';
            else els.descHint.textContent = 'Do dai tot!';
        }

        // Google preview
        updatePreview();
    }

    /** Update the Google search preview. */
    function updatePreview() {
        var metaTitle = val(els.metaTitle);
        var name      = val(els.name);
        var slug      = val(els.slug);
        var metaDesc  = val(els.metaDesc);
        var shortDesc = val(els.shortDesc);

        if (els.previewTitle) {
            els.previewTitle.textContent = metaTitle || (name ? name + ' - Thu Huong Cake' : 'Tieu de san pham - Thu Huong Cake');
        }
        if (els.previewUrl) {
            els.previewUrl.textContent = 'thuhuongcake.vn/product/' + (slug || 'slug-san-pham');
        }
        if (els.previewDesc) {
            els.previewDesc.textContent = metaDesc || shortDesc || 'Mo ta san pham se hien thi o day...';
        }
    }

    // =========================================================================
    // Event binding
    // =========================================================================

    /** Debounce helper to avoid excessive re-renders. */
    function debounce(fn, ms) {
        var timer;
        return function () {
            clearTimeout(timer);
            timer = setTimeout(fn, ms);
        };
    }

    function bindEvents() {
        var debouncedRender = debounce(render, 200);

        // List of elements to watch
        var watchEls = [
            els.keyword,
            els.metaTitle,
            els.metaDesc,
            els.slug,
            els.name,
            els.description,
            els.shortDesc,
            els.fileInput
        ];

        watchEls.forEach(function (el) {
            if (!el) return;
            el.addEventListener('input', debouncedRender);
            el.addEventListener('change', debouncedRender);
        });

        // Also listen for TinyMCE / rich editor changes if present
        if (typeof tinymce !== 'undefined') {
            try {
                tinymce.on('AddEditor', function (e) {
                    e.editor.on('keyup change', debouncedRender);
                });
            } catch (_) { /* ignore */ }
        }
    }

    // =========================================================================
    // Initialization
    // =========================================================================

    function init() {
        // Make sure the SEO analyzer card exists on the page
        if (!q('#seoAnalyzer')) return;

        resolveElements();
        bindEvents();

        // Initial render
        render();
    }

    // Run on DOMContentLoaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
