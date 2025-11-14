<!DOCTYPE html>
<!-- saved from url=(0080)https://www.bootstrapget.com/demos/apollo-medical-admin-template/dashboard3.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel - SurgiCare')</title>

    <!-- Meta -->
    <meta name="description" content=" ">
    <meta property="og:title" content=" ">
    <meta property="og:description" content=" ">
    <meta property="og:type" content="Website">
 

    <!-- *************
		************ CSS Files *************
	  ************* -->
      <link rel="stylesheet" href="{{ asset('adminfonts/remixicon.css') }}" /> 
<link rel="stylesheet" href="{{ asset('admincss/main.min.css') }}">
 
<link rel="stylesheet" href="{{ asset('admincss/OverlayScrollbars.min.css') }}">
 
<link rel="stylesheet" href="{{ asset('admincss/daterange.css') }}">

 
</head>
<style>
.custom-pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 8px;
    align-items: center;
}

.custom-pagination .page-item {
    list-style: none;
}

.custom-pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.custom-pagination .page-link:hover {
    background-color: #f8f9fa;
    border-color: #00beb5;
    color: #00beb5;
}

.custom-pagination .page-item.active .page-link {
    background-color: #00beb5;
    border-color: #00beb5;
    color: #fff;
    font-weight: 600;
}

