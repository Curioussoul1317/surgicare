@extends('admin.layouts.app')

@section('title', 'Edit Department')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Department</h2>
                <div class="text-muted mt-1">Update department information</div>
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
                    <h3 class="card-title">Department Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.departments.update', $department) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name', $department->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" 
                                   class="form-control @error('slug') is-invalid @enderror" 
                                   name="slug" 
                                   value="{{ old('slug', $department->slug) }}"
                                   placeholder="Leave empty to auto-generate from name">
                            <small class="form-hint">URL-friendly version of the name</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      name="description" 
                                      rows="4">{{ old('description', $department->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Icon Class</label>
                            <input type="text" 
                                   class="form-control @error('icon') is-invalid @enderror" 
                                   name="icon" 
                                   value="{{ old('icon', $department->icon) }}"
                                   placeholder="fas fa-heart">
                            <small class="form-hint">FontAwesome icon class (e.g., fas fa-heart)</small>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            @if($department->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $department->image) }}" 
                                     alt="{{ $department->name }}"
                                     class="rounded"
                                     style="max-height: 200px;">
                            </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   name="image" 
                                   accept="image/*">
                            <small class="form-hint">Leave empty to keep current image</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" 
                                   class="form-control @error('order') is-invalid @enderror" 
                                   name="order" 
                                   value="{{ old('order', $department->order) }}" 
                                   min="0">
                            <small class="form-hint">Display order (lower numbers appear first)</small>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', $department->is_active) ? 'checked' : '' }}>
                                <span class="form-check-label">Active</span>
                            </label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.departments.index') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Update Department
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Stats</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Doctors:</strong> {{ $department->doctors()->count() }}
                    </div>
                    <div class="mb-3">
                        <strong>Services:</strong> {{ $department->services()->count() }}
                    </div>
                    <div class="mb-3">
                        <strong>Created:</strong> {{ $department->created_at->format('M d, Y') }}
                    </div>
                    <div class="mb-3">
                        <strong>Last Updated:</strong> {{ $department->updated_at->format('M d, Y') }}
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.departments.assign-doctors', $department) }}" class="btn btn-info w-100 mb-2">
                        <i class="fas fa-user-md me-1"></i>
                        Assign Doctors
                    </a>
                    <a href="{{ route('admin.departments.assign-services', $department) }}" class="btn btn-success w-100">
                        <i class="fas fa-stethoscope me-1"></i>
                        Assign Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection