@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow text-center">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                        </div>
                        <h2 class="card-title mb-3">Appointment Booked Successfully!</h2>
                        <p class="text-muted mb-4">
                            Your appointment request has been received and verified. We will contact you shortly to confirm the appointment details.
                        </p>
                        
                        <!-- Appointment Details Card -->
                        <div class="card bg-light mb-4">
                            <div class="card-body text-start">
                                <h5 class="card-title mb-3">
                                    <i class="bi bi-info-circle text-primary"></i> Appointment Details
                                </h5>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Reference ID:</div>
                                    <div class="col-md-8">#{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}</div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Patient Name:</div>
                                    <div class="col-md-8">{{ $appointment->patient_name }}</div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Email:</div>
                                    <div class="col-md-8">{{ $appointment->patient_nicno }}</div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Phone:</div>
                                    <div class="col-md-8">{{ $appointment->patient_phone }}</div>
                                </div>
                                
                                <hr>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Doctor:</div>
                                    <div class="col-md-8">{{ $appointment->doctor->name ?? 'N/A' }}</div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Service:</div>
                                    <div class="col-md-8">{{ $appointment->service->name ?? 'N/A' }}</div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Date:</div>
                                    <div class="col-md-8">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y') }}</div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Time:</div>
                                    <div class="col-md-8">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</div>
                                </div>
                                
                                @if($appointment->notes)
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Notes:</div>
                                    <div class="col-md-8">{{ $appointment->notes }}</div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Next Steps -->
                        <div class="alert alert-info text-start">
                            <h6 class="mb-2"><i class="bi bi-lightbulb"></i> What's Next?</h6>
                            <ul class="mb-0">
                                <li>Our team will review your appointment request</li>
                                <li>You'll receive a confirmation call/SMS within 24 hours</li>
                                <li>Please arrive 15 minutes before your appointment time</li>
                                <li>Bring your ID and insurance card (if applicable)</li>
                            </ul>
                        </div>
                        
                        <div class="d-grid gap-2 col-md-6 mx-auto">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-house"></i> Go to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection