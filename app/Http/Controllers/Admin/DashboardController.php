<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'videoCount' => Video::count(),
            'commentCount' => Comment::count(),
            'latestVideos' => Video::latest()->take(5)->get(),
        ]);
    }
}

