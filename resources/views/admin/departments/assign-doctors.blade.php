@extends('admin.layouts.app')

@section('title', 'Assign Doctors')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Assign Doctors to {{ $department->name }}</h2>
                <div class="text-muted mt-1">Select doctors for this department</div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i>
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Available Doctors</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.departments.store-doctors', $department) }}" method="POST">
                        @csrf

                        @if($doctors->isEmpty())
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                No doctors available in the system.
                            </div>
                        @else
                            <div class="mb-3">
                                <input type="text" 
                                       id="doctorSearch" 
                                       class="form-control" 
                                       placeholder="Search doctors...">
                            </div>

                            <div id="doctorList" class="list-group list-group-flush" style="max-height: 600px; overflow-y: auto;">
                                @foreach($doctors as $doctor)
                                <div class="list-group-item doctor-item">
                                    <label class="form-check">
                                        <input type="checkbox" 
                                               class="form-check-input" 
                                               name="doctors[]" 
                                               value="{{ $doctor->id }}"
                                               {{ in_array($doctor->id, $assignedDoctorIds) ? 'checked' : '' }}>
                                        <span class="form-check-label">
                                            <div class="d-flex align-items-center">
                                                @if($doctor->image)
                                                <img src="{{ asset('storage/' . $doctor->image) }}" 
                                                     alt="{{ $doctor->name }}"
                                                     class="rounded me-2"
                                                     style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                <div class="avatar avatar-sm me-2 bg-primary text-white">
                                                    {{ substr($doctor->name, 0, 1) }}
                                                </div>
                                                @endif
                                                <div>
                                                    <strong class="doctor-name">{{ $doctor->name }}</strong>
                                                    @if($doctor->specialization)
                                                    <div class="text-muted small doctor-specialization">
                                                        {{ $doctor->specialization }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.departments.index') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Save Assignments
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Department Info</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong><br>
                        {{ $department->name }}
                    </div>
                    
                    @if($department->description)
                    <div class="mb-3">
                        <strong>Description:</strong><br>
                        {{ $department->description }}
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <strong>Currently Assigned:</strong><br>
                        <span class="badge bg-info">{{ count($assignedDoctorIds) }} Doctors</span>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Tips</h3>
                </div>
                <div class="card-body">
                    <ul class="mb-0">
                        <li>Check the boxes to assign doctors to this department</li>
                        <li>Uncheck to remove doctors from the department</li>
                        <li>You can assign multiple doctors at once</li>
                        <li>Use the search box to quickly find specific doctors</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('doctorSearch');
    const doctorItems = document.querySelectorAll('.doctor-item');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            doctorItems.forEach(function(item) {
                const name = item.querySelector('.doctor-name').textContent.toLowerCase();
                const specialization = item.querySelector('.doctor-specialization');
                const spec = specialization ? specialization.textContent.toLowerCase() : '';

                if (name.includes(searchTerm) || spec.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
});
</script>
@endpush
@endsection