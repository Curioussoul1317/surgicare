<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the hero sliders.
     */
    public function index()
    {
        $sliders = HeroSlider::ordered()->paginate(10);
        return view('admin.hero-sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new hero slider.
     */
    public function create()
    {
        return view('admin.hero-sliders.create');
    }

    /**
     * Store a newly created hero slider in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'button_text' => 'nullable|string|max:100',
            // 'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            // Remove is_active from validation or make it nullable
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hero-sliders', 'public');
            $validated['image'] = $imagePath;
        }
    
        // Handle checkbox - Laravel's boolean() method handles this perfectly
        $validated['is_active'] = $request->boolean('is_active');
    
        // Set default order if not provided
        if (!isset($validated['order'])) {
            $maxOrder = HeroSlider::max('order');
            $validated['order'] = $maxOrder ? $maxOrder + 1 : 1;
        }
    
        HeroSlider::create($validated);
    
        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider created successfully.');
    }

    /**
     * Show the form for editing the specified hero slider.
     */
    public function edit(HeroSlider $heroSlider)
    {
        return view('admin.hero-sliders.edit', compact('heroSlider'));
    }

    /**
     * Update the specified hero slider in storage.
     */
    public function update(Request $request, HeroSlider $heroSlider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'button_text' => 'nullable|string|max:100',
            // 'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            // Remove is_active from validation
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($heroSlider->image) {
                Storage::disk('public')->delete($heroSlider->image);
            }
            
            $imagePath = $request->file('image')->store('hero-sliders', 'public');
            $validated['image'] = $imagePath;
        }
    
        // Handle checkbox properly
        $validated['is_active'] = $request->boolean('is_active');
    
        $heroSlider->update($validated);
    
        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider updated successfully.');
    }

    /**
     * Remove the specified hero slider from storage.
     */
    public function destroy(HeroSlider $heroSlider)
    {
        // Delete image from storage
        if ($heroSlider->image) {
            Storage::disk('public')->delete($heroSlider->image);
        }

        $heroSlider->delete();

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider deleted successfully.');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(HeroSlider $heroSlider)
    {
        $heroSlider->update([
            'is_active' => !$heroSlider->is_active
        ]);

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Status updated successfully.');
    }
}