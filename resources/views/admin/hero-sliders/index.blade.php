@extends('admin.layouts.app')

@section('title', 'Hero Sliders - Admin')
@section('page-title', 'Hero Sliders Management')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Slider
            </a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            @if($sliders->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Order</th>
                            <th style="width: 120px;">Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>
                                <span class="badge bg-secondary">{{ $slider->order }}</span>
                            </td>
                            <td>
                                @if($slider->image)
                                <img src="{{ asset('storage/' . $slider->image) }}" 
                                     alt="{{ $slider->title }}" 
                                     class="img-thumbnail"
                                     style="width: 100px; height: 60px; object-fit: cover;">
                                @else
                                <div class="bg-light text-center p-3" style="width: 100px; height: 60px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $slider->title }}</strong>
                                @if($slider->button_text)
                                <br>
                                <small class="text-muted">
                                    <i class="bi bi-link-45deg"></i> {{ $slider->button_text }}
                                </small>
                                @endif
                            </td>
                            <td>{{ Str::limit($slider->subtitle, 50) }}</td>
                            <td>
                                <form action="{{ route('admin.hero-sliders.toggle-status', $slider) }}" 
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $slider->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        @if($slider->is_active)
                                        <i class="bi bi-check-circle"></i> Active
                                        @else
                                        <i class="bi bi-x-circle"></i> Inactive
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.hero-sliders.edit', $slider) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal{{ $slider->id }}">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this slider?</p>
                                                <p class="text-danger">
                                                    <strong>{{ $slider->title }}</strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.hero-sliders.destroy', $slider) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $sliders->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                <h4 class="mt-3">No Hero Sliders Found</h4>
                <p class="text-muted">Create your first hero slider to get started.</p>
                <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add New Slider
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection