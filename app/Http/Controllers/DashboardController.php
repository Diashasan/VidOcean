<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $videos = $user->videos()->latest()->get();

        return view('dashboard.index', compact('user', 'videos'));
    }
}

