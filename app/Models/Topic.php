<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    protected $fillable = ['title', 'slug', 'content', 'image', 'status', 'view', 'download', 'rating', 'categorytopic_id'];

    public function category_topics()
    {
        return $this->belongsTo(CategoryTopic::class, 'categorytopic_id');
    }

    public function coursestopicsviewss()
    {
        return $this->hasMany(CourseTopic::class, 'id');
    }

    public function links()
    {
        return $this->hasMany(Enlace::class, 'id');
    }
}
