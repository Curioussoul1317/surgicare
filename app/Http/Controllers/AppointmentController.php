<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentOtp;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Client\ConnectionException;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        // Get the pre-selected doctor or service if provided
        $selectedDoctorId = $request->query('doctor_id');
        $selectedServiceId = $request->query('service_id');
        
        // Filter doctors and services based on selection
        if ($selectedServiceId) {
            $doctors = Doctor::where('is_active', true)
                             ->whereHas('services', function($query) use ($selectedServiceId) {
                                 $query->where('service_id', $selectedServiceId);
                             })
                             ->get();
            $services = Service::where('is_active', true)->get();
            $selectedService = Service::find($selectedServiceId);
            $selectedDoctor = null;
        } elseif ($selectedDoctorId) {
            $doctors = Doctor::where('is_active', true)->get();
            $services = Service::where('is_active', true)
                               ->whereHas('doctors', function($query) use ($selectedDoctorId) {
                                   $query->where('doctor_id', $selectedDoctorId);
                               })
                               ->get();
            $selectedDoctor = Doctor::find($selectedDoctorId);
            $selectedService = null;
        } else {
            $doctors = Doctor::where('is_active', true)->get();
            $services = Service::where('is_active', true)->get();
            $selectedDoctor = null;
            $selectedService = null;
        }
        
        return view('appointments.create', compact(
            'doctors', 
            'services', 
            'selectedDoctorId', 
            'selectedServiceId',
            'selectedDoctor',
            'selectedService'
        ));
    }

    public function sendOtp(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_nicno' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'doctor_id' => 'required|exists:doctors,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        // Format phone number
        $phone = preg_replace('/[^0-9]/', '', $validated['patient_phone']);
        
        // Add country code if not present (Maldives = 960)
        if (!str_starts_with($phone, '960')) {
            $phone = '960' . $phone;
        }

        // Generate 6-digit OTP
        $otpCode = mt_rand(100000, 999999);

        // Store OTP in database
        AppointmentOtp::updateOrCreate(
            ['phone_number' => $phone],
            [
                'code' => $otpCode,
                'appointment_data' => $validated,
                'expires_at' => Carbon::now()->addMinutes(10)
            ]
        );

        // Send SMS
        $sendSuccess = $this->sendSmsOtp($phone, $otpCode);

        if (!$sendSuccess) {
            return back()->withInput()
                ->with('error', 'Failed to send OTP. Please try again.');
        }

        // Store phone in session for verification page
        Session::put('otp_phone_number', $phone);

        return redirect()->route('appointments.verify-otp')
            ->with('success', 'OTP has been sent to your phone number.');
    }

    private function sendSmsOtp($phoneNumber, $otpCode)
    {
        try {
            $apiUrl = env('MSGOWL_API_URL', 'https://otp.msgowl.com/send');
            $apiKey = env('MSGOWL_API_KEY');

            if (empty($apiKey)) {
                throw new \Exception('MSGOWL API key is not configured in environment file');
            }

            Log::info('Sending OTP SMS', [
                'phone' => $phoneNumber,
                'otp' => $otpCode
            ]);

            $response = Http::timeout(15)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey
                ])
                ->post($apiUrl, [
                    'phone_number' => (string)$phoneNumber,
                    'timestamp' => Carbon::now()->toIso8601ZuluString(),
                    'code' => (string)$otpCode,
                    'code_length' => 6
                ]);

            Log::info('SMS API Response', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                Session::flash('success', 'OTP sent successfully to your phone.');
                return true;
            } else {
                $errorMessage = $response->json()['message'] ?? 'Unknown error from OTP service';
                $statusCode = $response->status();
                Log::error("OTP service error: {$errorMessage}", [
                    'status_code' => $statusCode,
                    'response' => $response->json(),
                    'phone_number' => $phoneNumber
                ]);

                Session::flash('error', "Failed to send OTP: {$errorMessage}");
                return false;
            }
        } catch (ConnectionException $e) {
            Log::error("OTP service connection error: {$e->getMessage()}");
            Session::flash('error', 'Unable to connect to OTP service. Please try again later.');
            return false;
        } catch (\Exception $e) {
            Log::error("OTP service exception: {$e->getMessage()}");
            Session::flash('error', 'An error occurred while sending OTP. Please try again later.');
            return false;
        }
    }

    public function showVerifyOtp()
    {
        if (!Session::has('otp_phone_number')) {
            return redirect()->route('appointments.create')
                ->with('error', 'No OTP request found. Please start over.');
        }

        $phoneNumber = Session::get('otp_phone_number');
        
        // Check if OTP exists and hasn't expired
        $otpRecord = AppointmentOtp::where('phone_number', $phoneNumber)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otpRecord) {
            Session::forget('otp_phone_number');
            return redirect()->route('appointments.create')
                ->with('error', 'OTP has expired. Please start over.');
        }

        // Mask phone number for display
        $maskedPhone = substr($phoneNumber, 0, 3) . '****' . substr($phoneNumber, -4);
        
        // For debugging (remove in production)
        $debugOtp = config('app.debug') ? $otpRecord->code : null;

        return view('appointments.verify-otp', compact('maskedPhone', 'debugOtp'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ], [
            'otp.required' => 'Please enter the verification code.',
            'otp.numeric' => 'The verification code must contain only numbers.',
            'otp.digits' => 'The verification code must be 6 digits.',
        ]);

        if (!Session::has('otp_phone_number')) {
            return redirect()->route('appointments.create')
                ->with('error', 'Session expired. Please start over.');
        }

        $phoneNumber = Session::get('otp_phone_number');
        
        $otpRecord = AppointmentOtp::where('phone_number', $phoneNumber)
            ->where('code', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otpRecord) {
            Log::warning('Invalid OTP attempt', [
                'phone' => $phoneNumber,
                'attempted_otp' => $request->otp
            ]);
            
            return back()->withErrors([
                'otp' => 'Invalid or expired OTP code. Please try again.',
            ]);
        }

        // OTP is valid, create appointment
        try {
            $appointmentData = $otpRecord->appointment_data;
            
            $appointment = Appointment::create([
                'patient_name' => $appointmentData['patient_name'],
                'patient_nicno' => $appointmentData['patient_nicno'],
                'patient_phone' => $appointmentData['patient_phone'],
                'doctor_id' => $appointmentData['doctor_id'],
                'service_id' => $appointmentData['service_id'],
                'appointment_date' => $appointmentData['appointment_date'],
                'appointment_time' => $appointmentData['appointment_time'],
                'notes' => $appointmentData['notes'] ?? null,
                'status' => 'pending',
            ]);

            Log::info('Appointment created successfully', [
                'appointment_id' => $appointment->id,
                'phone' => $phoneNumber
            ]);

            // Clean up
            $otpRecord->delete();
            Session::forget('otp_phone_number');
 
          // Redirect to success page with appointment ID
        return redirect()->route('appointments.success', ['id' => $appointment->id])
        ->with('success', 'Appointment booked successfully!');
                
        } catch (\Exception $e) {
            Log::error('Appointment Creation Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to create appointment. Please try again.');
        }
    }


    public function showSuccess($id)
{
    $appointment = Appointment::with(['doctor', 'service'])->findOrFail($id);
    
    return view('appointments.success', compact('appointment'));
}


    public function resendOtp(Request $request)
    {
        if (!Session::has('otp_phone_number')) {
            return redirect()->route('appointments.create')
                ->with('error', 'Session expired. Please start over.');
        }

        $phoneNumber = Session::get('otp_phone_number');
        
        $otpRecord = AppointmentOtp::where('phone_number', $phoneNumber)->first();

        if (!$otpRecord) {
            return redirect()->route('appointments.create')
                ->with('error', 'No OTP request found. Please start over.');
        }

        // Generate new OTP
        $otpCode = mt_rand(100000, 999999);

        // Update OTP record
        $otpRecord->update([
            'code' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes(10)
        ]);

        // Send SMS
        $sendSuccess = $this->sendSmsOtp($phoneNumber, $otpCode);

        if (!$sendSuccess) {
            return back()->with('error', 'Failed to resend OTP. Please try again.');
        }

        return back()->with('success', 'New OTP has been sent to your phone.');
    }

    // API endpoints for dynamic filtering
    public function getDoctorServices($doctorId)
    {
        $services = Service::where('is_active', true)
                           ->whereHas('doctors', function($query) use ($doctorId) {
                               $query->where('doctor_id', $doctorId);
                           })
                           ->get();
        
        return response()->json($services);
    }

    public function getServiceDoctors($serviceId)
    {
        $doctors = Doctor::where('is_active', true)
                         ->whereHas('services', function($query) use ($serviceId) {
                             $query->where('service_id', $serviceId);
                         })
                         ->get();
        
        return response()->json($doctors);
    }
}