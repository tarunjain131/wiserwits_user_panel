<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolTeacher extends Model
{
    use HasFactory;
    protected $fillable = ['school_id', 'teacher_ids'];

    protected $casts = [
        'teacher_ids' => 'array', // auto convert JSON <-> array
    ];

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    public function teachers()
    {
        return User::whereIn('id', $this->teacher_ids)->where('role_id', 6)->get();
    }
}
