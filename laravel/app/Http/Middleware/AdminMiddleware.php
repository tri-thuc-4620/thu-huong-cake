<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->hasRole(['super-admin', 'admin', 'manager', 'editor', 'staff'])) {
            abort(403, 'Ban khong co quyen truy cap trang quan tri.');
        }

        return $next($request);
    }
}
