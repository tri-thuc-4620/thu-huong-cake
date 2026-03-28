<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order')->paginate(15);

        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'badge_text'    => 'nullable|string|max:100',
            'title_line_1'  => 'nullable|string|max:255',
            'title_line_2'  => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'button_1_text' => 'nullable|string|max:100',
            'button_1_url'  => 'nullable|string|max:500',
            'button_2_text' => 'nullable|string|max:100',
            'button_2_url'  => 'nullable|string|max:500',
            'image'         => 'required|image|max:2048',
            'is_active'     => 'nullable|boolean',
            'sort_order'    => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('hero-slides', 'public');
        }

        HeroSlide::create($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide da duoc tao thanh cong.');
    }

    public function show($id)
    {
        $slide = HeroSlide::findOrFail($id);

        return view('admin.hero-slides.show', compact('slide'));
    }

    public function edit($id)
    {
        $slide = HeroSlide::findOrFail($id);

        return view('admin.hero-slides.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $slide = HeroSlide::findOrFail($id);

        $validated = $request->validate([
            'badge_text'    => 'nullable|string|max:100',
            'title_line_1'  => 'nullable|string|max:255',
            'title_line_2'  => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'button_1_text' => 'nullable|string|max:100',
            'button_1_url'  => 'nullable|string|max:500',
            'button_2_text' => 'nullable|string|max:100',
            'button_2_url'  => 'nullable|string|max:500',
            'image'         => 'nullable|image|max:2048',
            'is_active'     => 'nullable|boolean',
            'sort_order'    => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
            $validated['image'] = $request->file('image')->store('hero-slides', 'public');
        }

        $slide->update($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide da duoc cap nhat thanh cong.');
    }

    public function destroy($id)
    {
        $slide = HeroSlide::findOrFail($id);

        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide da duoc xoa thanh cong.');
    }
}
