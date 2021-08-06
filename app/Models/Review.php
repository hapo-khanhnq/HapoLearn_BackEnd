<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    const LOCATION_TYPE = [
        'lesson' => 0,
        'course' => 1
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        if ('location_type' == self::LOCATION_TYPE['course']) {
            return $this->belongsTo(Course::class, 'location_id');
        } elseif ('location_type' == self::LOCATION_TYPE['lesson']) {
            return $this->belongsTo(Lesson::class, 'location_id');
        }
    }
}
