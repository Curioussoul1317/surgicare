@extends('layouts.app')

@section('title', 'Search Services - SurgiCare')

@section('content')
<!-- Search Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <h1 class="display-5 fw-bold">
            <i class="bi bi-heart-pulse"></i> Search Services
        </h1>
        <p class="lead">Find the right medical service for your needs</p>
    </div>
</section>

<!-- Search and Filters -->
<section class="py-4 bg-light">
    <div class="container">
        <form action="{{ route('search.services') }}" method="GET">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Search Query -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-search"></i> Search
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   name="query" 
                                   value="{{ $query }}"
                                   placeholder="Service name or description...">
                        </div>
                        
                        <!-- Sort By -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-sort-down"></i> Sort By
                            </label>
                            <select class="form-select" name="sort_by">
                                <option value="name" {{ $sortBy === 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                                <option value="price_asc" {{ $sortBy === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ $sortBy === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </div>
                        
                        <!-- Min Price -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-currency-dollar"></i> Min Price
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   name="min_price" 
                                   value="{{ $minPrice }}"
                                   placeholder="e.g. 100"
                                   min="0"
                                   step="0.01">
                        </div>
                        
                        <!-- Max Price -->
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">
                                <i class="bi bi-currency-dollar"></i> Max Price
                            </label>
                            <input type="number" 
                                   class="form-control" 
                                   name="max_price" 
                                   value="{{ $maxPrice }}"
                                   placeholder="e.g. 5000"
                                   min="0"
                                   step="0.01">
                        </div>
                        
                        <!-- Buttons -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i> Search Services
                            </button>
                            <a href="{{ route('search.services') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i> Clear Filters
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Results Section -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                Search Results
                <span class="badge bg-primary">{{ $services->total() }} Services</span>
            </h2>
            
            @if($query || $minPrice || $maxPrice)
            <div class="text-muted">
                @if($query)
                <span class="badge bg-light text-dark me-2">
                    Search: "{{ $query }}"
                </span>
                @endif
                @if($minPrice)
                <span class="badge bg-light text-dark me-2">
                    Min: ${{ number_format($minPrice, 2) }}
                </span>
                @endif
                @if($maxPrice)
                <span class="badge bg-light text-dark">
                    Max: ${{ number_format($maxPrice, 2) }}
                </span>
                @endif
            </div>
            @endif
        </div>
        
        @if($services->count() > 0)
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         class="card-img-top" 
                         alt="{{ $service->name }}" 
                         style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 200px;">
                        <i class="bi bi-heart-pulse fs-1"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text flex-grow-1">
                            {{ Str::limit($service->short_description ?? $service->description, 100) }}
                        </p>
                        <div class="mt-auto">
                            @if($service->price)
                            <p class="text-primary fw-bold mb-2">
                                <i class="bi bi-tag"></i> Mvr{{ number_format($service->price, 2) }} /-
                            </p>
                            @endif
                            @if($service->duration)
                            <p class="text-muted small mb-3">
                                <i class="bi bi-clock"></i> {{ $service->duration }} min
                            </p>
                            @endif
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary w-100">
                                View Details <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $services->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-inbox text-muted" style="font-size: 5rem;"></i>
            <h3 class="mt-4">No Services Found</h3>
            <p class="text-muted">Try adjusting your filters or search terms</p>
            <div class="mt-4">
                <a href="{{ route('search.services') }}" class="btn btn-primary">
                    <i class="bi bi-x-circle"></i> Clear All Filters
                </a>
                <a href="{{ route('services.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-list-ul"></i> Browse All Services
                </a>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection