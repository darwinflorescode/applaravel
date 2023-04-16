<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['title', 'content', 'image', 'status'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'id');
    }
}
