<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    use HasFactory;
    protected $table = 'course_topics';
    protected $fillable = ['course_id', 'topic_id'];

    public function courses_views()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function topics_views()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

}
