@extends('layouts.app')

@section('title', 'Search Results - SurgiCare')

@section('content')
<!-- Search Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h1 class="display-5 fw-bold">Search Results</h1>
        @if($query)
        <p class="lead">Showing results for: <strong>"{{ $query }}"</strong></p>
        @else
        <p class="lead">Enter a search term to find services and doctors</p>
        @endif
    </div>
</section>

<!-- Search Form -->
<section class="py-4 bg-light">
    <div class="container">
        <form action="{{ route('search') }}" method="GET">
            <div class="row g-3">
                <div class="col-lg-6">
                    <input type="text" 
                           class="form-control form-control-lg" 
                           name="query" 
                           value="{{ $query }}"
                           placeholder="Search for services or doctors..."
                           required>
                </div>
                <div class="col-lg-3">
                    <select class="form-select form-select-lg" name="type">
                        <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All</option>
                        <option value="services" {{ $type === 'services' ? 'selected' : '' }}>Services Only</option>
                        <option value="doctors" {{ $type === 'doctors' ? 'selected' : '' }}>Doctors Only</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

@if($query)
<!-- Search Results -->
<section class="py-5">
    <div class="container">
        
        <!-- Services Results -->
        @if($type === 'all' || $type === 'services')
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <i class="bi bi-heart-pulse text-primary"></i> Services
                    <span class="badge bg-primary">{{ $services->total() }}</span>
                </h2>
                <a href="{{ route('search.services', ['query' => $query]) }}" class="btn btn-outline-primary">
                    Advanced Search <i class="bi bi-funnel"></i>
                </a>
            </div>
            
            @if($services->count() > 0)
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             class="card-img-top" 
                             alt="{{ $service->name }}" 
                             style="height: 200px; object-fit: cover;">
                        @else
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <i class="bi bi-heart-pulse fs-1"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">{{ Str::limit($service->short_description ?? $service->description, 100) }}</p>
                            @if($service->price)
                            <p class="text-primary fw-bold">
                                <i class="bi bi-tag"></i> Mvr {{ number_format($service->price, 2) }} /-
                            </p>
                            @endif
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary w-100">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-4">
                {{ $services->appends(['query' => $query, 'type' => $type])->links() }}
            </div>
            @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No services found matching your search.
            </div>
            @endif
        </div>
        @endif
        
        <!-- Doctors Results -->
        @if($type === 'all' || $type === 'doctors')
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <i class="bi bi-person-badge text-success"></i> Doctors
                    <span class="badge bg-success">{{ $doctors->total() }}</span>
                </h2>
                <a href="{{ route('search.doctors', ['query' => $query]) }}" class="btn btn-outline-success">
                    Advanced Search <i class="bi bi-funnel"></i>
                </a>
            </div>
            
            @if($doctors->count() > 0)
            <div class="row">
                @foreach($doctors as $doctor)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center">
                        @if($doctor->image)
                        <img src="{{ asset('storage/' . $doctor->image) }}" 
                             class="card-img-top" 
                             alt="{{ $doctor->name }}" 
                             style="height: 250px; object-fit: cover;">
                        @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                             style="height: 250px;">
                            <i class="bi bi-person-circle fs-1"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->name }}</h5>
                            <p class="card-text text-muted">{{ $doctor->specialization }}</p>
                            <p class="small mb-2">
                                <i class="bi bi-award text-primary"></i> 
                                {{ $doctor->experience_years }} years
                            </p>
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-sm btn-outline-primary">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-4">
                {{ $doctors->appends(['query' => $query, 'type' => $type])->links() }}
            </div>
            @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No doctors found matching your search.
            </div>
            @endif
        </div>
        @endif
        
        <!-- No Results -->
        @if(($type === 'all' || $type === 'services') && $services->count() === 0 && 
            ($type === 'all' || $type === 'doctors') && $doctors->count() === 0)
        <div class="text-center py-5">
            <i class="bi bi-search text-muted" style="font-size: 5rem;"></i>
            <h3 class="mt-4">No Results Found</h3>
            <p class="text-muted">We couldn't find any services or doctors matching "{{ $query }}"</p>
            <p class="text-muted">Try different keywords or browse our categories:</p>
            <div class="mt-4">
                <a href="{{ route('services.index') }}" class="btn btn-primary me-2">
                    Browse All Services
                </a>
                <a href="{{ route('doctors.index') }}" class="btn btn-success">
                    Browse All Doctors
                </a>
            </div>
        </div>
        @endif
    </div>
</section>
@endif
@endsection