<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Thu Hường Cake - Bánh Sinh Nhật Đẹp & Ngon')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/styles.css') }}">
    @stack('styles')
</head>
<body>
    @include('frontend.partials.topbar')

    <div class="sticky-wrapper">
        @include('frontend.partials.header')
        @include('frontend.partials.nav')
    </div>

    @include('frontend.partials.mobile-drawer')

    @yield('content')

    @include('frontend.partials.footer')
    @include('frontend.partials.modals')

    <button class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="{{ asset('frontend/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
