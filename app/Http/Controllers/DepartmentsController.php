<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of departments.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departments = Department::active()
            ->ordered()
            ->when($search, function ($query, $search) {
                $query->search($search);
            })
            ->withCount(['doctors', 'services'])
            ->paginate(12);

        return view('departments.index', compact('departments', 'search'));
    }

    /**
     * Display the specified department.
     */
    public function show(Department $department)
    {
        // Load relationships
        $department->load([
            'doctors' => function ($query) {
                $query->where('is_active', true)->orderBy('name');
            },
            'services' => function ($query) {
                $query->where('is_active', true)->orderBy('name');
            }
        ]);

        return view('departments.show', compact('department'));
    }

    /**
     * Search departments via AJAX.
     */
    public function search(Request $request)
    {
        $search = $request->input('query');

        $departments = Department::active()
            ->search($search)
            ->ordered()
            ->withCount(['doctors', 'services'])
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'departments' => $departments
        ]);
    }
}