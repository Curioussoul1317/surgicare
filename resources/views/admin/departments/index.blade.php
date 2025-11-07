@extends('admin.layouts.app')

@section('title', 'Departments Management')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Departments</h2>
                <div class="text-muted mt-1">Manage hospital departments</div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    Add Department
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="{{ route('admin.departments.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input type="text" 
                           name="search" 
                           class="form-control" 
                           placeholder="Search departments by name or description..." 
                           value="{{ $search }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Search
                    </button>
                </div>
            </form>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Doctors</th>
                            <th>Services</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($department->image)
                                    <img src="{{ asset('storage/' . $department->image) }}" 
                                         alt="{{ $department->name }}"
                                         class="rounded me-2"
                                         style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                    <div class="avatar avatar-sm me-2">
                                        @if($department->icon)
                                        <i class="{{ $department->icon }}"></i>
                                        @else
                                        <i class="fas fa-hospital"></i>
                                        @endif
                                    </div>
                                    @endif
                                    <div>
                                        <strong>{{ $department->name }}</strong>
                                        <div class="text-muted small">{{ $department->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $department->doctors_count }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    {{ $department->services_count }}
                                </span>
                            </td>
                            <td>
                                @if($department->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $department->order }}</td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.departments.show', $department) }}" 
                                       class="btn btn-sm btn-primary" 
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.departments.edit', $department) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.departments.assign-doctors', $department) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Assign Doctors">
                                        <i class="fas fa-user-md"></i>
                                    </a>
                                    <a href="{{ route('admin.departments.assign-services', $department) }}" 
                                       class="btn btn-sm btn-success" 
                                       title="Assign Services">
                                        <i class="fas fa-stethoscope"></i>
                                    </a>
                                    <form action="{{ route('admin.departments.destroy', $department) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this department?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No departments found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($departments->hasPages())
        <div class="card-footer">
            {{ $departments->links() }}
        </div>
        @endif
    </div>
</div>
@endsection