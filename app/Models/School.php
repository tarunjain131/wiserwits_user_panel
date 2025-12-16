<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'school_name', 'school_code', 'contact_person',
        'contact_email', 'contact_phone', 'address', 'city', 'state',
        'country', 'pincode', 'website', 'logo', 'additional_info'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}