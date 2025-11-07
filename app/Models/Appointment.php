<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_email',
        'patient_phone',
        'doctor_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'notes',
        'status'
    ];

    protected $casts = [
        'appointment_date' => 'date'
    ];

    // Relationship with doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relationship with service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}