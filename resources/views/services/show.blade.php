@extends('layouts.app')

@section('title', $service->name . ' - SurgiCare')

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
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-white">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $service->name }}</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold"> {{ $service->name }}</h1> 
    </div>
</section>

<!-- Service Detail -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded mb-4" alt="{{ $service->name }}">
                @endif
                
                <div class="mb-4">
                    <h2 class="mb-3">About This Service</h2>
                    <p class="lead">{{ $service->description }}</p>
                </div>

                @if($service->doctors->count() > 0)
                <div class="mb-4">
                    <h3 class="mb-3">Doctors Providing This Service</h3>
                    <div class="row">
                        @foreach($service->doctors as $doctor)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        @if($doctor->image)
                                        <img src="{{ asset('storage/' . $doctor->image) }}" class="rounded-circle me-3" alt="{{ $doctor->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                            <i class="bi bi-person-circle fs-4"></i>
                                        </div>
                                        @endif
                                                           <div>
                                            <h5 class="mb-0">{{ $doctor->name }}</h5>
                                            <p class="text-muted small mb-0">{{ $doctor->specialization }}</p>
                                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-sm btn-link p-0 viewprofile">View Profile</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="card sticky-top" style="top: 100px;">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Service Information</h4>
                        
                        @if($service->price)
                        <div class="mb-3">
                            <h5 class="text-primary">
                                <i class="bi bi-tag"></i> Starting Price
                            </h5>
                            <p class="h4">Mvr{{ number_format($service->price, 2) }} /-</p>
                        </div>
                        @endif

                        @if($service->duration)
                        <div class="mb-3">
                            <h5 class="text-primary">
                                <i class="bi bi-clock"></i> Duration
                            </h5>
                            <p>{{ $service->duration }} minutes</p>
                        </div>
                        @endif

                        <hr>

                        <div class="d-grid gap-2">
                        <a href="{{ route('appointments.create', ['service_id' => $service->id]) }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-calendar-check me-2"></i> Book Appointment
                        </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                <i class="bi bi-question-circle"></i> Ask a Question
                            </a>
                        </div>

                        <div class="mt-4">
                            <h6 class="text-muted">Need Help?</h6>
                            <p class="small mb-1"><i class="bi bi-telephone"></i> 99969317</p>
                            <p class="small"><i class="bi bi-envelope"></i> info@surgicare.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Services -->
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="mb-4">Other Services You May Like</h3>
        <div class="row">
            @php
                $relatedServices = \App\Models\Service::where('is_active', true)
                    ->where('id', '!=', $service->id)
                    ->take(3)
                    ->get();
            @endphp
            
            @foreach($relatedServices as $relatedService)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($relatedService->image)
                    <img src="{{ asset('storage/' . $relatedService->image) }}" class="card-img-top" alt="{{ $relatedService->name }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-heart-pulse fs-1"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedService->name }}</h5>
                        <p class="card-text">{{ Str::limit($relatedService->short_description ?? $relatedService->description, 100) }}</p>
                        <a href="{{ route('services.show', $relatedService->id) }}" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection