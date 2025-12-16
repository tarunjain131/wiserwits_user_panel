<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherQuestionnaireAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'question_id',
        'teacher_id',
        'student_id',
        'class_id',
        'school_id',
        'rating',
        'text_answer',
        'attachment_path',
    ];

    public function form()
    {
        return $this->belongsTo(TeacherQuestionnaireForm::class, 'form_id');
    }

    public function question()
    {
        return $this->belongsTo(TeacherQuestionnaireQuestion::class, 'question_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
