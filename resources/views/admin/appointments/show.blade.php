@extends('admin.layouts.app')

@section('title', 'Appointment Details - Admin')
@section('page-title', 'Appointment Details')

@section('content')
<div class="container-fluid">
    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Appointment #{{ $appointment->id }}</h5>
                    @switch($appointment->status)
                        @case('pending')
                            <span class="badge bg-warning fs-6">Pending</span>
                            @break
                        @case('confirmed')
                            <span class="badge bg-success fs-6">Confirmed</span>
                            @break
                        @case('completed')
                            <span class="badge bg-info fs-6">Completed</span>
                            @break
                        @case('rejected')
                            <span class="badge bg-danger fs-6">Rejected</span>
                            @break
                        @case('cancelled')
                            <span class="badge bg-secondary fs-6">Cancelled</span>
                            @break
                    @endswitch
                </div>
                <div class="card-body">
                    <!-- Patient Information -->
                    <h6 class="border-bottom pb-2 mb-3">
                        <i class="bi bi-person-circle text-primary"></i> Patient Information
                    </h6>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Name:</strong><br>{{ $appointment->patient_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong><br>{{ $appointment->patient_email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Phone:</strong><br>{{ $appointment->patient_phone }}</p>
                        </div>
                    </div>

                    <!-- Appointment Details -->
                    <h6 class="border-bottom pb-2 mb-3">
                        <i class="bi bi-calendar-check text-primary"></i> Appointment Details
                    </h6>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Date:</strong><br>
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F d, Y') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Time:</strong><br>
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Doctor:</strong><br>
                                @if($appointment->doctor)
                                    {{ $appointment->doctor->name }}<br>
                                    <small class="text-muted">{{ $appointment->doctor->specialization }}</small>
                                @else
                                    <span class="text-muted">Not assigned</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Service:</strong><br>
                                @if($appointment->service)
                                    {{ $appointment->service->name }}<br>
                                    <small class="text-muted">${{ number_format($appointment->service->price, 2) }} - {{ $appointment->service->duration }} min</small>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Notes -->
                    @if($appointment->notes)
                    <h6 class="border-bottom pb-2 mb-3">
                        <i class="bi bi-file-text text-primary"></i> Patient Notes
                    </h6>
                    <div class="alert alert-light">
                        {{ $appointment->notes }}
                    </div>
                    @endif

                    <!-- Timestamps -->
                    <div class="row mt-4 pt-3 border-top">
                        <div class="col-md-6">
                            <small class="text-muted">
                                <i class="bi bi-clock"></i> Created: {{ $appointment->created_at->format('M d, Y h:i A') }}
                            </small>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">
                                <i class="bi bi-arrow-clockwise"></i> Updated: {{ $appointment->updated_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Actions Card -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-gear"></i> Actions
                    </h6>
                </div>
                <div class="card-body">
                    @if($appointment->status === 'pending')
                        <form action="{{ route('admin.appointments.updateStatus', $appointment) }}" method="POST" class="mb-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="confirmed">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-check-circle"></i> Confirm Appointment
                            </button>
                        </form>
                        <form action="{{ route('admin.appointments.updateStatus', $appointment) }}" method="POST" class="mb-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to reject this appointment?')">
                                <i class="bi bi-x-circle"></i> Reject Appointment
                            </button>
                        </form>
                    @endif

                    @if($appointment->status === 'confirmed')
                        <form action="{{ route('admin.appointments.updateStatus', $appointment) }}" method="POST" class="mb-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-info w-100">
                                <i class="bi bi-check2-all"></i> Mark as Completed
                            </button>
                        </form>
                        <form action="{{ route('admin.appointments.updateStatus', $appointment) }}" method="POST" class="mb-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="btn btn-secondary w-100" onclick="return confirm('Are you sure you want to cancel this appointment?')">
                                <i class="bi bi-slash-circle"></i> Cancel Appointment
                            </button>
                        </form>
                    @endif

                    <hr>

                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary w-100 mb-2">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>

                    <form action="{{ route('admin.appointments.destroy', $appointment) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this appointment? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="bi bi-trash"></i> Delete Appointment
                        </button>
                    </form>
                </div>
            </div>

            <!-- Status History Card -->
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="bi bi-clock-history"></i> Status Information
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="me-3">
                            @switch($appointment->status)
                                @case('pending')
                                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-clock text-white"></i>
                                    </div>
                                    @break
                                @case('confirmed')
                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-check-circle text-white"></i>
                                    </div>
                                    @break
                                @case('completed')
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-check2-all text-white"></i>
                                    </div>
                                    @break
                                @case('rejected')
                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-x-circle text-white"></i>
                                    </div>
                                    @break
                                @case('cancelled')
                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-slash-circle text-white"></i>
                                    </div>
                                    @break
                            @endswitch
                        </div>
                        <div>
                            <strong>Current Status: {{ ucfirst($appointment->status) }}</strong><br>
                            <small class="text-muted">Last updated {{ $appointment->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection