@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

     <div class="row" >
                <div class="card shadow">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="bi bi-shield-check text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="card-title">Verify OTP</h3>
                            <p class="text-muted">
                                We've sent a 6-digit code to<br>
                                <strong>{{ $maskedPhone }}</strong>
                            </p>
                        </div>
                        
                        <form action="{{ route('appointments.verify-otp.submit') }}" method="POST" id="otpForm">
                            @csrf

                            <div class="mb-4">
                                <label for="otp" class="form-label text-center w-100">Enter OTP Code</label>
                                <div class="otp-input-container d-flex justify-content-center gap-2">
                                    <input type="text" class="form-control text-center otp-digit" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="off">
                                    <input type="text" class="form-control text-center otp-digit" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="off">
                                    <input type="text" class="form-control text-center otp-digit" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="off">
                                    <input type="text" class="form-control text-center otp-digit" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="off">
                                    <input type="text" class="form-control text-center otp-digit" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="off">
                                    <input type="text" class="form-control text-center otp-digit" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="off">
                                </div>
                                <input type="hidden" name="otp" id="otp" required>
                                @error('otp')
                                <div class="text-danger text-center mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-check-circle"></i> Verify & Book Appointment
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <p class="text-muted mb-2">Didn't receive the code?</p>
                            <form action="{{ route('appointments.resend-otp') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link" id="resendBtn">
                                    <i class="bi bi-arrow-clockwise"></i> Resend OTP
                                </button>
                            </form>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('appointments.create') }}" class="text-muted">
                                <i class="bi bi-arrow-left"></i> Back to Appointment Form
                            </a>
                        </div>

                        <!-- Timer Display -->
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-clock"></i> OTP expires in: <span id="timer" class="fw-bold">10:00</span>
                            </small>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
.otp-digit {
    width: 50px;
    height: 60px;
    font-size: 1.5rem;
    font-weight: bold;
}

.otp-digit:focus {
    border-color: var(--bs-primary);
    box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const otpInputs = document.querySelectorAll('.otp-digit');
    const otpHiddenInput = document.getElementById('otp');
    const form = document.getElementById('otpForm');
    
    // Auto-focus first input
    otpInputs[0].focus();
    
    // Handle input
    otpInputs.forEach((input, index) => {
        input.addEventListener('input', function(e) {
            const value = e.target.value;
            
            if (value.length === 1 && /[0-9]/.test(value)) {
                // Move to next input
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
                
                // Update hidden input
                updateOTP();
                
                // Auto-submit if all filled
                if (index === otpInputs.length - 1) {
                    const allFilled = Array.from(otpInputs).every(input => input.value.length === 1);
                    if (allFilled) {
                        setTimeout(() => form.submit(), 300);
                    }
                }
            } else {
                e.target.value = '';
            }
        });
        
        // Handle backspace
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !e.target.value && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
        
        // Handle paste
        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const pasteData = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
            
            if (pasteData.length === 6) {
                pasteData.split('').forEach((char, i) => {
                    if (otpInputs[i]) {
                        otpInputs[i].value = char;
                    }
                });
                updateOTP();
                otpInputs[5].focus();
                
                // Auto-submit after paste
                setTimeout(() => form.submit(), 300);
            }
        });
    });
    
    function updateOTP() {
        const otp = Array.from(otpInputs).map(input => input.value).join('');
        otpHiddenInput.value = otp;
    }
    
    // Countdown timer (10 minutes)
    let timeLeft = 600; // 10 minutes in seconds
    const timerElement = document.getElementById('timer');
    
    const countdown = setInterval(function() {
        timeLeft--;
        
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        
        timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
        
        if (timeLeft <= 0) {
            clearInterval(countdown);
            timerElement.textContent = 'Expired';
            timerElement.classList.add('text-danger');
            
            // Disable form
            form.querySelectorAll('input, button').forEach(el => el.disabled = true);
            
            // Show expiry message
            alert('OTP has expired. Please request a new one.');
        } else if (timeLeft <= 60) {
            timerElement.classList.add('text-danger');
        }
    }, 1000);
    
    // Resend button cooldown
    const resendBtn = document.getElementById('resendBtn');
    let resendCooldown = 0;
    
    resendBtn.closest('form').addEventListener('submit', function() {
        if (resendCooldown > 0) {
            alert('Please wait before requesting another OTP.');
            return false;
        }
        
        resendCooldown = 30;
        resendBtn.disabled = true;
        resendBtn.textContent = `Resend in ${resendCooldown}s`;
        
        const cooldownInterval = setInterval(function() {
            resendCooldown--;
            resendBtn.textContent = `Resend in ${resendCooldown}s`;
            
            if (resendCooldown <= 0) {
                clearInterval(cooldownInterval);
                resendBtn.disabled = false;
                resendBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Resend OTP';
            }
        }, 1000);
    });
});
</script>
@endsection