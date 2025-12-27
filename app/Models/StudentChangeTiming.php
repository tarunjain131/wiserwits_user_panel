<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentChangeTiming extends Model
{
    protected $table ='student_change_timing';
    protected $fillable = [
        'student_id',
        'consultant_id',
        'teacher_id',
        'course_id',
        'student_request_time',
        'scheduled_time',
        'description',
        'status',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function course()
    {
        return $this->belongsTo(Plan::class, 'course_id');
    }
}
