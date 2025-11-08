@extends('layouts.app')

@section('title', 'Departments')

@section('content')

<section class="bg-primary text-white py-5 position-relative overflow-hidden" style="min-height: 40px;">
    <ul class="background">
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
    </ul>
    
    <div class="container position-relative" style="z-index: 1;">
        <h1 class="display-4 fw-bold">Our Departments</h1>
        <p class="lead">Explore our specialized medical departments and the services we offer.</p>
    </div>
</section>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-8"> 
        </div>
        <div class="col-lg-4">
            <form action="{{ route('departments.index') }}" method="GET" class="d-flex">
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search departments..." 
                       value="{{ $search }}">
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    @if($departments->isEmpty())
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            No departments found. Please try a different search.
        </div>
    @else
        <div class="row">
            @foreach($departments as $department)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    @if($department->image)
                    <img src="{{ asset('storage/' . $department->image) }}" 
                         class="card-img-top" 
                         alt="{{ $department->name }}"
                         style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        @if($department->icon)
                        <i class="{{ $department->icon }} fa-4x text-primary"></i>
                        @else
                        <i class="fas fa-hospital fa-4x text-primary"></i>
                        @endif
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $department->name }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($department->description, 100) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="fas fa-user-md me-1"></i> {{ $department->doctors_count }} Doctors
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-stethoscope me-1"></i> {{ $department->services_count }} Services
                            </small>
                        </div>
                        
                        <a href="{{ route('departments.show', $department->slug) }}" class="btn btn-primary w-100">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $departments->links() }}
        </div>
    @endif
</div>

<style>
.hover-shadow {
    transition: all 0.3s ease;
}

.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}
</style>
@endsection