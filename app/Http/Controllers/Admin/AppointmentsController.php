<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of appointments
     */
    public function index(Request $request)
    {
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

        return view('admin.appointments.index', compact('appointments', 'doctors'));
    }

    /**
     * Display the specified appointment
     */
    public function show(Appointment $appointment)
    {
        $appointment->load(['doctor', 'service']);
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Update the appointment status
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,rejected,completed,cancelled'
        ]);

        $appointment->update([
            'status' => $validated['status']
        ]);

        $statusMessage = ucfirst($validated['status']);
        
        return redirect()->back()
            ->with('success', "Appointment has been {$statusMessage} successfully.");
    }

    /**
     * Delete appointment
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}