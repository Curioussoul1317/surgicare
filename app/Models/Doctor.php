<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'qualification',
        'experience_years',
        'bio',
        'image',
        'email',
        'phone',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'experience_years' => 'integer'
    ];

    // Relationship with services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service');
    }

    // Relationship with appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}