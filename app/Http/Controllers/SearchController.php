<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search services and doctors
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type', 'all'); // all, services, doctors
        
        $services = collect();
        $doctors = collect();
        
        if ($query) {
            if ($type === 'all' || $type === 'services') {
                $services = Service::where('is_active', true)
                    ->where(function($q) use ($query) {
                        $q->where('name', 'LIKE', "%{$query}%")
                          ->orWhere('description', 'LIKE', "%{$query}%")
                          ->orWhere('short_description', 'LIKE', "%{$query}%");
                    })
                    ->paginate(12);
            }
            
            if ($type === 'all' || $type === 'doctors') {
                $doctors = Doctor::where('is_active', true)
                    ->where(function($q) use ($query) {
                        $q->where('name', 'LIKE', "%{$query}%")
                          ->orWhere('specialization', 'LIKE', "%{$query}%")
                          ->orWhere('qualification', 'LIKE', "%{$query}%")
                          ->orWhere('bio', 'LIKE', "%{$query}%");
                    })
                    ->paginate(12);
            }
        }
        
        return view('search.index', compact('query', 'type', 'services', 'doctors'));
    }
    
    /**
     * Advanced search for services
     */
    public function searchServices(Request $request)
    {
        $query = $request->input('query');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sortBy = $request->input('sort_by', 'name'); // name, price_asc, price_desc
        
        $services = Service::where('is_active', true);
        
        // Text search
        if ($query) {
            $services->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('short_description', 'LIKE', "%{$query}%");
            });
        }
        
        // Price filter
        if ($minPrice) {
            $services->where('price', '>=', $minPrice);
        }
        
        if ($maxPrice) {
            $services->where('price', '<=', $maxPrice);
        }
        
        // Sorting
        switch ($sortBy) {
            case 'price_asc':
                $services->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $services->orderBy('price', 'desc');
                break;
            default:
                $services->orderBy('name', 'asc');
                break;
        }
        
        $services = $services->paginate(12)->appends($request->all());
        
        return view('search.services', compact('services', 'query', 'minPrice', 'maxPrice', 'sortBy'));
    }
    
    /**
     * Advanced search for doctors
     */
    public function searchDoctors(Request $request)
    {
        $query = $request->input('query');
        $specialization = $request->input('specialization');
        $minExperience = $request->input('min_experience');
        $sortBy = $request->input('sort_by', 'name'); // name, experience
        
        $doctors = Doctor::where('is_active', true);
        
        // Text search
        if ($query) {
            $doctors->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('specialization', 'LIKE', "%{$query}%")
                  ->orWhere('qualification', 'LIKE', "%{$query}%")
                  ->orWhere('bio', 'LIKE', "%{$query}%");
            });
        }
        
        // Specialization filter
        if ($specialization) {
            $doctors->where('specialization', 'LIKE', "%{$specialization}%");
        }
        
        // Experience filter
        if ($minExperience) {
            $doctors->where('experience_years', '>=', $minExperience);
        }
        
        // Sorting
        switch ($sortBy) {
            case 'experience':
                $doctors->orderBy('experience_years', 'desc');
                break;
            default:
                $doctors->orderBy('name', 'asc');
                break;
        }
        
        $doctors = $doctors->paginate(12)->appends($request->all());
        
        // Get unique specializations for filter dropdown
        $specializations = Doctor::where('is_active', true)
            ->distinct()
            ->pluck('specialization')
            ->sort();
        
        return view('search.doctors', compact('doctors', 'query', 'specialization', 'minExperience', 'sortBy', 'specializations'));
    }
    
    /**
     * AJAX live search
     */
    public function liveSearch(Request $request)
    {
        $query = $request->input('query');
        $limit = $request->input('limit', 5);
        
        if (strlen($query) < 2) {
            return response()->json(['services' => [], 'doctors' => []]);
        }
        
        $services = Service::where('is_active', true)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->take($limit)
            ->get(['id', 'name', 'price', 'image']);
        
        $doctors = Doctor::where('is_active', true)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('specialization', 'LIKE', "%{$query}%");
            })
            ->take($limit)
            ->get(['id', 'name', 'specialization', 'image']);
        
        return response()->json([
            'services' => $services,
            'doctors' => $doctors
        ]);
    }
}