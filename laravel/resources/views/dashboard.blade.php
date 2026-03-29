@extends('frontend.layouts.app')

@section('title', 'Tai khoan cua toi - Thu Huong Cake')

@section('content')
<div class="container" style="padding: 40px 0; min-height: 60vh;">
    <h2 style="font-family: 'Playfair Display', serif; margin-bottom: 20px;">Xin chao, {{ auth()->user()->name }}!</h2>
    <p>Day la trang tai khoan cua ban. Chuc nang se duoc cap nhat som.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background:#10b981;color:#fff;border:none;padding:10px 24px;border-radius:8px;cursor:pointer;font-weight:600;">Dang xuat</button>
    </form>
</div>
@endsection
