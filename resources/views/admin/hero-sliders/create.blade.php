@extends('admin.layouts.app')

@section('title', 'Create Hero Slider - Admin')
@section('page-title', 'Create New Hero Slider')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.hero-sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" 
                                   class="form-control @error('subtitle') is-invalid @enderror" 
                                   id="subtitle" 
                                   name="subtitle" 
                                   value="{{ old('subtitle') }}">
                            @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Slider Image <span class="text-danger">*</span>
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
                            <small class="text-muted">Recommended size: 1920x800px (Max: 2MB)</small>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="preview" src="" alt="Preview" class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                        </div>
<!-- 
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" 
                                       class="form-control @error('button_text') is-invalid @enderror" 
                                       id="button_text" 
                                       name="button_text" 
                                       value="{{ old('button_text') }}"
                                       placeholder="e.g., Book Now">
                                @error('button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="text" 
                                       class="form-control @error('button_link') is-invalid @enderror" 
                                       id="button_link" 
                                       name="button_link" 
                                       value="{{ old('button_link') }}"
                                       placeholder="/appointments/create">
                                @error('button_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number" 
                                       class="form-control @error('order') is-invalid @enderror" 
                                       id="order" 
                                       name="order" 
                                       value="{{ old('order', 1) }}"
                                       min="0">
                                @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Lower numbers appear first</small>
                            </div>

                            <div class="col-md-6 mb-3">
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
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Create Slider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Help Card -->
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-info-circle text-primary"></i> Tips
                    </h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Use high-quality images (1920x800px recommended)
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Keep titles short and impactful
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Add call-to-action buttons for better engagement
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Set order to control slide sequence
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            Use Active/Inactive to control visibility
                        </li>
                    </ul>
                </div>
            </div>

            <!-- <div class="card shadow mt-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-palette text-primary"></i> Best Practices
                    </h5>
                    <p class="small">Use images with good contrast for text readability</p>
                    <p class="small">Keep descriptions concise (2-3 lines max)</p>
                    <p class="small">Test on mobile devices after uploading</p>
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