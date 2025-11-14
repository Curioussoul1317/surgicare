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
        
        /* Chat Widget Styles */
        .chat-widget-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #54c9c5;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 4px 12px rgb(135 135 135 / 40%);
            z-index: 1050;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }
        
        .chat-widget-button:hover {
            background-color:rgb(43, 195, 201);
            transform: scale(1.1);
            box-shadow: 0 6px 16pxrgb(33, 148, 144);
        }
        
        .chat-widget-button i {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        /* Chat notification badge */
        .chat-notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            border: 2px solid white;
        }
        
        /* Chat Window */
        .chat-window {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 380px;
            height: 600px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            z-index: 1040;
            display: none;
            flex-direction: column;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .chat-window.show {
            display: flex;
            animation: slideUp 0.3s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .chat-header {
            background: linear-gradient(135deg, #54c9c5 0%, #20BA5A 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .chat-header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .chat-header-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #54c9c5;
        }
        
        .chat-header-text h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }
        
        .chat-header-text p {
            margin: 0;
            font-size: 12px;
            opacity: 0.9;
        }
        
        .chat-close-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .chat-close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        /* Chat Body */
        .chat-body {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: #f5f5f5;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .chat-message {
            display: flex;
            align-items: flex-end;
            gap: 8px;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .chat-message.bot {
            justify-content: flex-start;
        }
        
        .chat-message.user {
            justify-content: flex-end;
        }
        
        .chat-message-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #54c9c5;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }
        
        .chat-message.user .chat-message-avatar {
            background: #0d6efd;
        }
        
        .chat-message-bubble {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 16px;
            word-wrap: break-word;
        }
        
        .chat-message.bot .chat-message-bubble {
            background: white;
            color: #333;
            border-bottom-left-radius: 4px;
        }
        
        .chat-message.user .chat-message-bubble {
            background: #0d6efd;
            color: white;
            border-bottom-right-radius: 4px;
        }
        
        .chat-message-time {
            font-size: 11px;
            color: #999;
            margin-top: 4px;
        }
        
        /* Quick Options */
        .chat-quick-options {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 0 20px 12px;
        }
        
        .quick-option-btn {
            background: white;
            border: 1px solid #ddd;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
            color: #333;
        }
        
        .quick-option-btn:hover {
            background: #f8f9fa;
            border-color: #54c9c5;
            color: #54c9c5;
        }
        
        /* Chat Footer */
        .chat-footer {
            padding: 16px 20px;
            background: white;
            border-top: 1px solid #e9ecef;
        }
        
        .chat-input-wrapper {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
        .chat-input {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 14px;
            outline: none;
            transition: all 0.2s;
        }
        
        .chat-input:focus {
            border-color: #54c9c5;
            box-shadow: 0 0 0 3px rgba(37, 211, 102, 0.1);
        }
        
        .chat-send-btn {
            background: #54c9c5;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .chat-send-btn:hover {
            background: #54c9c5;
            transform: scale(1.05);
        }
        
        .chat-send-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: scale(1);
        }
        
        /* Typing Indicator */
        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 12px 16px;
            background: white;
            border-radius: 16px;
            width: fit-content;
        }
        
        .typing-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #999;
            animation: typing 1.4s infinite;
        }
        
        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
            }
            30% {
                transform: translateY(-10px);
            }
        }
        
        /* Contact Options */
        .contact-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 20px;
        }
        
        .contact-option-card {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            color: inherit;
        }
        
        .contact-option-card:hover {
            border-color: #54c9c5;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .contact-option-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }
        
        .contact-option-icon.whatsapp {
            background: #e7f8f0;
            color: #54c9c5;
        }
        
        .contact-option-icon.phone {
            background: #e3f2fd;
            color: #2196f3;
        }
        
        .contact-option-icon.email {
            background: #fff3e0;
            color: #ff9800;
        }
        
        .contact-option-text h6 {
            margin: 0 0 4px 0;
            font-size: 15px;
            font-weight: 600;
        }
        
        .contact-option-text p {
            margin: 0;
            font-size: 13px;
            color: #666;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .chat-widget-button {
                width: 56px;
                height: 56px;
                font-size: 26px;
                bottom: 20px;
                right: 20px;
            }
            
            .chat-window {
                bottom: 0;
                right: 0;
                width: 100%;
                height: 100vh;
                border-radius: 0;
            }
        }
    </style>
    
    @stack('styles')
