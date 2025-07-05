@extends('layouts.master')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-5 text-center">
            <p class="text-gray-500">Total Pengguna</p>
            <h2 class="text-2xl font-bold">{{ $userCount }}</h2>
        </div>
        <div class="bg-white rounded-lg shadow p-5 text-center">
            <p class="text-gray-500">Total Video</p>
            <h2 class="text-2xl font-bold">{{ $videoCount }}</h2>
        </div>
        <div class="bg-white rounded-lg shadow p-5 text-center">
            <p class="text-gray-500">Total Komentar</p>
            <h2 class="text-2xl font-bold">{{ $commentCount }}</h2>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Video Terbaru</h2>
        <ul>
            @foreach ($latestVideos as $video)
                <li class="mb-2">
                    <a href="{{ route('videos.show', $video->slug) }}" class="text-blue-600 hover:underline">
                        {{ $video->title }}
                    </a>
                    <span class="text-sm text-gray-500">({{ $video->created_at->diffForHumans() }})</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
