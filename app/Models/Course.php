<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Course extends Model
{
        use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'duration_hours',
        'level',
        'image',
        'videos',
        'class_id',
        'created_by',
        'documents',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'price' => 'decimal:2',
        'documents' => 'array', // Cast JSON to array automatically
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = self::createUniqueSlug($course->title);
        });
    }

    /**
     * Generate a unique slug.
     */
    private static function createUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

// Accessors
    public function getVideoUrlAttribute()
    {
        return $this->video ? asset('storage/' . $this->video) : null;
    }

    public function getDocumentUrlsAttribute()
    {
        return collect($this->documents)->map(fn($doc) => asset('storage/' . $doc))->all();
    }
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
