<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Placeholder - redirect to dashboard
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        return redirect()->route('admin.login');
    }
}