.custom-pagination .page-item.disabled .page-link {
    color: #ccc;
    background-color: #f8f9fa;
    border-color: #ddd;
    cursor: not-allowed;
    opacity: 0.6;
}
</style>
  <body>

    <!-- Loading starts -->
    <div id="loading-wrapper" style="display: none;">
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
    <!-- Loading ends -->

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

      <!-- Main container starts -->
      <div class="main-container">

        <!-- Sidebar wrapper starts -->
        <nav id="sidebar" class="sidebar-wrapper">

          <!-- Brand container starts -->
          <div class="brand-container d-flex align-items-center justify-content-between">

            <!-- App brand starts -->
            <div class="app-brand ms-3">
              <a href="http://167.71.232.23/">
                <img src="{{ asset('img/logo.jpg') }}" class="logo" alt="Surgi Care"> 
              </a>
            </div>
            <!-- App brand ends -->

            <!-- Pin sidebar starts -->
            <button type="button" class="pin-sidebar me-3">
              <i class="ri-menu-line"></i>
            </button>
            <!-- Pin sidebar ends -->

          </div>
          <!-- Brand container ends -->

          <!-- Sidebar profile starts -->
          <div class="sidebar-profile">
            <img src="{{ asset('img/doctor6.jpg') }}" class="rounded-5" alt="Surgi Care">
            <h6 class="mb-1 profile-name text-nowrap text-truncate text-primary">{{ Auth::user()->name }}</h6>
            <small class="profile-name text-nowrap text-truncate">Surgi Care Admin</small>
          </div>
          <!-- Sidebar profile ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px; width: 249px; height: 610px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px; height: 100%; width: 100%;">
            <ul class="sidebar-menu">
                       <li>
                            <a class="{{ request()->routeIs('admin.dashboard') ? 'active current-page' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="ri-home-5-line"></i>
                            <span class="menu-text">Clinic Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('admin.hero-sliders.*') ? 'active current-page' : '' }}" href="{{ route('admin.hero-sliders.index') }}">
                            <i class="ri-home-5-line"></i>
                            <span class="menu-text">Hero Sliders</span> 
                            </a>
                        </li>
                        <li>
                        <a class="{{ request()->routeIs('admin.departments.*') ? 'active current-page' : '' }}" href="{{ route('admin.departments.index') }}">
                        <i class=" ri-home-smile-line"></i>
                        <span class="menu-text"> Department</span> 
                            </a>
                        </li>
                        <li>
                        <a class="{{ request()->routeIs('admin.services.*') ? 'active current-page' : '' }}" href="{{ route('admin.services.index') }}">
                        <i class=" ri-hand-heart-fill"></i>
                        <span class="menu-text"> Services</span> 
                            </a>
                        </li>
                        <li>
                        <a class="{{ request()->routeIs('admin.doctors.*') ? 'active current-page' : '' }}" href="{{ route('admin.doctors.index') }}">
                        <i class="ri-stethoscope-line"></i>
                        <span class="menu-text">Doctors</span>
                            </a>
                        </li>
                        <li>
                        <a class="{{ request()->routeIs('admin.appointments.*') ? 'active current-page' : '' }}" href="{{ route('admin.appointments.index') }}">
                        <i class="ri-calendar-2-line"></i>
                        <span class="menu-text">Appointments</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}" target="_blank">
                            <i class="ri-computer-line"></i>
                            <span class="menu-text"> View Website</span>
                            </a>
                        </li> 
                
            </ul>
          </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="height: 27.2403%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
          <!-- Sidebar menu ends -->

          <!-- Sidebar contact starts -->
          <div class="sidebar-contact">
            <p class="fw-light mb-1 text-nowrap text-truncate"> Contact</p>
            <h5 class="m-0 lh-1 text-nowrap text-truncate">09607292020</h5>
            <i class="ri-phone-line"></i>
          </div>
          <!-- Sidebar contact ends -->

        </nav>
        <!-- Sidebar wrapper ends -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <div class="app-header d-flex align-items-center">

            <!-- Brand container sm starts -->
            <div class="brand-container-sm d-xl-none d-flex align-items-center">
 

              <!-- Toggle sidebar starts -->
              <button type="button" class="toggle-sidebar">
                <i class="ri-menu-line"></i>
              </button>
              <!-- Toggle sidebar ends -->

            </div>
            <!-- Brand container sm ends -->

            <!-- Search container starts -->
            <div class="search-container d-xl-block d-none">
              <input type="text" class="form-control" id="searchId" placeholder="Search">
              <i class="ri-search-line"></i>
            </div>
            <!-- Search container ends -->

            <!-- App header actions starts -->
            <div class="header-actions">

              <!-- Header actions starts -->
              <div class="d-lg-flex d-none gap-2">
 
 
 
                <!-- Notifications dropdown starts -->
                <div class="dropdown">
                  <a class="dropdown-toggle header-icon" href="https://www.bootstrapget.com/demos/apollo-medical-admin-template/dashboard3.html#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-alarm-warning-line"></i>
                    <span class="count-label success"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-300">
                    <h5 class="fw-semibold px-3 py-2 text-primary">Alerts</h5>

                    <!-- Scroll starts -->
                    <div class="scroll300 os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px; width: 0px; height: 0px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible"><div class="os-content" style="padding: 0px; height: 100%; width: 100%;">

                      <!-- Alert list starts -->
                      <div class="p-3">
                        <div class="d-flex py-2">
                          <div class="icon-box md bg-primary rounded-circle me-3">
                            <span class="fw-bold fs-6 text-white">BS</span>
                          </div>
                          <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Becky Shah</h6>
                            <p class="mb-1">
                              Appointed as a new President 2014-2025
                            </p>
                            <p class="small m-0 opacity-50">Today, 07:30pm</p>
                          </div>
                        </div>
                        <div class="d-flex py-2">
                          <div class="icon-box md bg-primary rounded-circle me-3">
                            <span class="fw-bold fs-6 text-white">UF</span>
                          </div>
                          <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Ursula Frazier</h6>
                            <p class="mb-1">
                              Congratulate, James for new job.
                            </p>
                            <p class="small m-0 opacity-50">Today, 08:00pm</p>
                          </div>
                        </div>
                        <div class="d-flex py-2">
                          <div class="icon-box md bg-primary rounded-circle me-3">
                            <span class="fw-bold fs-6 text-white">MK</span>
                          </div>
                          <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Myra Kane</h6>
                            <p class="mb-1">
                              Lewis added new doctors training schedule.
                            </p>
                            <p class="small m-0 opacity-50">Today, 09:30pm</p>
                          </div>
                        </div>
                      </div>
                      <!-- Alert list ends -->

                    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
                    <!-- Scroll ends -->

                    <!-- View all button starts -->
                    <div class="d-grid m-3">
                      <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                    </div>
                    <!-- View all button ends -->

                  </div>
                </div>
                <!-- Notifications dropdown ends -->

                <!-- Messages dropdown starts -->
                <div class="dropdown">
                  <a class="dropdown-toggle header-icon" href="https://www.bootstrapget.com/demos/apollo-medical-admin-template/dashboard3.html#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-message-3-line"></i>
                    <span class="count-label"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-300">
                    <h5 class="fw-semibold px-3 py-2 text-primary">Messages</h5>

                    <!-- Scroll starts -->
                    <div class="scroll300 os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px; width: 0px; height: 0px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible"><div class="os-content" style="padding: 0px; height: 100%; width: 100%;">

                      <!-- Messages list starts -->
                      <div class="p-3">
                        <div class="d-flex py-2">
                          <img src="./Bootstrap Gallery - Medical Admin Templates &amp; Dashboards_files/doctor3.png" class="img-3x me-3 rounded-5" alt="Hospital Admin Templates">
                          <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Albert Winters</h6>
                            <p class="mb-1">
                              Appointed as a new President 2014-2025
                            </p>
                            <p class="small m-0 opacity-50">Today, 07:30pm</p>
                          </div>
                        </div>
                        <div class="d-flex py-2">
                          <img src="./Bootstrap Gallery - Medical Admin Templates &amp; Dashboards_files/doctor1.png" class="img-3x me-3 rounded-5" alt="Hospital Admin Templates">
                          <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Van Robinson</h6>
                            <p class="mb-1">
                              Congratulate, James for new job.
                            </p>
                            <p class="small m-0 opacity-50">Today, 08:00pm</p>
                          </div>
                        </div>
                        <div class="d-flex py-2">
                          <img src="./Bootstrap Gallery - Medical Admin Templates &amp; Dashboards_files/doctor4.png" class="img-3x me-3 rounded-5" alt="Hospital Admin Templates">
                          <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Mara Coffey</h6>
                            <p class="mb-1">
                              Lewis added new doctors training schedule.
                            </p>
                            <p class="small m-0 opacity-50">Today, 09:30pm</p>
                          </div>
                        </div>
                      </div>
                      <!-- Messages list ends -->

                    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
                    <!-- Scroll ends -->

                    <!-- View all button starts -->
                    <div class="d-grid m-3">
                      <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                    </div>
                    <!-- View all button ends -->

                  </div>
                </div>
              </div>
              <!-- Header actions ends -->

              <!-- Header user settings starts -->
              @guest
    {{-- Show Login/Register links when not authenticated --}}
    @if (Route::has('login'))
        <a href="{{ route('login') }}" class="btn btn-primary ms-3">
            {{ __('Login') }}
        </a>
    @endif

    @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn btn-outline-primary ms-2">
            {{ __('Register') }}
        </a>
    @endif
