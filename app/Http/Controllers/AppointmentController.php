<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $doctors = Doctor::where('is_active', true)->get();
        $services = Service::where('is_active', true)->get();
        
        return view('appointments.create', compact('doctors', 'services'));
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_phone' => 'required|string|max:20',
            'doctor_id' => 'required|exists:doctors,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string'
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.create')
            ->with('success', 'Appointment booked successfully! We will contact you shortly.');
    }

    /**
     * Get services for a specific doctor (AJAX endpoint).
     */
    public function getServicesByDoctor($doctorId)
    {
        $doctor = Doctor::with('services')->findOrFail($doctorId);
        return response()->json($doctor->services);
    }
}