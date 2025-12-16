<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherQuestionnaireQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'category',
        'question_text',
        'answer_type',
        'max_rating',
    ];

    public function form()
    {
        return $this->belongsTo(TeacherQuestionnaireForm::class, 'form_id');
    }

    public function answers()
    {
        return $this->hasMany(TeacherQuestionnaireAnswer::class, 'question_id');
    }
}
