<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAcademicSession extends Model
{
    protected $fillable = [
        'student_id',
        'school_id',
        'class_id',
        'section_id',
        'teacher_id',
        'consultant_id',
        'roll_number',
        'admission_number',
        'admission_date',
        'session_year',
        'start_date',
        'end_date',
        'remarks',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function school()
    {
        return $this->belongsTo(User::class,'school_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }
}
