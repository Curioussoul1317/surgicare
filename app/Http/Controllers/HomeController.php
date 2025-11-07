<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Doctor;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
  
        $heroSliders = HeroSlider::active()->ordered()->get();
         
        $services = Service::where('is_active', true)->take(6)->get();
        $doctors = Doctor::where('is_active', true)->take(4)->get();
        
        return view('home', compact('heroSliders', 'services', 'doctors'));
    }
}
   