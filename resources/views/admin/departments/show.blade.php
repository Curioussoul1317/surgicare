@extends('admin.layouts.app')

@section('title', 'View Department')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $department->name }}</h2>
                <div class="text-muted mt-1">Department details and assignments</div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i>
                    Edit
                </a>
                <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Department Info -->
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Department Information</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong><br>
                            {{ $department->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Slug:</strong><br>
                            <code>{{ $department->slug }}</code>
                        </div>
                    </div>

                    @if($department->description)
                    <div class="mb-3">
                        <strong>Description:</strong><br>
                        {{ $department->description }}
                    </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Status:</strong><br>
                            @if($department->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <strong>Order:</strong><br>
                            {{ $department->order }}
                        </div>
                        <div class="col-md-4">
                            <strong>Icon:</strong><br>
                            @if($department->icon)
                                <i class="{{ $department->icon }} fa-2x"></i>
                            @else
                                <span class="text-muted">No icon set</span>
                            @endif
                        </div>
                    </div>

                    @if($department->image)
                    <div class="mb-3">
                        <strong>Image:</strong><br>
                        <img src="{{ asset('storage/' . $department->image) }}" 
                             alt="{{ $department->name }}"
                             class="img-fluid rounded mt-2"
                             style="max-height: 300px;">
                    </div>
                    @endif
                </div>
            </div>

            <!-- Assigned Doctors -->
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Assigned Doctors ({{ $department->doctors->count() }})</h3>
                        <a href="{{ route('admin.departments.assign-doctors', $department) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit me-1"></i>
                            Manage
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($department->doctors->isEmpty())
                        <p class="text-muted mb-0">No doctors assigned to this department yet.</p>
                    @else
                        <div class="row">
                            @foreach($department->doctors as $doctor)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    @if($doctor->image)
                                    <img src="{{ asset('storage/' . $doctor->image) }}" 
                                         alt="{{ $doctor->name }}"
                                         class="rounded me-3"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                    <div class="avatar me-3">
                                        {{ substr($doctor->name, 0, 1) }}
                                    </div>
                                    @endif
                                    <div>
                                        <strong>{{ $doctor->name }}</strong>
                                        @if($doctor->specialization)
                                        <div class="text-muted small">{{ $doctor->specialization }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Assigned Services -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Assigned Services ({{ $department->services->count() }})</h3>
                        <a href="{{ route('admin.departments.assign-services', $department) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit me-1"></i>
                            Manage
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($department->services->isEmpty())
                        <p class="text-muted mb-0">No services assigned to this department yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($department->services as $service)
                                    <tr>
                                        <td>
                                            <strong>{{ $service->name }}</strong>
                                            @if($service->description)
                                            <div class="text-muted small">{{ Str::limit($service->description, 80) }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($service->price)
                                                ${{ number_format($service->price, 2) }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($service->duration)
                                                {{ $service->duration }} min
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-edit me-1"></i>
                        Edit Department
                    </a>
                    <a href="{{ route('admin.departments.assign-doctors', $department) }}" class="btn btn-info w-100 mb-2">
                        <i class="fas fa-user-md me-1"></i>
                        Assign Doctors
                    </a>
                    <a href="{{ route('admin.departments.assign-services', $department) }}" class="btn btn-success w-100 mb-2">
                        <i class="fas fa-stethoscope me-1"></i>
                        Assign Services
                    </a>
                    <hr>
                    <form action="{{ route('admin.departments.destroy', $department) }}" 
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this department? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-1"></i>
                            Delete Department
                        </button>
                    </form>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Metadata</h3>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <strong>ID:</strong> {{ $department->id }}
                    </div>
                    <div class="mb-2">
                        <strong>Created:</strong><br>
                        {{ $department->created_at->format('M d, Y h:i A') }}
                    </div>
                    <div class="mb-2">
                        <strong>Last Updated:</strong><br>
                        {{ $department->updated_at->format('M d, Y h:i A') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection