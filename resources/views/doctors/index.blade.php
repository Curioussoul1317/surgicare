@extends('layouts.app')

@section('title', 'Our Doctors - SurgiCare')

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
        <h1 class="display-4 fw-bold">Our Expert Doctors</h1>
        <p class="lead">Meet our team of highly qualified and experienced medical professionals</p>
    </div>
</section>
 

<!-- Doctors List -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($doctors as $doctor)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    @if($doctor->image)
                    <img src="{{ asset('storage/' . $doctor->image) }}" class="card-img-top" alt="{{ $doctor->name }}" style="height: 300px; object-fit: cover;">
                    @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 300px;">
                        <i class="bi bi-person-circle" style="font-size: 5rem;"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="text-primary fw-bold">{{ $doctor->specialization }}</p>
                        <p class="card-text">{{ $doctor->qualification }}</p>
                        
                        <div class="mb-3">
                            <span class="badge bg-info text-dark">
                                <i class="bi bi-award"></i> {{ $doctor->experience_years }} years experience
                            </span>
                        </div>

                        @if($doctor->bio)
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($doctor->bio, 120) }}
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
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No doctors available at the moment.</p>
            </div>
            @endforelse
        </div>

 
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $doctors->links('custom.pagination') }}
        </div>
    </div>
</section>

<!-- Why Choose Our Doctors -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Why Choose Our Doctors</h2>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="bi bi-mortarboard fs-1"></i>
                </div>
                <h5>Highly Qualified</h5>
                <p class="text-muted">Board-certified with advanced degrees</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="bi bi-graph-up-arrow fs-1"></i>
                </div>
                <h5>Experienced</h5>
                <p class="text-muted">Years of clinical experience</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="bi bi-heart-pulse fs-1"></i>
                </div>
                <h5>Compassionate</h5>
                <p class="text-muted">Patient-centered care approach</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <i class="bi bi-award fs-1"></i>
                </div>
                <h5>Recognized</h5>
                <p class="text-muted">Award-winning healthcare providers</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center">
    <div class="container">
        <h3 class="mb-3">Ready to Meet Our Doctors?</h3>
        <p class="mb-4">Schedule an appointment with one of our specialists today</p>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-calendar-check"></i> Book Appointment
        </a>
    </div>
</section>
@endsection