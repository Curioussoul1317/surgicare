@extends('layouts.app')

@section('title', $doctor->name . ' - SurgiCare')

@section('content')
<!-- Page Header -->
 
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
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}" class="text-white text-decoration-none">Doctors</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $doctor->name }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold">{{ $doctor->name }}</h1> 
        <p class="lead">{{ $doctor->specialization }}</p>
    </div>
</section>


<!-- Doctor Profile -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0"> 
                    @if($doctor->image)
                    <img src="{{ asset('storage/' . $doctor->image) }}" 
                         class="card-img-top" 
                         alt="{{ $doctor->name }}"
                         style="height: 350px; object-fit: cover; object-position: center;">
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 350px;">
                        <i class="bi bi-person-circle text-secondary" style="font-size: 8rem;"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <h4 class="card-title mb-1">{{ $doctor->name }}</h4>
                        <p class="text-primary fw-semibold mb-4">{{ $doctor->specialization }}</p>
                        
                        <div class="mb-4">
                            <h6 class="text-uppercase text-muted small fw-bold mb-2">Qualification</h6>
                            <p class="mb-0">{{ $doctor->qualification }}</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-uppercase text-muted small fw-bold mb-2">Experience</h6>
                            <p class="mb-0">
                                <i class="bi bi-award text-primary me-2"></i>
                                <strong>{{ $doctor->experience_years }}</strong> years of experience
                            </p>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <h6 class="text-uppercase text-muted small fw-bold mb-3">Contact Information</h6>
                            <p class="small mb-2">
                                <i class="bi bi-envelope text-primary me-2"></i> 
                                <a href="mailto:{{ $doctor->email }}" class="text-decoration-none">{{ $doctor->email }}</a>
                            </p>
                            <p class="small mb-0">
                                <i class="bi bi-telephone text-primary me-2"></i> 
                                <a href="tel:{{ $doctor->phone }}" class="text-decoration-none">{{ $doctor->phone }}</a>
                            </p>
                        </div>

                        <div class="d-grid">
                        <a href="{{ route('appointments.create', ['doctor_id' => $doctor->id]) }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-calendar-check me-2"></i> Book Appointment
                        </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- About Section -->
                @if($doctor->bio)
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <h3 class="card-title h4 mb-3">
                            <i class="bi bi-person-badge text-primary me-2"></i>
                            About Dr. {{ explode(' ', $doctor->name)[0] }}
                        </h3>
                        <p class="card-text text-muted" style="white-space: pre-line; line-height: 1.8;">{{ $doctor->bio }}</p>
                    </div>


                     <!-- Services Section -->
                @if($doctor->services->count() > 0) 
                    <div class="card-body p-4">
                        <h3 class="card-title h4 mb-4">
                            <i class="bi bi-heart-pulse text-primary me-2"></i>
                            Services Provided
                        </h3>
                        <div class="row g-3">
                            @foreach($doctor->services as $service)
                            <div class="col-md-6">
                                <div class="card h-100 border shadow-sm hover-lift">
                                    @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         class="card-img-top" 
                                         alt="{{ $service->name }}" 
                                         style="height: 180px; object-fit: cover;">
                                    @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                                        <i class="bi bi-bandaid text-primary" style="font-size: 3rem;"></i>
                                    </div>
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title h6 mb-2">{{ $service->name }}</h5>
                                        <p class="card-text small text-muted flex-grow-1">
                                            {{ Str::limit($service->short_description ?? $service->description, 100) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            @if($service->price)
                                            <span class="text-primary fw-bold">
                                                <i class="bi bi-tag-fill me-1"></i>Mvr {{ number_format($service->price, 2) }} /-
                                            </span>
                                            @endif
                                            @if($service->duration)
                                            <span class="text-muted small">
                                                <i class="bi bi-clock me-1"></i>{{ $service->duration }} min
                                            </span>
                                            @endif
                                        </div>
                                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-outline-primary btn-sm mt-3 w-100">
                                            <i class="bi bi-info-circle me-1"></i> Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> 
                @endif

             
                    <div class="card-body p-4">
                        <h3 class="card-title h4 mb-4">
                            <i class="bi bi-star text-primary me-2"></i>
                            Professional Highlights
                        </h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-patch-check-fill text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Board Certified</h6>
                                        <p class="text-muted small mb-0">In {{ $doctor->specialization }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-award-fill text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Extensive Experience</h6>
                                        <p class="text-muted small mb-0">{{ $doctor->experience_years }}+ years of clinical practice</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-heart-pulse-fill text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Specialized Services</h6>
                                        <p class="text-muted small mb-0">Provides {{ $doctor->services->count() }} specialized treatments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-people-fill text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Patient-Centered Care</h6>
                                        <p class="text-muted small mb-0">Committed to individualized treatment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
           

                </div>
                @endif

                <div class="row">
               

                <!-- Professional Highlights -->
             
                </div>

            </div>
        </div>
    </div>
</section>
 
<!-- Other Doctors -->
@php
    $otherDoctors = \App\Models\Doctor::where('is_active', true)
        ->where('id', '!=', $doctor->id)
        ->take(3)
        ->get();
@endphp

@if($otherDoctors->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="h2 mb-2">Meet Our Other Specialists</h3>
            <p class="text-muted">Explore more of our expert medical professionals</p>
        </div>
        <div class="row g-4">
            @foreach($otherDoctors as $otherDoctor)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    @if($otherDoctor->image)
                    <img src="{{ asset('storage/' . $otherDoctor->image) }}" 
                         class="card-img-top" 
                         alt="{{ $otherDoctor->name }}" 
                         style="height: 300px; object-fit: cover; object-position: center top;">
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                        <i class="bi bi-person-circle text-secondary" style="font-size: 5rem;"></i>
                    </div>
                    @endif
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-1">{{ $otherDoctor->name }}</h5>
                        <p class="text-primary fw-semibold mb-3">{{ $otherDoctor->specialization }}</p>
                        <p class="text-muted small mb-3">
                            <i class="bi bi-award me-1"></i> {{ $otherDoctor->experience_years }} years experience
                        </p>
                        <p class="text-muted small mb-3">{{ $otherDoctor->qualification }}</p>
                        <a href="{{ route('doctors.show', $otherDoctor->id) }}" class="btn btn-outline-primary">
                            <i class="bi bi-person-lines-fill me-2"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.7);
    }

    .card {
        transition: all 0.3s ease;
    }
</style>
@endpush