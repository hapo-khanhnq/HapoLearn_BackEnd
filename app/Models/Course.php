<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function teacher()
    {
        return $this->users()->where('role', 1);
    }

    public function students()
    {
        return $this->users()->where('role', 0);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'location_id')->where('location_type', 1);
    }
}
