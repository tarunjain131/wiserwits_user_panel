<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'duration_days', 'features','course_id'
    ];

    protected $casts = [
        'features' => 'array',
        'course_id' => 'array',
    ];

    // Relation with features
    public function featureList()
    {
        return $this->belongsToMany(Feature::class, 'id', 'features');
    }

    public function courseList()
    {
        return $this->belongsToMany(Feature::class, 'id', 'course_id');
    }

}
