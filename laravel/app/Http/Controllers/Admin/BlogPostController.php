<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('category', 'author')
            ->latest()
            ->paginate(15);

        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::all();

        return view('admin.blog-posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'blog_category_id'  => 'nullable|exists:blog_categories,id',
            'featured_image'    => 'nullable|image|max:2048',
            'excerpt'           => 'nullable|string',
            'content'           => 'nullable|string',
            'is_published'      => 'nullable|boolean',
            'published_at'      => 'nullable|date',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('blog-posts', 'public');
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Bai viet da duoc tao thanh cong.');
    }

    public function show($id)
    {
        $post = BlogPost::with('category', 'author')->findOrFail($id);

        return view('admin.blog-posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        $categories = BlogCategory::all();

        return view('admin.blog-posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'blog_category_id'  => 'nullable|exists:blog_categories,id',
            'featured_image'    => 'nullable|image|max:2048',
            'excerpt'           => 'nullable|string',
            'content'           => 'nullable|string',
            'is_published'      => 'nullable|boolean',
            'published_at'      => 'nullable|date',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store('blog-posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Bai viet da duoc cap nhat thanh cong.');
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Bai viet da duoc xoa thanh cong.');
    }
}
