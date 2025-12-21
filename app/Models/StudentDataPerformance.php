<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDataPerformance extends Model
{
    use HasFactory;
    protected $fillable = [
        'questionnaires_id',
        'academic_performance','competition','consistency','test_preparedness','class_engagement','subject_understanding','homework',
        'grasping_ability','retention_power','conceptual_clarity','attention_span','learning_speed',
        'peer_interaction','discipline','respect_for_authority','motivation_level','response_to_feedback',
        'stamina','participation_in_sports','teamwork_in_games','fitness_level','interest_in_activities',
        'initiative_in_projects','curiosity_level','problem_solving','extra_curricular','idea_generation',
        'maths','science','english','social_studies','computer_science',
        'suggestions','attachment_path'
    ];

    public function questionnaires()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaires_id');
    }


}
