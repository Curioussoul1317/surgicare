<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentOtp extends Model
{
    protected $fillable = [
        'phone_number',
        'code',
        'appointment_data',
        'expires_at'
    ];

    protected $casts = [
        'appointment_data' => 'array',
        'expires_at' => 'datetime'
    ];
}