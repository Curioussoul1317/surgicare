@extends('layouts.app')

@section('title', 'Book Appointment - SurgiCare')

@section('content')
<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Book an Appointment</h1>
        <p class="lead">Schedule your visit with our expert doctors</p>
    </div>
</section>

<!-- Appointment Form -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">Appointment Details</h3>
                        
                        <!-- <form action="{{ route('appointments.store') }}" method="POST"> -->
                        <form action="{{ route('appointments.send-otp') }}" method="POST" id="appointmentForm">
                            @csrf

                            <div class="mb-3">
                                    <label for="patient_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('patient_name') is-invalid @enderror" 
                                           id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
                                    @error('patient_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            <div class="row">
                                

                                <div class="col-md-6 mb-3">
                                    <label for="patient_nicno" class="form-label">NIC Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('patient_nicno') is-invalid @enderror" 
                                           id="patient_nicno" name="patient_nicno" value="{{ old('patient_nicno') }}" required>
                                    @error('patient_nicno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="patient_phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('patient_phone') is-invalid @enderror" 
                                       id="patient_phone" name="patient_phone" value="{{ old('patient_phone') }}" required>
                                @error('patient_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            </div>

                            

                            <!-- <div class="mb-3">
                                <label for="doctor_id" class="form-label">Select Doctor <span class="text-danger">*</span></label>
                                <select class="form-select @error('doctor_id') is-invalid @enderror" 
                                        id="doctor_id" name="doctor_id" required>
                                    <option value="">Choose a doctor...</option>
                                    @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->name }} - {{ $doctor->specialization }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <!-- <div class="mb-3">
                                <label for="service_id" class="form-label">Select Service <span class="text-danger">*</span></label>
                                <select class="form-select @error('service_id') is-invalid @enderror" 
                                        id="service_id" name="service_id" required>
                                    <option value="">Choose a service...</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                        @if($service->price)
                                        - Mvr{{ number_format($service->price, 2) }}
                                        @endif
                                    </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Note: Services will be filtered based on selected doctor</small>
                            </div> -->

                            <!-- Doctor Selection -->
                        <!-- Doctor Selection -->
@if(!isset($selectedDoctorId))
    <div class="mb-3">
        <label for="doctor_id" class="form-label">Select Doctor <span class="text-danger">*</span></label>
        <select class="form-select @error('doctor_id') is-invalid @enderror" 
                id="doctor_id" name="doctor_id" required>
            <option value="">Choose a doctor...</option>
            @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                {{ $doctor->name }} - {{ $doctor->specialization }}
            </option>
            @endforeach
        </select>
        @error('doctor_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@else
    <!-- Hidden field with pre-selected doctor -->
    <input type="hidden" name="doctor_id" value="{{ $selectedDoctorId }}">
    
    <!-- Display selected doctor info with option to change -->
    <div class="mb-3">
        <label class="form-label">Selected Doctor</label>
        <div class="alert alert-info d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-person-check me-2"></i>
                <div>
                    <strong>{{ $selectedDoctor->name ?? 'Doctor' }}</strong>
                    @if(isset($selectedDoctor->specialization))
                        <br><small>{{ $selectedDoctor->specialization }}</small>
                    @endif
                </div>
            </div>
            <a href="{{ route('appointments.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-arrow-repeat"></i> Change
            </a>
        </div>
    </div>
@endif

<!-- Service Selection -->
@if(!isset($selectedServiceId))
    <div class="mb-3">
        <label for="service_id" class="form-label">Select Service <span class="text-danger">*</span></label>
        <select class="form-select @error('service_id') is-invalid @enderror" 
                id="service_id" name="service_id" required>
            <option value="">Choose a service...</option>
            @foreach($services as $service)
            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                {{ $service->name }}
                @if($service->price)
                - Mvr{{ number_format($service->price, 2) }}
                @endif
            </option>
            @endforeach
        </select>
        @error('service_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if(!isset($selectedDoctorId))
        <small class="text-muted">Services will be filtered based on selected doctor</small>
        @endif
    </div>
@else
    <!-- Hidden field with pre-selected service -->
    <input type="hidden" name="service_id" value="{{ $selectedServiceId }}">
    
    <!-- Display selected service info with option to change -->
    <div class="mb-3">
        <label class="form-label">Selected Service</label>
        <div class="alert alert-info d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-bandaid me-2"></i>
                <div>
                    <strong>{{ $selectedService->name ?? 'Service' }}</strong>
                    @if(isset($selectedService->price))
                        <br><small>Price: Mvr{{ number_format($selectedService->price, 2) }}</small>
                    @endif
                </div>
            </div>
            <a href="{{ route('appointments.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-arrow-repeat"></i> Change
            </a>
        </div>
    </div>
@endif

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="appointment_date" class="form-label">Preferred Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('appointment_date') is-invalid @enderror" 
                                           id="appointment_date" name="appointment_date" 
                                           value="{{ old('appointment_date') }}" 
                                           min="{{ date('Y-m-d') }}" required>
                                    @error('appointment_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="appointment_time" class="form-label">Preferred Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control @error('appointment_time') is-invalid @enderror" 
                                           id="appointment_time" name="appointment_time" 
                                           value="{{ old('appointment_time') }}" required>
                                    @error('appointment_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Additional Notes (Optional)</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" 
                                          id="notes" name="notes" rows="4" 
                                          placeholder="Please provide any additional information or specific concerns...">{{ old('notes') }}</textarea>
                                @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> 
                                <strong>Note:</strong> Your appointment request will be reviewed by our staff. 
                                We will contact you shortly to confirm the appointment.
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                    <i class="bi bi-calendar-check"></i> Book Appointment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-info-circle text-primary"></i> Important Information
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success"></i> 
                                Appointments are subject to availability
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success"></i> 
                                Please arrive 15 minutes early
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success"></i> 
                                Bring your insurance card and ID
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success"></i> 
                                We will confirm via email/phone
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- <div class="card shadow mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-telephone text-primary"></i> Need Help?
                        </h5>
                        <p>Contact our appointment desk:</p>
                        <p class="mb-1"><strong>Phone:</strong> +1 (555) 123-4567</p>
                        <p class="mb-1"><strong>Email:</strong> appointments@surgicare.com</p>
                        <p class="mb-0"><strong>Hours:</strong> Mon-Fri, 8AM-6PM</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')

<script>
document.getElementById('appointmentForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    
    // Disable button to prevent double submission
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending OTP...';
    
    // Re-enable after 5 seconds in case of error
    setTimeout(function() {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="bi bi-calendar-check"></i> Book Appointment';
    }, 5000);
});
</script>

<script>
    // Dynamic service filtering based on selected doctor
    document.getElementById('doctor_id').addEventListener('change', function() {
        const doctorId = this.value;
        const serviceSelect = document.getElementById('service_id');
        
        if (doctorId) {
            // Fetch services for the selected doctor
            fetch(`/appointments/doctor/${doctorId}/services`)
                .then(response => response.json())
                .then(services => {
                    serviceSelect.innerHTML = '<option value="">Choose a service...</option>';
                    services.forEach(service => {
                        const option = document.createElement('option');
                        option.value = service.id;
                        option.textContent = service.name;
                        if (service.price) {
                            option.textContent += ` - $${parseFloat(service.price).toFixed(2)}`;
                        }
                        serviceSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching services:', error);
                });
        } else {
            // Reset service dropdown if no doctor is selected
            serviceSelect.innerHTML = '<option value="">Choose a service...</option>';
            @foreach($services as $service)
            serviceSelect.innerHTML += '<option value="{{ $service->id }}">{{ $service->name }}@if($service->price) - ${{ number_format($service->price, 2) }}@endif</option>';
            @endforeach
        }
    });
 


 
</script> 

@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const doctorSelect = document.getElementById('doctor_id');
    const serviceSelect = document.getElementById('service_id');
     
    if (!doctorSelect || !serviceSelect) {
        return;
    }
     
    const originalServices = Array.from(serviceSelect.options);
    
    console.log('One-way doctor->service filtering initialized');
     
    doctorSelect.addEventListener('change', function() {
        const doctorId = this.value;
        
        console.log('Doctor changed:', doctorId);
        
        if (!doctorId) { 
            serviceSelect.innerHTML = '';
            originalServices.forEach(option => {
                serviceSelect.appendChild(option.cloneNode(true));
            });
            serviceSelect.value = '';
            return;
        }
         
        serviceSelect.disabled = true;
        const currentServiceId = serviceSelect.value;
        serviceSelect.innerHTML = '<option value="">Loading services...</option>';
         
        fetch(`/appointments/doctor/${doctorId}/services`)
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                return response.json();
            })
            .then(services => {
                console.log('Services received:', services.length);
                
             
                serviceSelect.innerHTML = '<option value="">Choose a service...</option>';
                
                services.forEach(service => {
                    const option = document.createElement('option');
                    option.value = service.id;
                    option.textContent = service.name;
                    if (service.price) {
                        option.textContent += ` - Mvr${parseFloat(service.price).toFixed(2)}`;
                    }
                    serviceSelect.appendChild(option);
                });
                
                serviceSelect.disabled = false;
                 
                if (currentServiceId && services.some(s => s.id == currentServiceId)) {
                    serviceSelect.value = currentServiceId;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                serviceSelect.disabled = false;
                serviceSelect.innerHTML = '';
                originalServices.forEach(option => {
                    serviceSelect.appendChild(option.cloneNode(true));
                });
                if (currentServiceId) {
                    serviceSelect.value = currentServiceId;
                }
            });
    });
     
});
</script>
@endpush