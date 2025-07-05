<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,mov,avi|max:51200',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        Video::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'description' => $request->description,
            'video_path' => $videoPath,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'status' => 'public',
        ]);

        return redirect()->route('videos.create')->with('success', 'Video uploaded successfully.');
    }

    public function index(Request $request)
    {
        $query = Video::with('category', 'user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $videos = $query->orderBy('created_at', 'desc')->get();

        return view('videos.index', compact('videos'));
    }

    public function show($slug)
    {
        $video = Video::where('slug', $slug)
                      ->with('category', 'user')
                      ->firstOrFail();
        if (Auth::check()) {
            \App\Models\WatchHistory::updateOrCreate([
                'user_id' => Auth::id(),
                'video_id' => $video->id,
            ], [
                'watched_at' => now(),
            ]);
        }

        if (Auth::check()) {
            $user = Auth::user();

            $alreadyWatched = $video->watchHistories()
                                    ->where('user_id', $user->id)
                                    ->exists();

            if (! $alreadyWatched) {
                $video->watchHistories()->create([
                    'user_id' => $user->id,
                ]);
            }
        }

        return view('videos.show', compact('video'));
    }
}
