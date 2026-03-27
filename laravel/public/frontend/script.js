// Hero Slider
let heroCurrentSlide = 0;
let heroAutoPlay;

function heroSlide(dir) {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dots .dot');
    if (!slides.length) return;
    slides[heroCurrentSlide].classList.remove('active');
    if (dots[heroCurrentSlide]) dots[heroCurrentSlide].classList.remove('active');
    heroCurrentSlide = (heroCurrentSlide + dir + slides.length) % slides.length;
    slides[heroCurrentSlide].classList.add('active');
    if (dots[heroCurrentSlide]) dots[heroCurrentSlide].classList.add('active');
}

function heroGoTo(index) {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dots .dot');
    if (!slides.length) return;
    slides[heroCurrentSlide].classList.remove('active');
    if (dots[heroCurrentSlide]) dots[heroCurrentSlide].classList.remove('active');
    heroCurrentSlide = index;
    slides[heroCurrentSlide].classList.add('active');
    if (dots[heroCurrentSlide]) dots[heroCurrentSlide].classList.add('active');
}

// Auto slide every 5s
if (document.querySelectorAll('.hero-slide').length > 1) {
    heroAutoPlay = setInterval(() => heroSlide(1), 5000);
    const heroSection = document.querySelector('.hero');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', () => clearInterval(heroAutoPlay));
        heroSection.addEventListener('mouseleave', () => {
            heroAutoPlay = setInterval(() => heroSlide(1), 5000);
        });
    }
}

// Back to Top Button
const backToTop = document.getElementById('backToTop');

window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        backToTop.classList.add('visible');
    } else {
        backToTop.classList.remove('visible');
    }
});

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-visible');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.product-card, .banner-card, .blog-card').forEach(el => {
    el.classList.add('animate-hidden');
    observer.observe(el);
});

// Header shadow on scroll
const header = document.querySelector('.header');
window.addEventListener('scroll', () => {
    const stickyWrapper = document.querySelector('.sticky-wrapper');
    if (window.scrollY > 10) {
        header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
        if (stickyWrapper) stickyWrapper.classList.add('scrolled');
    } else {
        header.style.boxShadow = '0 2px 8px rgba(0,0,0,0.06)';
        if (stickyWrapper) stickyWrapper.classList.remove('scrolled');
    }
});

// Mobile Drawer Menu
const hamburgerBtn = document.getElementById('hamburgerBtn');
const mobileDrawer = document.getElementById('mobileDrawer');
const mobileOverlay = document.getElementById('mobileOverlay');
const drawerClose = document.getElementById('drawerClose');
const drawerTabs = document.querySelectorAll('.drawer-tab');

function openDrawer() {
    mobileDrawer.classList.add('active');
    mobileOverlay.classList.add('active');
    document.body.classList.add('drawer-open');
}

function closeDrawer() {
    mobileDrawer.classList.remove('active');
    mobileOverlay.classList.remove('active');
    document.body.classList.remove('drawer-open');
}

hamburgerBtn.addEventListener('click', openDrawer);
drawerClose.addEventListener('click', closeDrawer);
mobileOverlay.addEventListener('click', closeDrawer);

// Drawer tab switching
drawerTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        drawerTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        document.querySelectorAll('.drawer-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('panel-' + tab.dataset.tab).classList.add('active');
    });
});

// Lightbox Gallery
let lbImages = [];
let lbIndex = 0;

function openLightbox(imgSrc) {
    // Collect all product images on page
    lbImages = [];
    document.querySelectorAll('.product-image img').forEach(img => {
        if (img.src) lbImages.push(img.src);
    });
    lbIndex = lbImages.indexOf(imgSrc);
    if (lbIndex === -1) { lbImages = [imgSrc]; lbIndex = 0; }
    showLightboxImage();
    document.getElementById('lightbox').classList.add('active');
}

function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
}

function showLightboxImage() {
    const img = document.getElementById('lightboxImg');
    img.src = lbImages[lbIndex];
    document.getElementById('lightboxCounter').textContent = (lbIndex + 1) + ' / ' + lbImages.length;
}

function nextLightbox() {
    lbIndex = (lbIndex + 1) % lbImages.length;
    showLightboxImage();
}

function prevLightbox() {
    lbIndex = (lbIndex - 1 + lbImages.length) % lbImages.length;
    showLightboxImage();
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    const lb = document.getElementById('lightbox');
    if (!lb || !lb.classList.contains('active')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') nextLightbox();
    if (e.key === 'ArrowLeft') prevLightbox();
});

// Attach quick-view buttons
document.querySelectorAll('.quick-view').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const card = btn.closest('.product-card') || btn.closest('.product-image');
        const img = card.querySelector('img');
        if (img) openLightbox(img.src);
    });
});

// Login Modal
function openLogin() {
    const overlay = document.getElementById('loginOverlay');
    if (overlay) overlay.classList.add('active');
}

function closeLogin() {
    const overlay = document.getElementById('loginOverlay');
    if (overlay) overlay.classList.remove('active');
}

// Cart Drawer
function openCart() {
    const drawer = document.getElementById('cartDrawer');
    const overlay = document.getElementById('cartOverlay');
    if (drawer && overlay) {
        drawer.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('drawer-open');
    }
}

function closeCart() {
    const drawer = document.getElementById('cartDrawer');
    const overlay = document.getElementById('cartOverlay');
    if (drawer && overlay) {
        drawer.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('drawer-open');
    }
}

