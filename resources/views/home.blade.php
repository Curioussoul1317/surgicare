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



<!-- Now Serving Section - Simple Version (No Appointment Status Required) -->
<section class="py-4 bg-light">
    <div class="container">
        <!-- Header with Professional Time Display -->
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center gap-3 mb-3">
                <div class="live-indicator">
                    <span class="pulse-dot"></span>
                    <span class="text-uppercase fw-semibold" style="color: var(--primary-color); font-size: 0.875rem; letter-spacing: 0.5px;">Live Now</span>
                </div>
                <div class="time-display">
                    <i class="bi bi-clock me-2" style="color: var(--primary-light);"></i>
                    <span class="fw-bold" style="color: var(--text-primary); font-size: 1.125rem;">
                        <?php echo date("g:i A"); ?>
                    </span>
                </div>
            </div>
            <h2 class="fw-bold mb-2" style="color: var(--text-primary);">Doctors On Duty</h2>
            <p class="text-muted mb-0">Current Token Number and Room</p>
        </div>

        <!-- Doctors Cards -->
        <div class="row g-3 justify-content-center">
            @forelse($doctors as $doctor)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="doctor-duty-card">
                    <!-- Doctor Initial/Avatar -->
                    <div class="doctor-avatar">
                        <span>{{ strtoupper(substr($doctor->name, 0, 1)) }}</span>
                    </div>

                    <!-- Doctor Info -->
                    <h6 class="doctor-name">{{ $doctor->name }}</h6>
                    <p class="doctor-specialty">{{ $doctor->specialization }}</p>

                    <!-- Room Number Badge -->
                    <div class="room-badge">
                        <i class="bi bi-door-closed me-1"></i>
                        <span>Room {{ $doctor->room_number ?? 'N/A' }}</span>
                    </div>
                    <div class="room-badge">
                        <i class="bi bi-door-closed me-1"></i>
                        <span>Token {{ $doctor->room_number ?? 'N/A' }}</span>
                    </div>

                    <!-- Status Indicator -->
                    <div class="status-indicator">
                        <span class="status-dot"></span>
                        <span class="status-text">Available</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-calendar-x" style="font-size: 3rem; color: var(--text-light);"></i>
                    <p class="text-muted mt-3">No doctors currently on duty</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
/* Live Indicator */
.live-indicator {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(44, 105, 117, 0.05);
    border-radius: 50px;
}

.pulse-dot {
    width: 8px;
    height: 8px;
    background: #e74c3c;
    border-radius: 50%;
    position: relative;
    animation: pulse-animation 2s ease-out infinite;
}

@keyframes pulse-animation {
    0% {
        box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(231, 76, 60, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(231, 76, 60, 0);
    }
}

/* Time Display */
.time-display {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    background: white;
    border-radius: 50px;
    box-shadow: 0 2px 8px rgba(44, 105, 117, 0.08);
}

/* Doctor Duty Card */
.doctor-duty-card {
    background: white;
    border-radius: 1rem;
    padding: 1.75rem 1.25rem;
    text-align: center;
    border: 1px solid #e1e6e9;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.doctor-duty-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #2c6975, #68a5b3);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.doctor-duty-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 24px rgba(44, 105, 117, 0.15);
    border-color: #68a5b3;
}

.doctor-duty-card:hover::before {
    transform: scaleX(1);
}

/* Doctor Avatar */
.doctor-avatar {
    width: 70px;
    height: 70px;
    margin: 0 auto 1rem;
    background: linear-gradient(135deg, #2c6975 0%, #68a5b3 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    font-weight: 700;
    color: white;
    box-shadow: 0 4px 12px rgba(44, 105, 117, 0.2);
    transition: all 0.3s ease;
}

.doctor-duty-card:hover .doctor-avatar {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 6px 16px rgba(44, 105, 117, 0.3);
}

/* Doctor Info */
.doctor-name {
    font-size: 1rem;
    font-weight: 700;
    color: #2c3e4f;
    margin-bottom: 0.375rem;
    letter-spacing: -0.01em;
}

.doctor-specialty {
    font-size: 0.813rem;
    color: #6c7a89;
    margin-bottom: 1rem;
    line-height: 1.4;
}

/* Room Badge */
.room-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    padding: 0.375rem 0.875rem;
    background: linear-gradient(135deg, rgba(44, 105, 117, 0.08) 0%, rgba(104, 165, 179, 0.08) 100%);
    border-radius: 50px;
    font-size: 0.813rem;
    font-weight: 600;
    color: #2c6975;
    margin-bottom: 0.875rem;
    border: 1px solid rgba(44, 105, 117, 0.1);
}

.room-badge i {
    font-size: 0.875rem;
}

/* Status Indicator */
.status-indicator {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.75rem;
    color: #4a9d7f;
    font-weight: 600;
}

.status-dot {
    width: 6px;
    height: 6px;
    background: #4a9d7f;
    border-radius: 50%;
    animation: pulse-dot 2s ease-in-out infinite;
}

@keyframes pulse-dot {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .doctor-duty-card {
        padding: 1.5rem 1rem;
    }

    .doctor-avatar {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }

    .doctor-name {
        font-size: 0.938rem;
    }

    .doctor-specialty {
        font-size: 0.75rem;
    }
}

@media (max-width: 575px) {
    .live-indicator,
    .time-display {
        padding: 0.375rem 0.75rem;
        font-size: 0.813rem;
    }

    .time-display span {
        font-size: 1rem !important;
    }
}
</style>
 

          <!-- Features Section -->
<!-- <section class="py-5 bg-light">
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
</section> -->


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