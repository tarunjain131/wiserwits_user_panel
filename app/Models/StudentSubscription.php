<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model
{
    use HasFactory;

     protected $fillable = [
        'student_id',
        'plan_id',
        'start_date',
        'end_date',
        'is_active',
        'consultant_id'
    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function consultantDocuments()
    {
        return $this->hasMany(ConsultantStudentDocument::class, 'student_id', 'student_id')->orderBy('created_at', 'desc');
    }

}
