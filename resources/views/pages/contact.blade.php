@extends('layouts.app')

@section('title', 'Contact Us - SurgiCare')

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
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead">We're here to help. Get in touch with us today.</p>
    </div>
</section>
 

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">Send Us a Message</h3>
                        
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                       id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-send"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
            <div class="row"> 
            <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-building text-primary"></i> Main Office
                        </h5>
                        <p class="mb-2">
                            <i class="bi bi-geo-alt"></i> 
                            M. Rihaab<br>
                            Shaheed Ali Hingun<br>
                            Male' ,Rep. of Maldives ,20324
                        </p>
                    </div>
                </div>
            </div>
          
 
            <div class="row"> 
            <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-telephone text-primary"></i> Phone
                        </h5>
                        <p class="mb-2">
                            <strong>Main:</strong> 3310062<br> 
                            <strong>Appointments:</strong> 7292020
                        </p>
                    </div>
                </div>
            </div>
            <div class="row"> 
            <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-envelope text-primary"></i> Email
                        </h5>
                        <p class="mb-2">
                            <strong>General:</strong> info@surgicare.com<br>
                            <strong>Appointments:</strong> appointments@surgicare.com<br>
                            <strong>Support:</strong> support@surgicare.com
                        </p>
                    </div>
                </div>
            </div>
            <div class="row"> 
            <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-clock text-primary"></i> Working Hours
                        </h5>
                        <p class="mb-1"><strong>Saturday - Friday</strong></p>
                        <p class="mb-2">8:00 AM - 8:00 PM</p>
                        <p class="mb-1"><strong>Saturday</strong></p>
                        <p class="mb-2">9:00 AM - 5:00 PM</p>
                        <p class="mb-1"><strong>Sunday</strong></p>
                        <p class="mb-0">Closed (Emergency: 24/7)</p>
                    </div>
                </div>
            </div>
           
 
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact Options -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Other Ways to Reach Us</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="bi bi-calendar-check fs-1"></i>
                        </div>
                        <h5 class="card-title">Book an Appointment</h5>
                        <p class="card-text">Schedule a visit with our doctors online</p>
                        <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="bi bi-chat-dots fs-1"></i>
                        </div>
                        <h5 class="card-title">Live Chat</h5>
                        <p class="card-text">Chat with our support team in real-time</p>
                        <button class="btn btn-primary" onclick="alert('Chat feature coming soon!')">
                            Start Chat
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="bi bi-question-circle fs-1"></i>
                        </div>
                        <h5 class="card-title">FAQ</h5>
                        <p class="card-text">Find answers to common questions</p>
                        <button class="btn btn-primary" onclick="alert('FAQ page coming soon!')">
                            View FAQ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 
@endsection