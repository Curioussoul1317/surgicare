@extends('admin.layouts.app')

@section('title', 'Services - Admin')
@section('page-title', 'Manage Services')

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
            <h5 class="mb-0">All Services</h5>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Service
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Service Name</th>
                            <th>Short Description</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td>
                                @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->name }}" 
                                     class="rounded" 
                                     style="width: 80px; height: 60px; object-fit: cover;">
                                @else
                                <div class="rounded bg-secondary d-flex align-items-center justify-content-center" 
                                     style="width: 80px; height: 60px;">
                                    <i class="bi bi-image text-white"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $service->name }}</strong>
                            </td>
                            <td>
                                <small class="text-muted">{{ Str::limit($service->short_description, 50) }}</small>
                            </td>
                            <td>
                                <strong class="text-success">Mvr{{ number_format($service->price, 2) }} /-</strong>
                            </td>
                            <td>{{ $service->duration }} min</td>
                            <td>
                                @if($service->is_active)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.services.edit', $service) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this service?');"
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
                            <td colspan="7" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">No services found</p>
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add Your First Service
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>
@endsection