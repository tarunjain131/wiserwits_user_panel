<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultantStudent extends Model
{
    use HasFactory;
    protected $table = 'consultant_student';
    protected $fillable = ['student_id', 'consultant_id', 'subscription_id'];
}
