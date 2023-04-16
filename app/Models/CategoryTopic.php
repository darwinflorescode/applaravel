<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTopic extends Model
{
    use HasFactory;
    protected $table = 'category_topics';
    protected $fillable = ['title', 'content', 'image', 'status'];

    public function topics()
    {
        return $this->hasMany(Topic::class, 'id');
    }
}
