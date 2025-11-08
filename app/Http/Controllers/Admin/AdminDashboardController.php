<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return view('admin.dashboard');
        $query = Appointment::with(['doctor', 'service'])
        ->latest('appointment_date')
        ->latest('appointment_time');

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter by date
    if ($request->filled('date')) {
        $query->whereDate('appointment_date', $request->date);
    }

    // Filter by doctor
    if ($request->filled('doctor_id')) {
        $query->where('doctor_id', $request->doctor_id);
    }

    // Search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('patient_name', 'like', "%{$search}%")
              ->orWhere('patient_email', 'like', "%{$search}%")
              ->orWhere('patient_phone', 'like', "%{$search}%");
        });
    }

    $appointments = $query->paginate(15);
    $doctors = Doctor::where('is_active', true)->get();

    return view('admin.dashboard', compact('appointments', 'doctors'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
