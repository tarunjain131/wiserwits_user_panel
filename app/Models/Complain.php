<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

      protected $fillable = [
        'consultant_id',
        'school_id',
        'teacher_id',
        'title',
        'description',
        'file_path',
    ];

    public function teacher() {
        return $this->belongsTo(User::class);
    }

    public function school() {
        return $this->belongsTo(User::class);
    }

    public function consultant() {
        return $this->belongsTo(User::class);
    }
}
