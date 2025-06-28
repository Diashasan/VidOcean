<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\VideoReaction;
use Illuminate\Support\Facades\Auth;

class VideoReactionController extends Controller
{
    public function like(Video $video)
    {
        VideoReaction::updateOrCreate(
            ['user_id' => Auth::id(), 'video_id' => $video->id],
            ['type' => 'like']
        );

        return back();
    }

    public function dislike(Video $video)
    {
        VideoReaction::updateOrCreate(
            ['user_id' => Auth::id(), 'video_id' => $video->id],
            ['type' => 'dislike']
        );

        return back();
    }
}

