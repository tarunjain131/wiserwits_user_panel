<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultantStudentDocument extends Model
{
    use HasFactory;

    protected $table = 'consultent_student_documents';
    protected $fillable = ['title','description','documents','is_published','consultant_id','subscriptions_id','student_id'];
    protected $casts = [
        'documents' => 'array', // store JSON in DB but cast as array in Laravel
    ];
}
