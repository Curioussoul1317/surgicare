@extends('layouts.app')

@section('title', $department->name)

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
    <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                    <li class="breadcrumb-item active">{{ $department->name }}</li>
                </ol>
            </nav>
        <h1 class="display-4 fw-bold">  {{ $department->name }}</h1>
        @if($department->description)
            <p class="lead">{{ $department->description }}</p>
            @endif 
    </div>
</section>

<div class="container py-5">
    <!-- Department Header -->
    <!-- <div class="row mb-5">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                    <li class="breadcrumb-item active">{{ $department->name }}</li>
                </ol>
            </nav>
            
            <h1 class="display-4 mb-3">
                @if($department->icon)
                <i class="{{ $department->icon }} me-2"></i>
                @endif
                {{ $department->name }}
            </h1>
            
            @if($department->description)
            <p class="lead text-muted">{{ $department->description }}</p>
            @endif
        </div>
        
        @if($department->image)
        <div class="col-lg-4">
            <img src="{{ asset('storage/' . $department->image) }}" 
                 class="img-fluid rounded shadow" 
                 alt="{{ $department->name }}">
        </div>
        @endif
    </div> -->

    <!-- Doctors Section -->
    @if($department->doctors->isNotEmpty())
    <div class="mb-5">
        <h2 class="mb-4">
            <i class="fas fa-user-md text-primary me-2"></i>
            Our Doctors
        </h2>
        
        <div class="row">
            @foreach($department->doctors as $doctor)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($doctor->image)
                    <img src="{{ asset('storage/' . $doctor->image) }}" 
                         class="card-img-top" 
                         alt="{{ $doctor->name }}"
                         style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                        <i class="fas fa-user-md fa-4x text-muted"></i>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        
                        @if($doctor->specialization)
                        <p class="text-muted mb-2">
                            <i class="fas fa-graduation-cap me-1"></i>
                            {{ $doctor->specialization }}
                        </p>
                        @endif
                        <!-- <a href="" class="btn btn-sm btn-link p-0 viewprofile"></a>  -->
                        <p class="text-muted mb-2">
                            <i class="fas fa-envelope me-1"></i>
                            <a href="{{ route('doctors.show', $doctor->id) }}">View Profile</a>
                        </p>
                        <!-- @if($doctor->email)
                        <p class="text-muted mb-2">
                            <i class="fas fa-envelope me-1"></i>
                            <a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a>
                        </p>
                        @endif -->
                        
                        <!-- @if($doctor->phone)
                        <p class="text-muted mb-2">
                            <i class="fas fa-phone me-1"></i>
                            {{ $doctor->phone }}
                        </p>
                        @endif -->
                         
                        @if(isset($doctor->slug))
                        <a href="{{ route('doctors.show', $doctor->slug) }}" class="btn btn-outline-primary btn-sm mt-2">
                            View Profile
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Services Section -->
    @if($department->services->isNotEmpty())
    <div class="mb-5">
        <h2 class="mb-4">
            <i class="fas fa-stethoscope text-primary me-2"></i>
            Our Services
        </h2>
        
        <div class="row">
            @foreach($department->services as $service)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            @if($service->icon)
                            <i class="{{ $service->icon }} text-primary me-2"></i>
                            @endif
                            {{ $service->name }}
                        </h5>
                        
                        @if($service->description)
                        <p class="card-text text-muted">{{ $service->description }}</p>
                        @endif
                        
                        @if($service->price)
                        <p class="mb-0">
                            <strong>Price:</strong> 
                            <span class="text-primary">Mvr{{ number_format($service->price, 2) }} /-</span>
                        </p>
                        @endif
                        
                        @if($service->duration)
                        <p class="mb-0">
                            <strong>Duration:</strong> {{ $service->duration }} minutes
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- CTA Section -->
    <div class="card bg-primary text-white">
        <div class="card-body text-center py-5">
            <h3 class="mb-3">Need to Book an Appointment?</h3>
            <p class="mb-4">Contact us today to schedule your visit with our expert team.</p>
            <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg">
                <i class="fas fa-calendar-check me-2"></i>
                Book Appointment
            </a>
        </div>
    </div>
</div>
@endsection