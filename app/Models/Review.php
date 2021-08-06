<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        if ('location_type' == 1) {
            return $this->belongsTo(Course::class, 'location_id');
        } elseif ('location_type' == 0) {
            return $this->belongsTo(Lesson::class, 'location_id');
        }
    }
}