</head>






<style>
    #loading-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

.spin-wrapper {
  display: flex;
  gap: 6px;
  margin: 4px;
  animation: rotate 1.6s linear infinite;
}

.circle {
  width: 12px;
  height: 12px;
  background-color: #00beb5;
  border-radius: 50%;
  animation: pulse 0.8s ease-in-out infinite alternate;
}

/* Circle pulse animation */
@keyframes pulse {
  0% { transform: scale(0.6); opacity: 0.6; }
  100% { transform: scale(1); opacity: 1; }
}

/* Rotate animation for each wrapper */
@keyframes rotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

/* Delay each wrapper for a wave effect */
.spin-wrapper:nth-child(1)  { animation-delay: 0s; }
.spin-wrapper:nth-child(2)  { animation-delay: 0.1s; }
.spin-wrapper:nth-child(3)  { animation-delay: 0.2s; }
.spin-wrapper:nth-child(4)  { animation-delay: 0.3s; }
.spin-wrapper:nth-child(5)  { animation-delay: 0.4s; }
.spin-wrapper:nth-child(6)  { animation-delay: 0.5s; }
.spin-wrapper:nth-child(7)  { animation-delay: 0.6s; }
.spin-wrapper:nth-child(8)  { animation-delay: 0.7s; }
.spin-wrapper:nth-child(9)  { animation-delay: 0.8s; }
.spin-wrapper:nth-child(10) { animation-delay: 0.9s; }
.spin-wrapper:nth-child(11) { animation-delay: 1.0s; }
.spin-wrapper:nth-child(12) { animation-delay: 1.1s; }

    </style>
<body>


<div id="loading-wrapper"  >
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <div class="spin-wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
    </div>


    <script>
window.addEventListener('load', function() {
    const loader = document.getElementById('loading-wrapper');
  
    setTimeout(function() {
        loader.style.opacity = '0';
        loader.style.transition = 'opacity 0.5s ease';
        
        setTimeout(function() {
            loader.style.display = 'none';
        }, 500);
    }, 1500);  
});
</script>
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

    <style>
        /* Checked/Active State */
.btn-check:checked + .btn-outline-primary {
    background-color: #3BA09C;  /* Your teal color */
    border-color: #3BA09C;
    color: white;
}

/* Hover State (slightly darker) */
.btn-check:checked + .btn-outline-primary:hover {
    background-color: #2d8a86;
    border-color: #2d8a86;
}

/* Inactive/Outline State */
.btn-outline-primary {
    border-color: #3BA09C;
    color: #3BA09C;
}

/* Inactive Hover */
.btn-outline-primary:hover {
    background-color: #3BA09C;
    border-color: #3BA09C;
    color: white;
}
        </style>

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
                        <li><i class="bi bi-geo-alt"></i>M. Rihaab Shaheed Ali Hingun |
