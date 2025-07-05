<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
    'title',
    'slug',
    'description',
    'video_path',
    'user_id',
    'category_id',
    'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->hasMany(VideoReaction::class);
    }

    public function watchHistories()
    {
        return $this->hasMany(WatchHistory::class);
    }


}
