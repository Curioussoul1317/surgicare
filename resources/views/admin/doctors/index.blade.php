@extends('admin.layouts.app')

@section('title', 'Doctors - Admin')
@section('page-title', 'Manage Doctors')

@section('content')
<div class="container-fluid">
    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Doctors</h5>
            <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Doctor
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Experience</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doctors as $doctor)
                        <tr>
                            <td>
                                @if($doctor->image)
                                <img src="{{ asset('storage/' . $doctor->image) }}" 
                                     alt="{{ $doctor->name }}" 
                                     class="rounded-circle" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $doctor->name }}</strong><br>
                                <small class="text-muted">{{ $doctor->qualification }}</small>
                            </td>
                            <td>{{ $doctor->specialization }}</td>
                            <td>{{ $doctor->experience_years }} years</td>
                            <td>
                                <small>{{ $doctor->email }}</small>
                            </td>
                            <td>{{ $doctor->phone }}</td>
                            <td>
                                @if($doctor->is_active)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.doctors.edit', $doctor) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.doctors.destroy', $doctor) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this doctor?');"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">No doctors found</p>
                                <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add Your First Doctor
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $doctors->links() }}
            </div>
        </div>
    </div>
</div>
@endsection