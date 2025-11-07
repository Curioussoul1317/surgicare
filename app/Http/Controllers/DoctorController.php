<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors.
     */
    public function index()
    {
        $doctors = Doctor::where('is_active', true)->paginate(9);
        
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Display the specified doctor.
     */
    public function show($id)
    {
        $doctor = Doctor::with('services')->findOrFail($id);
        
        return view('doctors.show', compact('doctor'));
    }
}