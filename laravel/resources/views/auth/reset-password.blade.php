<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dat lai mat khau - Thu Huong Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #fff0f6 0%, #fdf2f8 50%, #fce7f3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .login-wrapper { width: 100%; max-width: 440px; }
        .login-brand { text-align: center; margin-bottom: 2rem; }
        .login-brand-icon {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, #e84393, #fd79a8);
            border-radius: 20px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.8rem; color: #fff; margin-bottom: 1rem;
            box-shadow: 0 8px 24px rgba(232, 67, 147, 0.3);
        }
        .login-brand h1 { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0; }
        .login-brand p { color: #94a3b8; font-size: 0.9rem; margin: 0.25rem 0 0; }
        .login-card {
            background: #fff; border-radius: 20px; padding: 2.5rem 2rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            border: 1px solid rgba(232, 67, 147, 0.08);
        }
        .login-card h2 { font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem; }
        .login-card .subtitle { color: #94a3b8; font-size: 0.85rem; margin-bottom: 1.75rem; }
        .form-label { font-weight: 500; font-size: 0.85rem; color: #374151; margin-bottom: 0.4rem; }
        .form-control {
            border-radius: 12px; border: 1px solid #e2e8f0; padding: 0.7rem 1rem;
            font-size: 0.9rem; transition: all 0.3s ease;
        }
        .form-control:focus { border-color: #e84393; box-shadow: 0 0 0 3px rgba(232, 67, 147, 0.1); }
        .input-group-text {
            border-radius: 12px 0 0 12px; border: 1px solid #e2e8f0; border-right: none;
            background: #f8fafc; color: #94a3b8;
        }
        .input-group .form-control { border-radius: 0 12px 12px 0; }
        .input-group:focus-within .input-group-text { border-color: #e84393; color: #e84393; }
        .password-toggle {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            background: none; border: none; color: #94a3b8; cursor: pointer; z-index: 5; padding: 4px;
        }
        .password-toggle:hover { color: #e84393; }
        .btn-login {
            width: 100%; padding: 0.75rem; border-radius: 12px; border: none;
            background: linear-gradient(135deg, #e84393, #fd79a8); color: #fff;
            font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; margin-top: 0.5rem;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #c0336e, #e84393);
            transform: translateY(-1px); box-shadow: 0 6px 20px rgba(232, 67, 147, 0.35);
        }
        .bottom-text { text-align: center; margin-top: 1.5rem; font-size: 0.8rem; color: #94a3b8; }
        .bottom-text a { color: #e84393; text-decoration: none; font-weight: 500; }
        .alert { border-radius: 12px; border: none; font-size: 0.85rem; }
        .invalid-feedback { font-size: 0.8rem; }
        @media (max-width: 480px) { .login-card { padding: 2rem 1.5rem; } }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-brand">
            <div class="login-brand-icon"><i class="bi bi-cake2"></i></div>
            <h1>Thu Huong Cake</h1>
            <p>Dat lai mat khau cua ban</p>
        </div>

        <div class="login-card">
            <h2>Dat lai mat khau</h2>
            <p class="subtitle">Nhap mat khau moi cho tai khoan cua ban</p>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mat khau moi</label>
                    <div class="input-group position-relative">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               id="passwordInput" placeholder="••••••••" required autocomplete="new-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('passwordInput', 'toggleIcon1')">
                            <i class="bi bi-eye" id="toggleIcon1"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Xac nhan mat khau moi</label>
                    <div class="input-group position-relative">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="passwordConfirmInput" placeholder="••••••••" required autocomplete="new-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('passwordConfirmInput', 'toggleIcon2')">
                            <i class="bi bi-eye" id="toggleIcon2"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-shield-check me-1"></i> Dat lai mat khau
                </button>
            </form>
        </div>

        <div class="bottom-text">
            <a href="/">&larr; Quay ve trang chu</a>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') { input.type = 'text'; icon.classList.replace('bi-eye', 'bi-eye-slash'); }
            else { input.type = 'password'; icon.classList.replace('bi-eye-slash', 'bi-eye'); }
        }
    </script>
</body>
</html>
