<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function mentor()
    {
        return $this->users()->where('role', 1);
    }

    public function students()
    {
        return $this->users()->where('role', 0);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'location_id')->where('location_type', 0);
    }
}
