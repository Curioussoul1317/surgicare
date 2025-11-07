@extends('layouts.app')

@section('title', 'Our Services - SurgiCare')

@section('content')
<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Our Services</h1>
        <p class="lead">Comprehensive healthcare services for all your medical needs</p>
    </div>
</section>

<!-- Services List -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                        <i class="bi bi-heart-pulse fs-1"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($service->short_description ?? $service->description, 120) }}</p>
                        <div class="mt-auto">
                            @if($service->price)
                            <p class="text-primary fw-bold mb-2">
                                <i class="bi bi-tag"></i> Starting from Mvr {{ number_format($service->price, 2) }} /-
                            </p>
                            @endif
                            @if($service->duration)
                            <p class="text-muted small mb-3">
                                <i class="bi bi-clock"></i> Duration: est {{ $service->duration }} minutes
                            </p>
                            @endif
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary w-100">
                                View Details <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No services available at the moment.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $services->links() }}
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h3 class="mb-3">Need to Book an Appointment?</h3>
        <p class="mb-4">Our team is ready to assist you with any of our services</p>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-calendar-check"></i> Book Appointment
        </a>
    </div>
</section>
@endsection