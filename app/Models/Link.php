<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $table = 'links';
    protected $fillable = ['youtube', 'facebook', 'twitter', 'tiktok', 'github', 'pdf', 'link', 'course_id'];

    public function links_courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
