@extends('admin.layouts.app')

@section('title', 'Create Doctor - Admin')
@section('page-title', 'Add New Doctor')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Full Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
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
                                       value="{{ old('specialization') }}"
                                       placeholder="e.g., Cardiologist"
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
                                       value="{{ old('qualification') }}"
                                       placeholder="e.g., MBBS, MD"
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
                                   value="{{ old('experience_years') }}"
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
                                      rows="4"
                                      placeholder="Tell us about the doctor's background, expertise, and approach...">{{ old('bio') }}</textarea>
                            @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Profile Photo <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   onchange="previewImage(event)"
                                   required>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Recommended size: 400x400px (Max: 2MB)</small>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
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
                                       value="{{ old('email') }}"
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
                                       value="{{ old('phone') }}"
                                       placeholder="+960 123-4567"
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
                                       {{ old('is_active', true) ? 'checked' : '' }}>
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
                                <i class="bi bi-save"></i> Create Doctor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Help Card -->
        <div class="col-lg-4">
            <!-- <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-info-circle text-primary"></i> Tips
                    </h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Use professional headshots for profile photos
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Include full qualifications and certifications
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Write a compelling biography highlighting expertise
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Provide accurate contact information
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Set to Active when ready to display on website
                        </li>
                    </ul>
                </div>
            </div> -->

            <div class="card shadow mt-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-lightbulb text-primary"></i> Best Practices
                    </h5>
                    <p class="small">Use square images (400x400px) for best results</p>
                    <p class="small">Keep biography between 100-200 words</p>
                    <p class="small">Double-check email and phone for accuracy</p>
                </div>
            </div>
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