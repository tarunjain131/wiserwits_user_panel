<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCallSummary extends Model
{
    use HasFactory;
    
    protected $fillable = ['student_id', 'consultant_id', 'summary', 'attachments'];

    protected $casts = [
        'attachments' => 'array', // auto convert JSON
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }
}
