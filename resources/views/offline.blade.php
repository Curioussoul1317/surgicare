@extends('layouts.app')

@section('title', 'Offline - SurgiCare')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center py-5">
            <div class="mb-4">
                <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 1l6 6m0-6L1 7"></path>
                    <path d="M8.5 9.5l7 7M15.5 9.5l-7 7"></path>
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </div>
            
            <h1 class="display-4 mb-3">You're Offline</h1>
            <p class="lead text-muted mb-4">
                It looks like you've lost your internet connection.
            </p>
            
            <div class="alert alert-info">
                <strong>Note:</strong> Some features require an active internet connection:
                <ul class="mb-0 mt-2 text-start">
                    <li>Booking new appointments</li>
                    <li>OTP verification</li>
                    <li>Viewing doctor schedules</li>
                    <li>Payment processing</li>
                </ul>
            </div>
            
            <button onclick="location.reload()" class="btn btn-primary btn-lg">
                <i class="bi bi-arrow-clockwise"></i> Try Again
            </button>
            
            @auth
            <div class="mt-4">
                <p class="text-muted">You can still view your cached appointments while offline.</p>
                <a href="/appointments" class="btn btn-outline-primary">View My Appointments</a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection