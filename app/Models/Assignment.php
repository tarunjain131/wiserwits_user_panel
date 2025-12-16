<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
     protected $fillable = [
        'student_id',
        'title',
        'description',
        'assignment_link',
        'deadline',
        'status',
        'assignment_status',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
