<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherQuestionnaireForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'teacher_id',
        'class_id',
        'student_id',
        'title',
        'description',
        'status',
    ];

    public function questions()
    {
        return $this->hasMany(TeacherQuestionnaireQuestion::class, 'form_id');
    }

    public function answers()
    {
        return $this->hasMany(TeacherQuestionnaireAnswer::class, 'form_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
