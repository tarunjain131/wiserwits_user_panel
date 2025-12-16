<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'patient_name',
        'doctor_name',
        'problem',
        'symptoms',
        'scheduled_at',
        'status',
        'feedback'
    ];
}
