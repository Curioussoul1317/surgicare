<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroSliderController;  
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\Admin\AdminDepartmentsController;

Auth::routes();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/offline', function () {
    return view('offline');
})->name('offline');
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// Doctors
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');

// Appointments
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/doctor/{doctorId}/services', [AppointmentController::class, 'getServicesByDoctor'])->name('appointments.doctor.services');


Route::get('/appointments/doctor/{doctor}/services', [AppointmentController::class, 'getDoctorServices'])->name('appointments.doctor.services');
Route::get('/appointments/service/{service}/doctors', [AppointmentController::class, 'getServiceDoctors'])->name('appointments.service.doctors');



Route::post('/appointments/send-otp', [AppointmentController::class, 'sendOtp'])->name('appointments.send-otp');
Route::get('/appointments/verify-otp', [AppointmentController::class, 'showVerifyOtp'])->name('appointments.verify-otp');
Route::post('/appointments/verify-otp', [AppointmentController::class, 'verifyOtp'])->name('appointments.verify-otp.submit');
Route::post('/appointments/resend-otp', [AppointmentController::class, 'resendOtp'])->name('appointments.resend-otp');
Route::get('/appointments/success/{id}', [AppointmentController::class, 'showSuccess'])->name('appointments.success');

// Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

 
Auth::routes();

Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments.index');
Route::get('/departments/{department}', [DepartmentsController::class, 'show'])->name('departments.show');

// AJAX search (optional)
Route::get('/api/departments/search', [DepartmentsController::class, 'search'])->name('departments.search');


/*
|--------------------------------------------------------------------------
| Search Routes
|--------------------------------------------------------------------------
*/

// General Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Advanced Service Search
Route::get('/search/services', [SearchController::class, 'searchServices'])->name('search.services');

// Advanced Doctor Search
Route::get('/search/doctors', [SearchController::class, 'searchDoctors'])->name('search.doctors');

// AJAX Live Search
Route::get('/search/live', [SearchController::class, 'liveSearch'])->name('search.live');

 

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('doctors', DoctorsController::class);
    Route::resource('services', ServicesController::class);

    Route::get('appointments', [AppointmentsController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{appointment}', [AppointmentsController::class, 'show'])->name('appointments.show');
    Route::patch('appointments/{appointment}/status', [AppointmentsController::class, 'updateStatus'])->name('appointments.updateStatus');
    Route::delete('appointments/{appointment}', [AppointmentsController::class, 'destroy'])->name('appointments.destroy');




 
    Route::resource('departments', AdminDepartmentsController::class);
    
    // Department-Doctor assignment routes
    Route::get('/departments/{department}/assign-doctors', [AdminDepartmentsController::class, 'assignDoctors'])
        ->name('departments.assign-doctors');
    Route::post('/departments/{department}/assign-doctors', [AdminDepartmentsController::class, 'storeDoctors'])
        ->name('departments.store-doctors');
    
    // Department-Service assignment routes
    Route::get('/departments/{department}/assign-services', [AdminDepartmentsController::class, 'assignServices'])
        ->name('departments.assign-services');
    Route::post('/departments/{department}/assign-services', [AdminDepartmentsController::class, 'storeServices'])
        ->name('departments.store-services');

    // Hero Sliders
    Route::resource('hero-sliders', HeroSliderController::class);
    Route::patch('hero-sliders/{heroSlider}/toggle-status', [HeroSliderController::class, 'toggleStatus'])
        ->name('hero-sliders.toggle-status');
});