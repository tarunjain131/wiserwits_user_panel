<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'school_id',
        'student_id',
        'title',
        'description',
        'file_path',
        'status',
        'consultant_id',
        'consultant_remark',
    ];

    // Teacher relationship
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Consultant relationship
    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    // Status scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending_review');
    }

}
