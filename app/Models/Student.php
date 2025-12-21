<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Student extends Authenticatable
{
    use Notifiable;
    
    protected $table ='students';
    protected $fillable = [
        'first_name','last_name','middle_name','gender','date_of_birth','height','weight','blood_group',
        'email','phone','alternate_phone','address','city','state','country','postal_code',
        'roll_number','admission_number','admission_date','class_id','section_id',
        'program','year','semester',
        'father_name','mother_name','guardian_name','guardian_phone','guardian_email',
        'profile_image','status','new_school_id','created_by','old_school_id','password'
    ];


    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = Str::ucfirst(strtolower($value));
    }

    // Last Name Capitalize
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = Str::ucfirst(strtolower($value));
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function school()
    {
        return $this->belongsTo(User::class, 'new_school_id')->where('role_id',6);
    }

    public function parentCallSummaries()
    {
        return $this->hasMany(ParentCallSummary::class, 'student_id')->orderBy('created_at','desc');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function studentSubscription()
    {
        return $this->hasOne(StudentSubscription::class, 'student_id');
    }

    public function sessions()
    {
        return $this->hasMany(StudentAcademicSession::class);
    }

    public function currentSession()
    {
        return $this->hasOne(StudentAcademicSession::class)->whereNull('end_date');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

}

