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
        'email',
        'phone',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the services associated with the doctor.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service')
                    ->withTimestamps();
    }

    /**
     * Get the departments associated with the doctor.
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_doctor')
                    ->withTimestamps();
    }

    /**
     * Get the appointments for the doctor.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Scope a query to only include active doctors.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to search doctors by name or specialization.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('specialization', 'like', "%{$search}%")
              ->orWhere('qualification', 'like', "%{$search}%");
        });
    }
}