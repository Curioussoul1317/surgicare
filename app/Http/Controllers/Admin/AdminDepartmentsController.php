<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminDepartmentsController extends Controller
{
    /**
     * Display a listing of the departments.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departments = Department::query()
            ->when($search, function ($query, $search) {
                $query->search($search);
            })
            ->withCount(['doctors', 'services'])
            ->ordered()
            ->paginate(15);

        return view('admin.departments.index', compact('departments', 'search'));
    }

    /**
     * Show the form for creating a new department.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created department in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:departments,slug',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('departments', 'public');
        }

        $department = Department::create($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified department.
     */
    public function show(Department $department)
    {
        $department->load(['doctors', 'services']);
        
        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified department.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified department in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:departments,slug,' . $department->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($department->image) {
                Storage::disk('public')->delete($department->image);
            }
            $validated['image'] = $request->file('image')->store('departments', 'public');
        }

        $department->update($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified department from storage.
     */
    public function destroy(Department $department)
    {
        // Delete department image
        if ($department->image) {
            Storage::disk('public')->delete($department->image);
        }

        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department deleted successfully.');
    }

    /**
     * Show the form for assigning doctors to a department.
     */
    public function assignDoctors(Department $department)
    {
        $doctors = Doctor::orderBy('name')->get();
        $assignedDoctorIds = $department->doctors->pluck('id')->toArray();

        return view('admin.departments.assign-doctors', compact('department', 'doctors', 'assignedDoctorIds'));
    }

    /**
     * Store the assigned doctors for a department.
     */
    public function storeDoctors(Request $request, Department $department)
    {
        $validated = $request->validate([
            'doctors' => 'nullable|array',
            'doctors.*' => 'exists:doctors,id',
        ]);

        $doctorIds = $validated['doctors'] ?? [];
        $department->doctors()->sync($doctorIds);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Doctors assigned successfully.');
    }

    /**
     * Show the form for assigning services to a department.
     */
    public function assignServices(Department $department)
    {
        $services = Service::orderBy('name')->get();
        $assignedServiceIds = $department->services->pluck('id')->toArray();

        return view('admin.departments.assign-services', compact('department', 'services', 'assignedServiceIds'));
    }

    /**
     * Store the assigned services for a department.
     */
    public function storeServices(Request $request, Department $department)
    {
        $validated = $request->validate([
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $serviceIds = $validated['services'] ?? [];
        $department->services()->sync($serviceIds);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Services assigned successfully.');
    }
}