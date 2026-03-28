<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->hasRole('super-admin')) {
            return $next($request);
        }

        if (!auth()->user()->hasPermissionTo($permission)) {
            abort(403, 'Ban khong co quyen thuc hien hanh dong nay.');
        }

        return $next($request);
    }
}
