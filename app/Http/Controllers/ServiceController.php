<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::where('is_active', true)->paginate(9);
        
        return view('services.index', compact('services'));
    }

    /**
     * Display the specified service.
     */
    public function show($id)
    {
        $service = Service::with('doctors')->findOrFail($id);
        
        return view('services.show', compact('service'));
    }
}