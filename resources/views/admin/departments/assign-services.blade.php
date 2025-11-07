@extends('admin.layouts.app')

@section('title', 'Assign Services')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Assign Services to {{ $department->name }}</h2>
                <div class="text-muted mt-1">Select services for this department</div>
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
                    <h3 class="card-title">Available Services</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.departments.store-services', $department) }}" method="POST">
                        @csrf

                        @if($services->isEmpty())
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                No services available in the system.
                            </div>
                        @else
                            <div class="mb-3">
                                <input type="text" 
                                       id="serviceSearch" 
                                       class="form-control" 
                                       placeholder="Search services...">
                            </div>

                            <div id="serviceList" class="list-group list-group-flush" style="max-height: 600px; overflow-y: auto;">
                                @foreach($services as $service)
                                <div class="list-group-item service-item">
                                    <label class="form-check">
                                        <input type="checkbox" 
                                               class="form-check-input" 
                                               name="services[]" 
                                               value="{{ $service->id }}"
                                               {{ in_array($service->id, $assignedServiceIds) ? 'checked' : '' }}>
                                        <span class="form-check-label">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong class="service-name">{{ $service->name }}</strong>
                                                    @if($service->description)
                                                    <div class="text-muted small service-description">
                                                        {{ Str::limit($service->description, 100) }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="text-end">
                                                    @if($service->price)
                                                    <div class="text-primary">
                                                        <strong>${{ number_format($service->price, 2) }}</strong>
                                                    </div>
                                                    @endif
                                                    @if($service->duration)
                                                    <div class="text-muted small">
                                                        {{ $service->duration }} min
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
                        <span class="badge bg-success">{{ count($assignedServiceIds) }} Services</span>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Tips</h3>
                </div>
                <div class="card-body">
                    <ul class="mb-0">
                        <li>Check the boxes to assign services to this department</li>
                        <li>Uncheck to remove services from the department</li>
                        <li>You can assign multiple services at once</li>
                        <li>Use the search box to quickly find specific services</li>
                        <li>Services can be assigned to multiple departments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('serviceSearch');
    const serviceItems = document.querySelectorAll('.service-item');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            serviceItems.forEach(function(item) {
                const name = item.querySelector('.service-name').textContent.toLowerCase();
                const description = item.querySelector('.service-description');
                const desc = description ? description.textContent.toLowerCase() : '';

                if (name.includes(searchTerm) || desc.includes(searchTerm)) {
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