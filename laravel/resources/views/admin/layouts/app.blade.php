<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - Thu Huong Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 270px;
            --pink: #e84393;
            --pink-light: #fd79a8;
            --pink-dark: #c0336e;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --gray-bg: #f1f5f9;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-bg);
            min-height: 100vh;
            color: #334155;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background: #fff;
            border-right: 1px solid #f0e4e9;
            z-index: 1040;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #f0e4e9;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--pink), var(--pink-light));
        }

        .sidebar-brand-icon {
            width: 40px; height: 40px;
            background: rgba(255,255,255,0.25);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #fff;
            flex-shrink: 0;
            backdrop-filter: blur(4px);
        }

        .sidebar-brand-text {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.2;
        }

        .sidebar-brand-text small {
            font-weight: 400;
            font-size: 0.7rem;
            color: rgba(255,255,255,0.7);
            display: block;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 0;
        }

        .sidebar-nav::-webkit-scrollbar { width: 4px; }
        .sidebar-nav::-webkit-scrollbar-track { background: transparent; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: #f0e4e9; border-radius: 4px; }

        .nav-group-label {
            color: #c0336e;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 1.2rem 1.5rem 0.5rem;
        }

        .sidebar .nav-link {
            color: #64748b;
            padding: 0.55rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 400;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: var(--transition);
            border-left: 3px solid transparent;
            text-decoration: none;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
            width: 22px;
            text-align: center;
            flex-shrink: 0;
            transition: var(--transition);
            color: #94a3b8;
        }

        .sidebar .nav-link:hover {
            color: var(--pink);
            background: #fdf2f8;
        }

        .sidebar .nav-link:hover i {
            color: var(--pink);
        }

        .sidebar .nav-link.active {
            color: var(--pink-dark);
            background: linear-gradient(90deg, #fdf2f8, #fff0f6);
            border-left-color: var(--pink);
            font-weight: 600;
        }

        .sidebar .nav-link.active i {
            color: var(--pink);
        }

        /* === MAIN CONTENT === */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: var(--transition);
        }

        /* === TOPBAR === */
        .topbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1030;
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.95);
        }

        .topbar-search {
            position: relative;
            width: 300px;
        }

        .topbar-search input {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            font-size: 0.875rem;
            background: var(--gray-bg);
            transition: var(--transition);
            width: 100%;
        }

        .topbar-search input:focus {
            outline: none;
            border-color: var(--pink);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(232, 67, 147, 0.1);
        }

        .topbar-search i {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-btn {
            width: 40px; height: 40px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            transition: var(--transition);
            position: relative;
            cursor: pointer;
        }

        .topbar-btn:hover {
            background: var(--gray-bg);
            color: var(--pink);
            border-color: #cbd5e1;
        }

        .topbar-btn .badge-dot {
            width: 8px; height: 8px;
            background: var(--pink);
            border-radius: 50%;
            position: absolute;
            top: 8px; right: 8px;
            border: 2px solid #fff;
        }

        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--pink), var(--pink-light));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* === PAGE CONTENT === */
        .page-content {
            padding: 1.75rem 2rem;
        }

        /* === CARDS === */
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.03);
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 1.25rem;
            font-weight: 600;
        }

        /* === STAT CARDS === */
        .stat-card {
            border-radius: 14px;
            padding: 1.25rem;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px; right: -20px;
            width: 80px; height: 80px;
            border-radius: 50%;
            opacity: 0.08;
        }

        .stat-card .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: #64748b;
            margin-bottom: 4px;
        }

        .stat-card .stat-change {
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* === TABLE === */
        .table-card {
            border-radius: 14px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            padding: 0.85rem 1rem;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            font-size: 0.875rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* === BADGES === */
        .badge {
            font-weight: 500;
            padding: 0.35em 0.75em;
            border-radius: 8px;
            font-size: 0.75rem;
        }

        .badge-soft-success { background: #dcfce7; color: #166534; }
        .badge-soft-warning { background: #fef3c7; color: #92400e; }
        .badge-soft-danger { background: #fee2e2; color: #991b1b; }
        .badge-soft-info { background: #dbeafe; color: #1e40af; }
        .badge-soft-primary { background: #ede9fe; color: #5b21b6; }
        .badge-soft-pink { background: #fce7f3; color: #9d174d; }

        /* === BUTTONS === */
        .btn {
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1.15rem;
            transition: var(--transition);
        }

        .btn-pink {
            background: linear-gradient(135deg, var(--pink), var(--pink-light));
            color: #fff;
            border: none;
        }

        .btn-pink:hover {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink));
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(232, 67, 147, 0.3);
        }

        .btn-outline-pink {
            border: 1px solid var(--pink);
            color: var(--pink);
            background: transparent;
        }

        .btn-outline-pink:hover {
            background: var(--pink);
            color: #fff;
        }

        .btn-soft {
            background: var(--gray-bg);
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .btn-soft:hover {
            background: #e2e8f0;
        }

        /* === FORMS === */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1rem;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 3px rgba(232, 67, 147, 0.1);
        }

        /* === FILTER SELECTS === */
        .filter-bar .form-select {
            border-radius: 10px;
            border: 1px solid #e8d5e8;
            background-color: #fdf8fc;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 16 16'%3E%3Cpath fill='%23e84393' d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 10px;
            padding-right: 2.25rem;
            font-size: 0.84rem;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
        }

        .filter-bar .form-select:hover {
            border-color: var(--pink-light);
            background-color: #fff0f8;
        }

        .filter-bar .form-select:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 3px rgba(232, 67, 147, 0.12);
            background-color: #fff;
        }

        .filter-bar .form-control {
            border: 1px solid #e8d5e8;
            background-color: #fdf8fc;
            font-size: 0.84rem;
            font-weight: 500;
        }

        .filter-bar .form-control:hover {
            border-color: var(--pink-light);
        }

        .filter-bar .form-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #9d174d;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 0.3rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 0.4rem;
        }

        .form-check-input:checked {
            background-color: var(--pink);
            border-color: var(--pink);
        }

        /* === PAGE HEADER === */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .page-header h4 {
            font-weight: 700;
            font-size: 1.35rem;
            color: var(--dark);
            margin: 0;
        }

        .page-header .breadcrumb {
            margin: 0;
            font-size: 0.8rem;
        }

        /* === FILTER BAR === */
        .filter-bar {
            background: #fff;
            border-radius: 14px;
            padding: 1rem 1.25rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }

        /* === PAGINATION === */
        .pagination .page-link {
            border-radius: 8px;
            margin: 0 2px;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 0.85rem;
        }

        .pagination .page-item.active .page-link {
            background: var(--pink);
            border-color: var(--pink);
        }

        /* === ALERTS === */
        .alert {
            border-radius: 12px;
            border: none;
            font-size: 0.875rem;
        }

        /* === MOBILE === */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1035;
                backdrop-filter: blur(4px);
                display: none;
            }
            .sidebar-backdrop.show {
                display: block;
            }
            .topbar-search {
                width: 200px;
            }
            .page-content {
                padding: 1.25rem 1rem;
            }
        }

        /* === SCROLLBAR === */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* === ANIMATIONS === */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.4s ease forwards;
        }

        .action-btn {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #64748b;
            transition: var(--transition);
            font-size: 0.85rem;
        }

        .action-btn:hover { background: var(--gray-bg); }
        .action-btn.edit:hover { color: #2563eb; border-color: #93c5fd; background: #eff6ff; }
        .action-btn.delete:hover { color: #dc2626; border-color: #fca5a5; background: #fef2f2; }
        .action-btn.view:hover { color: var(--pink); border-color: var(--pink-light); background: #fce7f3; }
    </style>
    @stack('styles')
</head>
<body>
    {{-- Sidebar Backdrop (mobile) --}}
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    {{-- Sidebar --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="bi bi-cake2"></i>
            </div>
            <div class="sidebar-brand-text">
                Thu Huong Cake
                <small>Admin Panel</small>
            </div>
        </div>

        <div class="sidebar-nav">
            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid-1x2"></i> Dashboard
                </a>

                <div class="nav-group-label">Quan ly ban hang</div>
                <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <i class="bi bi-box-seam"></i> San pham
                </a>
                <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-folder2"></i> Danh muc
                </a>
                <a class="nav-link {{ request()->routeIs('admin.attributes.*') ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                    <i class="bi bi-sliders"></i> Thuoc tinh
                </a>
                <a class="nav-link {{ request()->routeIs('admin.price-tables.*') ? 'active' : '' }}" href="{{ route('admin.price-tables.index') }}">
                    <i class="bi bi-table"></i> Bang gia
                </a>

                <div class="nav-group-label">Don hang</div>
                <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                    <i class="bi bi-receipt"></i> Don hang
                </a>

                <div class="nav-group-label">Noi dung</div>
                <a class="nav-link {{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}" href="{{ route('admin.blog-posts.index') }}">
                    <i class="bi bi-newspaper"></i> Bai viet
                </a>
                <a class="nav-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" href="{{ route('admin.blog-categories.index') }}">
                    <i class="bi bi-bookmark"></i> Danh muc blog
                </a>
                <a class="nav-link {{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}" href="{{ route('admin.hero-slides.index') }}">
                    <i class="bi bi-images"></i> Slider
                </a>
                <a class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                    <i class="bi bi-badge-ad"></i> Banner
                </a>
                <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
                    <i class="bi bi-file-earmark-text"></i> Trang tinh
                </a>

                <div class="nav-group-label">Cua hang</div>
                <a class="nav-link {{ request()->routeIs('admin.store-locations.*') ? 'active' : '' }}" href="{{ route('admin.store-locations.index') }}">
                    <i class="bi bi-geo-alt"></i> Dia diem
                </a>

                <div class="nav-group-label">Lien he</div>
                <a class="nav-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}" href="{{ route('admin.contact-messages.index') }}">
                    <i class="bi bi-envelope"></i> Tin nhan
                </a>
                <a class="nav-link {{ request()->routeIs('admin.callback-requests.*') ? 'active' : '' }}" href="{{ route('admin.callback-requests.index') }}">
                    <i class="bi bi-telephone-inbound"></i> Yeu cau goi lai
                </a>

                <div class="nav-group-label">He thong</div>
                <a class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <i class="bi bi-shield-lock"></i> Phan quyen
                </a>
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear"></i> Cai dat
                </a>
            </nav>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="main-content">
        {{-- Topbar --}}
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-soft d-lg-none" id="sidebarToggle">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <div class="topbar-search d-none d-md-block">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Tim kiem..." class="form-control">
                </div>
            </div>

            <div class="topbar-actions">
                <a href="/" target="_blank" class="topbar-btn" title="Xem trang chu">
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
                <div class="topbar-btn">
                    <i class="bi bi-bell"></i>
                    <span class="badge-dot"></span>
                </div>
                <div class="dropdown">
                    <button class="btn p-0 border-0 d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <div class="user-avatar">AD</div>
                        <div class="d-none d-md-block text-start">
                            <div style="font-size:0.85rem;font-weight:600;line-height:1.2">Admin</div>
                            <div style="font-size:0.7rem;color:#94a3b8">Quan tri vien</div>
                        </div>
                        <i class="bi bi-chevron-down" style="font-size:0.7rem;color:#94a3b8"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end mt-2" style="border-radius:12px;border:1px solid #e2e8f0;box-shadow:0 10px 25px rgba(0,0,0,0.08)">
                        <li><a class="dropdown-item py-2" href="#"><i class="bi bi-person me-2"></i>Ho so</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('admin.settings.index') }}"><i class="bi bi-gear me-2"></i>Cai dat</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger"><i class="bi bi-box-arrow-right me-2"></i>Dang xuat</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <div class="page-content fade-in">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center gap-2 alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle (mobile)
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebarBackdrop');
        const toggle = document.getElementById('sidebarToggle');

        if (toggle) {
            toggle.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                backdrop.classList.toggle('show');
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', () => {
                sidebar.classList.remove('show');
                backdrop.classList.remove('show');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
