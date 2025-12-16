<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'qualification','experience', 'bio', 'profile_image', 'subject_specialization', 'teacher_type', 'is_freelancer', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function availabilities()
    {
        return $this->hasMany(TeacherAvailability::class, 'user_id');
    }

}
