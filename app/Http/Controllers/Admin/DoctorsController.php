<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorsController extends Controller
{
    /**
     * Display a listing of doctors
     */
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created doctor in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0|max:100',
            'bio' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email|max:255|unique:doctors,email',
            'phone' => 'required|string|max:20',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('doctors', 'public');
            $validated['image'] = $imagePath;
        }

        // Handle checkbox
        $validated['is_active'] = $request->boolean('is_active');

        Doctor::create($validated);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    /**
     * Show the form for editing the specified doctor
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified doctor in storage
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0|max:100',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email|max:255|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string|max:20',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($doctor->image) {
                Storage::disk('public')->delete($doctor->image);
            }
            
            $imagePath = $request->file('image')->store('doctors', 'public');
            $validated['image'] = $imagePath;
        }

        // Handle checkbox
        $validated['is_active'] = $request->boolean('is_active');

        $doctor->update($validated);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified doctor from storage
     */
    public function destroy(Doctor $doctor)
    {
        // Delete image
        if ($doctor->image) {
            Storage::disk('public')->delete($doctor->image);
        }

        $doctor->delete();

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor deleted successfully.');
    }
}