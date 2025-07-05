<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Video $video)
    {
        
        
        
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'video_id' => $video->id,
            'body' => $request->body,
        ]);

        return redirect()->route('videos.show', $video->slug)->with('success', 'Komentar berhasil dikirim!');
    }
}



