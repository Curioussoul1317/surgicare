<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SurgiCare - Quality Healthcare Services')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/surgicare-custom.css') }}" rel="stylesheet">
    
    <style>
        .search-box {
            position: relative;
        }
        
        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }
        
        .search-results-dropdown.show {
            display: block;
        }
        
        .search-result-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .search-result-item:hover {
            background: #f8f9fa;
        }
        
        .search-result-item:last-child {
            border-bottom: none;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('img/logo.jpg') }}" 
         alt="SurgiCare" 
         style="max-height: 50px; width: auto;">
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('departments') ? 'active' : '' }}" href="{{ route('departments.index') }}">Departments</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('doctors.*') ? 'active' : '' }}" href="{{ route('doctors.index') }}">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    
                    <!-- Search Icon -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="btn btn-primary text-white ms-lg-3" href="{{ route('appointments.create') }}">
                            <i class="bi bi-calendar-check"></i> Book Appointment
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <i class="bi bi-search text-primary"></i> Search Services & Doctors
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" 
                                   class="form-control" 
                                   name="query" 
                                   id="liveSearchInput"
                                   placeholder="Search for services or doctors..."
                                   autocomplete="off"
                                   required>
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                        
                        <div class="mb-3">
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="type" id="typeAll" value="all" checked>
                                <label class="btn btn-outline-primary" for="typeAll">All</label>
                                
                                <input type="radio" class="btn-check" name="type" id="typeServices" value="services">
                                <label class="btn btn-outline-primary" for="typeServices">Services</label>
                                
                                <input type="radio" class="btn-check" name="type" id="typeDoctors" value="doctors">
                                <label class="btn btn-outline-primary" for="typeDoctors">Doctors</label>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Live Search Results -->
                    <div id="liveSearchResults" class="mt-3"></div>
                    
                    <!-- Quick Links -->
                    <div class="mt-4">
                        <h6 class="text-muted">Quick Links</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('search.services') }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-funnel"></i> Advanced Service Search
                            </a>
                            <a href="{{ route('search.doctors') }}" class="btn btn-sm btn-outline-success">
                                <i class="bi bi-funnel"></i> Advanced Doctor Search
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="bi bi-hospital"></i> SurgiCare</h5>
                    <p>Providing quality healthcare services with experienced professionals and state-of-the-art facilities.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="me-2"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('services.index') }}"><i class="bi bi-chevron-right"></i> Services</a></li>
                        <li><a href="{{ route('doctors.index') }}"><i class="bi bi-chevron-right"></i> Doctors</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right"></i> Contact</a></li>
                        <li><a href="{{ route('search') }}"><i class="bi bi-chevron-right"></i> Search</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt"></i> dfasfasf</li>
                        <li><i class="bi bi-telephone"></i> 9969317</li>
                        <li><i class="bi bi-envelope"></i> info@surgicare.com</li>
                        <li><i class="bi bi-clock"></i> Mon-Fri: 8AM - 8PM</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} SurgiCare. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Live Search Script -->
    <script>
        let searchTimeout;
        const searchInput = document.getElementById('liveSearchInput');
        const resultsContainer = document.getElementById('liveSearchResults');
        
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                
                if (query.length < 2) {
                    resultsContainer.innerHTML = '';
                    return;
                }
                
                searchTimeout = setTimeout(function() {
                    fetch(`/search/live?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            displayLiveResults(data);
                        })
                        .catch(error => console.error('Error:', error));
                }, 300);
            });
        }
        
        function displayLiveResults(data) {
            let html = '';
            
            if (data.services.length > 0) {
                html += '<h6 class="text-muted mb-2"><i class="bi bi-heart-pulse"></i> Services</h6>';
                html += '<div class="list-group mb-3">';
                data.services.forEach(service => {
                    html += `
                        <a href="/services/${service.id}" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>${service.name}</strong>
                                    ${service.price ? `<br><small class="text-primary">Mvr ${parseFloat(service.price).toFixed(2)}/-</small> ` : ''}
                                </div>
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    `;
                });
                html += '</div>';
            }
            
            if (data.doctors.length > 0) {
                html += '<h6 class="text-muted mb-2"><i class="bi bi-person-badge"></i> Doctors</h6>';
                html += '<div class="list-group">';
                data.doctors.forEach(doctor => {
                    html += `
                        <a href="/doctors/${doctor.id}" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>${doctor.name}</strong>
                                    <br><small class="text-muted">${doctor.specialization}</small>
                                </div>
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    `;
                });
                html += '</div>';
            }
            
            if (data.services.length === 0 && data.doctors.length === 0) {
                html = '<p class="text-muted text-center py-3">No results found. Try different keywords.</p>';
            }
            
            resultsContainer.innerHTML = html;
        }
    </script>
    
    @stack('scripts')
</body>
</html>