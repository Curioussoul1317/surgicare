@extends('layouts.app')

@section('title', 'Search Doctors - SurgiCare')

@section('content')
<!-- Search Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h1 class="display-5 fw-bold">
            <i class="bi bi-person-badge"></i> Search Doctors
        </h1>
        <p class="lead">Find the right specialist for your healthcare needs</p>
    </div>
</section>

<!-- Search and Filters -->
<section class="py-4 bg-light">
    <div class="container">
        <form action="{{ route('search.doctors') }}" method="GET">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Search Query -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-search"></i> Search
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   name="query" 
                                   value="{{ $query }}"
                                   placeholder="Doctor name or qualification...">
                        </div>
                        
                        <!-- Specialization -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-stethoscope"></i> Specialization
                            </label>
                            <select class="form-select" name="specialization">
                                <option value="">All Specializations</option>
                                @foreach($specializations as $spec)
                                <option value="{{ $spec }}" {{ $specialization === $spec ? 'selected' : '' }}>
                                    {{ $spec }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Min Experience -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-award"></i> Minimum Experience (Years)
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   name="min_experience" 
                                   value="{{ $minExperience }}"
                                   placeholder="e.g. 5"
                                   min="0">
                        </div>
                        
                        <!-- Sort By -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-sort-down"></i> Sort By
                            </label>
                            <select class="form-select" name="sort_by">
                                <option value="name" {{ $sortBy === 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                                <option value="experience" {{ $sortBy === 'experience' ? 'selected' : '' }}>Experience (High to Low)</option>
                            </select>
                        </div>
                        
                        <!-- Buttons -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i> Search Doctors
                            </button>
                            <a href="{{ route('search.doctors') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i> Clear Filters
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Results Section -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                Search Results
                <span class="badge bg-success">{{ $doctors->total() }} Doctors</span>
            </h2>
            
            @if($query || $specialization || $minExperience)
            <div class="text-muted">
                @if($query)
                <span class="badge bg-light text-dark me-2">
                    Search: "{{ $query }}"
                </span>
                @endif
                @if($specialization)
                <span class="badge bg-light text-dark me-2">
                    Specialization: {{ $specialization }}
                </span>
                @endif
                @if($minExperience)
                <span class="badge bg-light text-dark">
                    Experience: {{ $minExperience }}+ years
                </span>
                @endif
            </div>
            @endif
        </div>
        
        @if($doctors->count() > 0)
        <div class="row">
            @foreach($doctors as $doctor)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    @if($doctor->image)
                    <img src="{{ asset('storage/' . $doctor->image) }}" 
                         class="card-img-top" 
                         alt="{{ $doctor->name }}" 
                         style="height: 280px; object-fit: cover;">
                    @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                         style="height: 280px;">
                        <i class="bi bi-person-circle" style="font-size: 5rem;"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="text-primary fw-bold">{{ $doctor->specialization }}</p>
                        <p class="card-text small">{{ $doctor->qualification }}</p>
                        
                        <div class="mb-3">
                            <span class="badge bg-info text-dark">
                                <i class="bi bi-award"></i> {{ $doctor->experience_years }} years experience
                            </span>
                        </div>
                        
                        @if($doctor->bio)
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($doctor->bio, 100) }}
                        </p>
                        @endif
                        
                        <div class="mt-auto">
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-envelope"></i> {{ $doctor->email }}
                                </small>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-telephone"></i> {{ $doctor->phone }}
                                </small>
                            </div>
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-primary w-100">
                                View Full Profile <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $doctors->links('custom.pagination') }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-inbox text-muted" style="font-size: 5rem;"></i>
            <h3 class="mt-4">No Doctors Found</h3>
            <p class="text-muted">Try adjusting your filters or search terms</p>
            <div class="mt-4">
                <a href="{{ route('search.doctors') }}" class="btn btn-primary">
                    <i class="bi bi-x-circle"></i> Clear All Filters
                </a>
                <a href="{{ route('doctors.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-people"></i> Browse All Doctors
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Specialization Quick Links -->
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="mb-4 text-center">Browse by Specialization</h3>
        <div class="row justify-content-center">
            @foreach($specializations->take(8) as $spec)
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="{{ route('search.doctors', ['specialization' => $spec]) }}" 
                   class="btn btn-outline-primary w-100">
                    <i class="bi bi-stethoscope"></i> {{ $spec }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection