<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroSlideRequest;
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

    public function store(HeroSlideRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hero-slides', 'public');
        }

        HeroSlide::create($data);

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

    public function update(HeroSlideRequest $request, $id)
    {
        $slide = HeroSlide::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
            $data['image'] = $request->file('image')->store('hero-slides', 'public');
        }

        $slide->update($data);

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
