<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function products()
    {
        return view('frontend.products');
    }

    public function productDetail($id)
    {
        return view('frontend.product-detail');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function stores()
    {
        return view('frontend.stores');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function blogDetail($id)
    {
        return view('frontend.blog-detail');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function guide()
    {
        return view('frontend.guide');
    }
}
