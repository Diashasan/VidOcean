<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\WatchHistory;

class WatchHistoryController extends Controller
{
    public function index()
    {
        $histories = WatchHistory::with('video.category', 'video.user')
            ->where('user_id', Auth::id())
            ->latest('watched_at')
            ->get();

        return view('history.index', compact('histories'));
    }
}


