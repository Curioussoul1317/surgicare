@extends('admin.layouts.app')

@section('title', 'Edit Doctor - Admin')
@section('page-title', 'Edit Doctor')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Full Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $doctor->name) }}" 
                                   required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Specialization -->
                            <div class="col-md-6 mb-3">
                                <label for="specialization" class="form-label">
                                    Specialization <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('specialization') is-invalid @enderror" 
                                       id="specialization" 
                                       name="specialization" 
                                       value="{{ old('specialization', $doctor->specialization) }}"
                                       required>
                                @error('specialization')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Qualification -->
                            <div class="col-md-6 mb-3">
                                <label for="qualification" class="form-label">
                                    Qualification <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('qualification') is-invalid @enderror" 
                                       id="qualification" 
                                       name="qualification" 
                                       value="{{ old('qualification', $doctor->qualification) }}"
                                       required>
                                @error('qualification')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Experience -->
                        <div class="mb-3">
                            <label for="experience_years" class="form-label">
                                Years of Experience <span class="text-danger">*</span>
                            </label>
                            <input type="number" 
                                   class="form-control @error('experience_years') is-invalid @enderror" 
                                   id="experience_years" 
                                   name="experience_years" 
                                   value="{{ old('experience_years', $doctor->experience_years) }}"
                                   min="0"
                                   max="100"
                                   required>
                            @error('experience_years')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="mb-3">
                            <label for="bio" class="form-label">Biography</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" 
                                      name="bio" 
                                      rows="4">{{ old('bio', $doctor->bio) }}</textarea>
                            @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Profile Photo
                            </label>
                            
                            @if($doctor->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $doctor->image) }}" 
                                     alt="{{ $doctor->name }}" 
                                     class="img-fluid rounded-circle" 
                                     style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                <p class="small text-muted mt-1">Current photo</p>
                            </div>
                            @endif
                            
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   onchange="previewImage(event)">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave empty to keep current image. Recommended: 400x400px (Max: 2MB)</small>
                            
                            <!-- New Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <p class="small text-muted">New photo preview:</p>
                                <img id="preview" src="" alt="Preview" class="img-fluid rounded-circle" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $doctor->email) }}"
                                       required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">
                                    Phone <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone', $doctor->phone) }}"
                                       required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       {{ old('is_active', $doctor->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Doctor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-info-circle text-primary"></i> Update Information
                    </h5>
                    <p class="small">You're editing: <strong>{{ $doctor->name }}</strong></p>
                    <p class="small">Created: {{ $doctor->created_at->format('M d, Y') }}</p>
                    <p class="small">Last Updated: {{ $doctor->updated_at->diffForHumans() }}</p>
                </div>
            </div>

            <!-- <div class="card shadow mt-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-lightbulb text-primary"></i> Tips
                    </h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Upload a new photo to replace the current one
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Keep all information up-to-date
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Set to Inactive to temporarily hide from website
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush