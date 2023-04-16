<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['title', 'slug', 'content', 'image', 'status', 'view', 'download', 'rating', 'category_id', 'user_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coursestopicsviews()
    {
        return $this->hasMany(CourseTopic::class, 'id');
    }

    public function linkscourse()
    {
        return $this->hasMany(Link::class, 'id');
    }
}