@else
    {{-- Show User Dropdown when authenticated --}}
    <div class="dropdown ms-3">
        <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="avatar-box">
                <img src="{{ asset('img/doctor6.jpg') }}" class="img-2xx rounded-5" alt="User Avatar">
                <span class="status busy"></span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end shadow-lg">
            <div class="px-3 py-2">
                <span class="small">{{ Auth::user()->role ?? 'User' }}</span>
                <h6 class="m-0">{{ Auth::user()->name }}</h6>
            </div>
            <div class="mx-3 my-2 d-grid">
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endguest
              <!-- Header user settings ends -->

            </div>
            <!-- App header actions ends -->

          </div>
          <!-- App header ends -->

          <!-- App body -->
          @yield('content')
          <!-- App body ends -->

          <!-- App footer starts -->
          <div class="app-footer">
            <span>© Surgi care  2025</span>
          </div>
          <!-- App footer ends -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    {{-- JavaScript Files --}}
<script src="{{ asset('adminjs/jquery.min.js') }}"></script>
<script src="{{ asset('adminjs/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminjs/moment.min.js') }}"></script>

{{-- Vendor Js Files --}}
{{-- Overlay Scroll JS --}}
<script src="{{ asset('adminjs/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminjs/custom-scrollbar.js') }}"></script>

{{-- Date Range JS --}}
<script src="{{ asset('adminjs/daterange.js') }}"></script>
<script src="{{ asset('adminjs/custom-daterange.js') }}"></script>

{{-- Apex Charts --}}
<script src="{{ asset('adminjs/apexcharts.min.js') }}"></script>
<script src="{{ asset('adminjs/patients.js') }}"></script>
<script src="{{ asset('adminjs/appointments.js') }}"></script>
<script src="{{ asset('adminjs/income.js') }}"></script>
<script src="{{ asset('adminjs/claims.js') }}"></script>

{{-- Custom JS files --}}
<script src="{{ asset('adminjs/custom.js') }}"></script>
  

<div class="daterangepicker ltr show-ranges opensright"><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul></div><div class="drp-calendar left"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-dark" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button> </div></div></body></html>