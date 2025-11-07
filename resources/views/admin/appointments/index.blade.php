@extends('admin.layouts.app')

@section('title', 'Appointments - Admin')
@section('page-title', 'Manage Appointments')

@section('content')
<div class="container-fluid">
    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Pending</h6>
                            <h3 class="mb-0">{{ \App\Models\Appointment::where('status', 'pending')->count() }}</h3>
                        </div>
                        <i class="bi bi-clock-history" style="font-size: 2rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Confirmed</h6>
                            <h3 class="mb-0">{{ \App\Models\Appointment::where('status', 'confirmed')->count() }}</h3>
                        </div>
                        <i class="bi bi-check-circle" style="font-size: 2rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Completed</h6>
                            <h3 class="mb-0">{{ \App\Models\Appointment::where('status', 'completed')->count() }}</h3>
                        </div>
                        <i class="bi bi-check2-all" style="font-size: 2rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Rejected</h6>
                            <h3 class="mb-0">{{ \App\Models\Appointment::where('status', 'rejected')->count() }}</h3>
                        </div>
                        <i class="bi bi-x-circle" style="font-size: 2rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">All Appointments</h5>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <form method="GET" action="{{ route('admin.appointments.index') }}" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Search patient..."
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="doctor_id" class="form-select">
                            <option value="">All Doctors</option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" 
                               name="date" 
                               class="form-control"
                               value="{{ request('date') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                            <td><strong>#{{ $appointment->id }}</strong></td>
                            <td>
                                <strong>{{ $appointment->patient_name }}</strong><br>
                                <small class="text-muted">
                                    <i class="bi bi-envelope"></i> {{ $appointment->patient_email }}<br>
                                    <i class="bi bi-telephone"></i> {{ $appointment->patient_phone }}
                                </small>
                            </td>
                            <td>
                                @if($appointment->doctor)
                                    {{ $appointment->doctor->name }}<br>
                                    <small class="text-muted">{{ $appointment->doctor->specialization }}</small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($appointment->service)
                                    {{ $appointment->service->name }}
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</strong><br>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                </small>
                            </td>
                            <td>
                                @switch($appointment->status)
                                    @case('pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @break
                                    @case('confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                        @break
                                    @case('completed')
                                        <span class="badge bg-info">Completed</span>
                                        @break
                                    @case('rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                        @break
                                    @case('cancelled')
                                        <span class="badge bg-secondary">Cancelled</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.appointments.show', $appointment) }}" 
                                       class="btn btn-sm btn-info"
                                       title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    @if($appointment->status === 'pending')
                                    <button type="button" 
                                            class="btn btn-sm btn-success" 
                                            onclick="updateStatus({{ $appointment->id }}, 'confirmed')"
                                            title="Confirm">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="updateStatus({{ $appointment->id }}, 'rejected')"
                                            title="Reject">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                    @endif

                                    <form action="{{ route('admin.appointments.destroy', $appointment) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this appointment?');"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-dark" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">No appointments found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Hidden form for status updates -->
<form id="statusForm" method="POST" style="display: none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="statusInput">
</form>
@endsection

@push('scripts')
<script>
    function updateStatus(appointmentId, status) {
        const confirmMessages = {
            'confirmed': 'Are you sure you want to confirm this appointment?',
            'rejected': 'Are you sure you want to reject this appointment?',
            'completed': 'Mark this appointment as completed?',
            'cancelled': 'Cancel this appointment?'
        };

        if (confirm(confirmMessages[status])) {
            const form = document.getElementById('statusForm');
            form.action = `/admin/appointments/${appointmentId}/status`;
            document.getElementById('statusInput').value = status;
            form.submit();
        }
    }
</script>
@endpush