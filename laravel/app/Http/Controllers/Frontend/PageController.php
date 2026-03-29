<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\StoreLocation;
use App\Models\HeroSlide;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Setting;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function home()
    {
        $slides = Cache::remember('home_slides', 3600, fn() =>
            HeroSlide::where('is_active', true)->orderBy('sort_order')->get()
        );

        $banners = Cache::remember('home_banners', 3600, fn() =>
            Banner::where('is_active', true)->where('position', 'homepage')->orderBy('sort_order')->get()
        );

        $categories = Cache::remember('menu_categories', 3600, fn() =>
            Category::where('is_visible', true)->where('show_in_menu', true)->orderBy('sort_order')->get()
        );

        $featuredProducts = Cache::remember('home_featured', 1800, fn() =>
            Product::with('primaryImage', 'category')
                ->where('is_visible', true)->where('is_featured', true)->take(10)->get()
        );

        $hotProducts = Cache::remember('home_hot', 1800, fn() =>
            Product::with('primaryImage', 'category')
                ->where('is_visible', true)->where('is_hot', true)->take(10)->get()
        );

        $newProducts = Cache::remember('home_new', 1800, fn() =>
            Product::with('primaryImage', 'category')
                ->where('is_visible', true)->where('is_new', true)->take(10)->get()
        );

        $latestProducts = Cache::remember('home_latest', 1800, fn() =>
            Product::with('primaryImage', 'category')
                ->where('is_visible', true)->latest()->take(10)->get()
        );

        $blogPosts = Cache::remember('home_blog', 3600, fn() =>
            BlogPost::where('is_published', true)->latest('published_at')->take(3)->get()
        );

        // Danh muc hien thi trang chu (tick show_on_home)
        $homeCategories = Cache::remember('home_categories', 1800, fn() =>
            Category::where('show_on_home', true)->where('is_visible', true)
                ->orderBy('sort_order')->get()
                ->map(function ($cat) {
                    $childIds = Category::where('parent_id', $cat->id)->pluck('id')->toArray();
                    $allIds = array_merge([$cat->id], $childIds);
                    $cat->homeProducts = Product::with('primaryImage')
                        ->where('is_visible', true)
                        ->whereIn('category_id', $allIds)
                        ->orderBy('sort_order')
                        ->take(10)->get();
                    return $cat;
                })
        );

        return view('frontend.home', compact(
            'slides', 'banners', 'categories',
            'featuredProducts', 'hotProducts', 'newProducts', 'latestProducts',
            'homeCategories', 'blogPosts'
        ));
    }

    public function products(Request $request)
    {
        $query = Product::with('primaryImage', 'category')
            ->where('is_visible', true);

        if ($request->filled('category')) {
            $cat = Category::where('slug', $request->category)->first();
            if ($cat) {
                // Lọc cả sản phẩm thuộc danh mục con
                $childIds = Category::where('parent_id', $cat->id)->pluck('id')->toArray();
                $allIds = array_merge([$cat->id], $childIds);
                $query->whereIn('category_id', $allIds);
            }
        }

        if ($request->filled('sort')) {
            match ($request->sort) {
                'price_asc' => $query->orderBy('price', 'asc'),
                'price_desc' => $query->orderBy('price', 'desc'),
                'newest' => $query->latest(),
                'popular' => $query->orderBy('views', 'desc'),
                default => $query->orderBy('sort_order'),
            };
        } else {
            $query->orderBy('sort_order');
        }

        $products = $query->paginate(12);
        $categories = Category::where('is_visible', true)->orderBy('sort_order')->get()->map(function ($cat) {
            $childIds = Category::where('parent_id', $cat->id)->pluck('id')->toArray();
            $allIds = array_merge([$cat->id], $childIds);
            $cat->total_products = Product::where('is_visible', true)->whereIn('category_id', $allIds)->count();
            return $cat;
        });
        $stores = StoreLocation::where('is_active', true)->get();

        return view('frontend.products', compact('products', 'categories', 'stores'));
    }

    public function productDetail($id)
    {
        $product = Product::with([
            'images',
            'category',
            'variations.attributeValues.attribute',
            'tags',
        ])->findOrFail($id);

        $product->increment('views');

        $relatedProducts = Product::with('primaryImage')
            ->where('is_visible', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(5)->get();

        $stores = StoreLocation::where('is_active', true)->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts', 'stores'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        $categories = Category::where('is_visible', true)->orderBy('sort_order')->get();
        $stores = StoreLocation::where('is_active', true)->get();

        return view('frontend.contact', compact('categories', 'stores'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'content' => 'required|string',
        ]);

        ContactMessage::create($request->only('name', 'phone', 'email', 'content'));

        return back()->with('success', 'Cam on ban da gui tin nhan! Chung toi se phan hoi som nhat.');
    }

    public function stores()
    {
        $stores = Cache::remember('all_stores', 3600, fn() =>
            StoreLocation::where('is_active', true)->orderBy('sort_order')->get()
        );

        return view('frontend.stores', compact('stores'));
    }

    public function blog(Request $request)
    {
        $query = BlogPost::with('category', 'author')
            ->where('is_published', true);

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        $posts = $query->latest('published_at')->paginate(12);
        $blogCategories = BlogCategory::where('is_visible', true)->withCount('posts')->get();

        return view('frontend.blog', compact('posts', 'blogCategories'));
    }

    public function blogDetail($id)
    {
        $post = BlogPost::with('category', 'author')->findOrFail($id);
        $post->increment('views');

        $relatedPosts = BlogPost::where('is_published', true)
            ->where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->take(3)->get();

        $blogCategories = BlogCategory::where('is_visible', true)->withCount('posts')->get();
        $stores = StoreLocation::where('is_active', true)->get();

        return view('frontend.blog-detail', compact('post', 'relatedPosts', 'blogCategories', 'stores'));
    }

    public function checkout()
    {
        $stores = StoreLocation::where('is_active', true)->get();

        return view('frontend.checkout', compact('stores'));
    }

    public function guide()
    {
        $categories = Category::where('is_visible', true)->orderBy('sort_order')->get();
        $stores = StoreLocation::where('is_active', true)->get();

        return view('frontend.guide', compact('categories', 'stores'));
    }
}
