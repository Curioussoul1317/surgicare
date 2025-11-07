@extends('layouts.app')

@section('title', 'About Us - SurgiCare')

@section('content')
<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">About SurgiCare</h1>
        <p class="lead">Committed to excellence in healthcare since our establishment</p>
    </div>
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="mb-4">Our Story</h2>
                <p class="lead">SurgiCare has been a trusted name in healthcare for over a decade, providing comprehensive medical services to our community.</p>
                <p>Founded with the mission to deliver exceptional patient care, we have grown into a leading healthcare facility equipped with state-of-the-art technology and staffed by highly qualified medical professionals.</p>
                <p>Our commitment to excellence extends beyond medical treatment to encompass compassionate care, patient education, and community health initiatives.</p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600" 
                     class="img-fluid rounded shadow" alt="About SurgiCare">
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="bi bi-bullseye" style="font-size: 3rem;"></i>
                        </div>
                        <h3 class="card-title mb-3">Our Mission</h3>
                        <p class="card-text">To provide accessible, high-quality healthcare services that improve the health and well-being of our community through compassionate care, advanced medical expertise, and innovative treatment approaches.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="bi bi-eye" style="font-size: 3rem;"></i>
                        </div>
                        <h3 class="card-title mb-3">Our Vision</h3>
                        <p class="card-text">To be the leading healthcare provider recognized for excellence in patient care, medical innovation, and positive health outcomes, while maintaining the highest standards of medical ethics and professionalism.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Core Values</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-heart-pulse fs-1"></i>
                    </div>
                    <h5>Compassion</h5>
                    <p class="text-muted">We treat every patient with empathy and respect</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-check fs-1"></i>
                    </div>
                    <h5>Integrity</h5>
                    <p class="text-muted">Upholding the highest ethical standards</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-star fs-1"></i>
                    </div>
                    <h5>Excellence</h5>
                    <p class="text-muted">Striving for the best in everything we do</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-lightbulb fs-1"></i>
                    </div>
                    <h5>Innovation</h5>
                    <p class="text-muted">Embracing new technologies and approaches</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="display-4 fw-bold">10+</h2>
                <p class="lead">Years of Service</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="display-4 fw-bold">50+</h2>
                <p class="lead">Expert Doctors</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="display-4 fw-bold">25K+</h2>
                <p class="lead">Happy Patients</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="display-4 fw-bold">15+</h2>
                <p class="lead">Medical Services</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Why Choose SurgiCare</h2>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-people text-primary fs-1 mb-3"></i>
                        <h5 class="card-title">Experienced Team</h5>
                        <p class="card-text">Our medical professionals bring decades of combined experience in their respective specialties.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-cpu text-primary fs-1 mb-3"></i>
                        <h5 class="card-title">Advanced Technology</h5>
                        <p class="card-text">We utilize the latest medical equipment and technology for accurate diagnosis and treatment.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="bi bi-award text-primary fs-1 mb-3"></i>
                        <h5 class="card-title">Quality Care</h5>
                        <p class="card-text">Patient satisfaction and positive health outcomes are at the heart of everything we do.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Map -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Visit Us</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4">
                            <i class="bi bi-geo-alt text-primary"></i> Our Location
                        </h4>
                        <div class="mb-3">
                            <h6 class="text-muted">Address</h6>
                            <p>Male , maldives ........<br>
                            sssssssssssss<br>
                            ssssssssssss</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted">Phone</h6>
                            <p><i class="bi bi-telephone"></i> 9969317</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted">Email</h6>
                            <p><i class="bi bi-envelope"></i> info@surgicare.com</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted">Working Hours</h6>
                            <p class="mb-1">Monday - Friday: 8:00 AM - 8:00 PM</p>
                            <p class="mb-1">Saturday: 9:00 AM - 5:00 PM</p>
                            <p class="mb-0">Friday: Closed (Emergency services available)</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-envelope"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <!-- Google Maps Embed -->
                        <!-- Replace the src with your actual location coordinates -->
                      
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.222669547901!2d73.49800258367274!3d4.176582335159821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b3f7f004efe825f%3A0x67df325f312deb01!2sA.S%20CARPENTRY!5e0!3m2!1sen!2smv!4v1762462770077!5m2!1sen!2smv"     
                                width="100%" 
                            height="500" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded"></iframe>
                        <!-- <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1841894605634!2d-73.98513968459395!3d40.758895979328654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" 
                            width="100%" 
                            height="500" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded">
                        </iframe> -->
                        <small class="text-muted p-3 d-block">
                            <i class="bi bi-info-circle"></i> 
                            Note: 
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Ready to Experience Quality Healthcare?</h2>
        <p class="lead mb-4">Join thousands of satisfied patients who trust SurgiCare for their healthcare needs</p>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-lg me-2">
            <i class="bi bi-calendar-check"></i> Book Appointment
        </a>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
            <i class="bi bi-envelope"></i> Contact Us
        </a>
    </div>
</section>
@endsection