<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'image',
        'price',
        'duration',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    // Relationship with doctors
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_service');
    }

    // Relationship with appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}