Male'  <br>
Rep. of Maldives </li>
                        <li><i class="bi bi-telephone"></i>3310062</li>
                        <li><i class="bi bi-telephone"></i>7292020</li>
                        <li><i class="bi bi-envelope"></i> info@surgicaremaldives.com</li>
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

    <!-- Chat Widget Button -->
    <button class="chat-widget-button" id="chatWidgetBtn" aria-label="Open chat">
        <i class="bi bi-chat-dots-fill"></i>
        <span class="chat-notification-badge" id="chatNotificationBadge" style="display: none;">1</span>
    </button>

    <!-- Chat Window -->
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            <div class="chat-header-info">
                <div class="chat-header-avatar">
                    <i class="bi bi-hospital"></i>
                </div>
                <div class="chat-header-text">
                    <h5>SurgiCare Support</h5>
                    <p>Typically replies instantly</p>
                </div>
            </div>
            <button class="chat-close-btn" id="chatCloseBtn">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        
        <div class="chat-body" id="chatBody">
            <!-- Welcome Message -->
            <div class="chat-message bot">
                <div class="chat-message-avatar">
                    <i class="bi bi-hospital"></i>
                </div>
                <div>
                    <div class="chat-message-bubble">
                        Hi!  Welcome to SurgiCare. How can we help you today?
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Options -->
        <div class="chat-quick-options" id="quickOptions">
            <button class="quick-option-btn" data-message="Book an appointment">
                  Book Appointment
            </button>
            <button class="quick-option-btn" data-message="View services">
                  View Services
            </button>
            <button class="quick-option-btn" data-message="Find a doctor">
                  Find Doctor
            </button>
            <button class="quick-option-btn" data-message="Contact support">
                  Contact Support
            </button>
        </div>
        
        <div class="chat-footer">
            <div class="chat-input-wrapper">
                <input type="text" 
                       class="chat-input" 
                       id="chatInput" 
                       placeholder="Type your message..."
                       autocomplete="off">
                <button class="chat-send-btn" id="chatSendBtn">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
        </div>
    </div>

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
    
    <!-- Chat Widget Script -->
    <script>
        // Chat Widget Elements
        const chatWidgetBtn = document.getElementById('chatWidgetBtn');
        const chatWindow = document.getElementById('chatWindow');
        const chatCloseBtn = document.getElementById('chatCloseBtn');
        const chatBody = document.getElementById('chatBody');
        const chatInput = document.getElementById('chatInput');
        const chatSendBtn = document.getElementById('chatSendBtn');
        const quickOptions = document.querySelectorAll('.quick-option-btn');
        
        // Toggle chat window
        chatWidgetBtn.addEventListener('click', function() {
            chatWindow.classList.toggle('show');
            if (chatWindow.classList.contains('show')) {
                chatInput.focus();
                // Hide notification badge when opened
                document.getElementById('chatNotificationBadge').style.display = 'none';
            }
        });
        
        chatCloseBtn.addEventListener('click', function() {
            chatWindow.classList.remove('show');
        });
        
        // Send message function
        function sendMessage(message) {
            if (!message.trim()) return;
            
            // Add user message
            addMessage(message, 'user');
            chatInput.value = '';
            
            // Scroll to bottom
            scrollToBottom();
            
            // Show typing indicator
            showTypingIndicator();
            
            // Simulate bot response (replace with actual API call)
            setTimeout(() => {
                hideTypingIndicator();
                handleBotResponse(message);
            }, 1500);
        }
        
        // Add message to chat
        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${sender}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'chat-message-avatar';
            avatar.innerHTML = sender === 'bot' ? '<i class="bi bi-hospital"></i>' : '<i class="bi bi-person-fill"></i>';
            
            const bubble = document.createElement('div');
            bubble.className = 'chat-message-bubble';
            bubble.textContent = text;
            
            if (sender === 'bot') {
                messageDiv.appendChild(avatar);
            }
            
            messageDiv.appendChild(bubble);
            
            if (sender === 'user') {
                messageDiv.appendChild(avatar);
            }
            
            chatBody.appendChild(messageDiv);
            scrollToBottom();
        }
        
        // Handle bot responses
        function handleBotResponse(userMessage) {
            const lowerMessage = userMessage.toLowerCase();
            
            if (lowerMessage.includes('appointment') || lowerMessage.includes('book')) {
                addMessage("I'd be happy to help you book an appointment! You can click the button below or visit our appointments page.", 'bot');
                addContactOptions();
            } else if (lowerMessage.includes('service')) {
                addMessage("We offer a wide range of medical services. Would you like me to show you our services page?", 'bot');
                addLinkButton('View Services', '{{ route("services.index") }}');
            } else if (lowerMessage.includes('doctor')) {
                addMessage("We have experienced doctors across various specializations. Check out our doctors page to find the right specialist for you.", 'bot');
                addLinkButton('View Doctors', '{{ route("doctors.index") }}');
            } else if (lowerMessage.includes('contact') || lowerMessage.includes('support')) {
                addMessage("Here are the best ways to reach us:", 'bot');
                addContactOptions();
            } else {
                addMessage("Thank you for your message! For immediate assistance, you can contact us via WhatsApp, phone, or email. How else can I help you?", 'bot');
            }
        }
        
        // Add contact options
        function addContactOptions() {
            const optionsDiv = document.createElement('div');
            optionsDiv.className = 'contact-options';
            optionsDiv.innerHTML = `
                <a href="https://wa.me/9607292020?text=Hello%2C%20I%20would%20like%20to%20inquire%20about%20your%20services" 
                   target="_blank" 
                   class="contact-option-card">
                    <div class="contact-option-icon whatsapp">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <div class="contact-option-text">
                        <h6>WhatsApp</h6>
                        <p>Chat with us instantly</p>
                    </div>
                </a>
                <a href="tel:9607292020" class="contact-option-card">
                    <div class="contact-option-icon phone">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="contact-option-text">
                        <h6>Call Us</h6>
                        <p>960 7292020</p>
                    </div>
                </a>
                <a href="mailto:info@surgicare.com" class="contact-option-card">
                    <div class="contact-option-icon email">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-option-text">
                        <h6>Email</h6>
                        <p>info@surgicare.com</p>
                    </div>
                </a>
            `;
            chatBody.appendChild(optionsDiv);
            scrollToBottom();
        }
        
        // Add link button
        function addLinkButton(text, url) {
            const btnDiv = document.createElement('div');
            btnDiv.className = 'chat-message bot';
            btnDiv.innerHTML = `
                <div class="chat-message-avatar">
                    <i class="bi bi-hospital"></i>
                </div>
                <div>
                    <a href="${url}" class="btn btn-primary btn-sm">
                        ${text} <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            `;
            chatBody.appendChild(btnDiv);
            scrollToBottom();
        }
        
        // Typing indicator
        function showTypingIndicator() {
            const indicator = document.createElement('div');
            indicator.className = 'chat-message bot';
            indicator.id = 'typingIndicator';
            indicator.innerHTML = `
                <div class="chat-message-avatar">
                    <i class="bi bi-hospital"></i>
                </div>
                <div class="typing-indicator">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            `;
            chatBody.appendChild(indicator);
            scrollToBottom();
        }
        
        function hideTypingIndicator() {
            const indicator = document.getElementById('typingIndicator');
            if (indicator) {
                indicator.remove();
            }
        }
        
        // Scroll to bottom
        function scrollToBottom() {
            chatBody.scrollTop = chatBody.scrollHeight;
        }
        
        // Event listeners
        chatSendBtn.addEventListener('click', function() {
            sendMessage(chatInput.value);
        });
        
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage(chatInput.value);
            }
        });
        
        // Quick options
        quickOptions.forEach(option => {
            option.addEventListener('click', function() {
                const message = this.getAttribute('data-message');
                sendMessage(message);
            });
        });
        
        // Enable/disable send button based on input
        chatInput.addEventListener('input', function() {
            chatSendBtn.disabled = !this.value.trim();
        });
        
        // Show notification badge after 5 seconds (optional)
        setTimeout(() => {
            if (!chatWindow.classList.contains('show')) {
                document.getElementById('chatNotificationBadge').style.display = 'flex';
            }
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>