<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoReaction extends Model
{
    
    protected $fillable = [
        'user_id',
        'video_id',
        'type',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {   
        return $this->belongsTo(Video::class);
    }
}
