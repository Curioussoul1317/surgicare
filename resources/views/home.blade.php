@extends('layouts.app')

@section('title', 'SurgiCare - Home')

@section('content')
<!-- Hero Slider Section -->
@if($heroSliders->count() > 0)
<section class="hero-slider">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($heroSliders as $index => $slider)
            <button type="button" 
                    data-bs-target="#heroCarousel" 
                    data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach($heroSliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <!-- Slider Image -->
                <img src="{{ asset('storage/' . $slider->image) }}" 
                     class="d-block w-100" 
                     alt="{{ $slider->title }}"
                     style="height: 600px; object-fit: cover;">
                
                <!-- Overlay -->
                <div class="carousel-overlay"></div>
                
                <!-- Caption -->
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center">
                                @if($slider->title)
                                <h1 class="display-3 fw-bold mb-4 animate-fade-in-up">
                                    {{ $slider->title }}
                                </h1>
                                @endif
                                
                                @if($slider->subtitle)
                                <p class="lead mb-4 animate-fade-in-up" style="animation-delay: 0.2s;">
                                    {{ $slider->subtitle }}
                                </p>
                                @endif
                                
                                @if($slider->description)
                                <p class="mb-5 animate-fade-in-up" style="animation-delay: 0.3s;">
                                    {{ $slider->description }}
                                </p>
                                @endif
                                
                                @if($slider->button_text && $slider->button_link)
                                <div class="animate-fade-in-up" style="animation-delay: 0.4s;">
                                    <a href="{{ $slider->button_link }}" class="btn btn-light btn-lg">
                                        {{ $slider->button_text }} <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        @if($heroSliders->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        @endif
    </div>
</section>
@else
<!-- Default Hero Section (if no sliders) -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold mb-4">Welcome to SurgiCare</h1>
        <p class="lead mb-5">Your trusted partner for quality healthcare services</p>
        <div>
            <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg me-3">
                <i class="bi bi-calendar-check"></i> Book Appointment
            </a>
            <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-lg">
                <i class="bi bi-list-ul"></i> Our Services
            </a>
        </div>
    </div>
</section>
@endif

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="icon-circle mx-auto">
                    <i class="bi bi-person-hearts fs-1"></i>
                </div>
                <h4>Experienced Doctors</h4>
                <p class="text-muted">Highly qualified and experienced medical professionals</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="icon-circle mx-auto">
                    <i class="bi bi-hospital fs-1"></i>
                </div>
                <h4>Modern Facilities</h4>
                <p class="text-muted">State-of-the-art medical equipment and facilities</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="icon-circle mx-auto">
                    <i class="bi bi-clock-history fs-1"></i>
                </div>
                <h4>24/7 Emergency</h4>
                <p class="text-muted">Round-the-clock emergency medical services</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Services</h2>
            <div class="divider"></div>
            <p class="section-subtitle">Comprehensive healthcare services tailored to your needs</p>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-heart-pulse fs-1"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ Str::limit($service->short_description ?? $service->description, 100) }}</p>
                        @if($service->price)
                        <p class="text-primary fw-bold">Starting from Mvr {{ number_format($service->price, 2) }} /-</p>
                        @endif
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-lg">View All Services</a>
        </div>
    </div>
</section>

<!-- Doctors Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Expert Doctors</h2>
            <div class="divider"></div>
            <p class="section-subtitle">Meet our team of highly qualified medical professionals</p>
        </div>
        <div class="row">
            @foreach($doctors as $doctor)
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    @if($doctor->image)
                    <img src="{{ asset('storage/' . $doctor->image) }}" class="card-img-top" alt="{{ $doctor->name }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                        <i class="bi bi-person-circle fs-1"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="card-text text-muted">{{ $doctor->specialization }}</p>
                        <p class="small mb-2"><i class="bi bi-award"></i> {{ $doctor->experience_years }} years experience</p>
                        <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-sm btn-outline-primary">View Profile</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('doctors.index') }}" class="btn btn-outline-primary btn-lg">View All Doctors</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="mb-4">Ready to Schedule Your Appointment?</h2>
        <p class="lead mb-4">Our team is here to provide you with the best healthcare services</p>
        <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg">
            <i class="bi bi-calendar-check"></i> Book Now
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Hero Slider Styles */
    .hero-slider {
        position: relative;
        overflow: hidden;
    }
    
    .carousel-item {
        position: relative;
        height: 600px;
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(18, 153, 34, 0.8) 0%, rgba(13, 112, 24, 0.85) 100%);
    }
    
    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        bottom: auto;
    }
    
    .carousel-caption h1,
    .carousel-caption p {
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 3rem;
        height: 3rem;
        background-color: rgba(18, 153, 34, 0.8);
        border-radius: 50%;
    }
    
    .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: 2px solid #fff;
    }
    
    .carousel-indicators .active {
        background-color: #129922;
    }
    
    /* Fade animation for carousel */
    .carousel-fade .carousel-item {
        opacity: 0;
        transition: opacity 0.6s ease-in-out;
    }
    
    .carousel-fade .carousel-item.active {
        opacity: 1;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .carousel-item {
            height: 500px;
        }
        
        .carousel-caption h1 {
            font-size: 2rem;
        }
        
        .carousel-caption .lead {
            font-size: 1rem;
        }
    }
    
    @media (max-width: 576px) {
        .carousel-item {
            height: 400px;
        }
        
        .carousel-caption h1 {
            font-size: 1.5rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto-play carousel with custom interval
    var heroCarousel = document.getElementById('heroCarousel');
    if (heroCarousel) {
        var carousel = new bootstrap.Carousel(heroCarousel, {
            interval: 5000, // 5 seconds
            wrap: true,
            keyboard: true
        });
    }
</script>
@endpush