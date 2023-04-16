<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    use HasFactory;
    protected $table = 'enlaces';
    protected $fillable = ['youtube', 'facebook', 'twitter', 'tiktok', 'github', 'pdf', 'link', 'topic_id'];

    public function link_topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
