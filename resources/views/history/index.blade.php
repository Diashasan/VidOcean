@extends('layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Histori Video yang Pernah Ditonton</h2>

@if($histories->isEmpty())
    <p class="text-gray-500">Kamu belum menonton video apapun.</p>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($histories as $history)
            <div class="bg-white rounded-xl shadow p-3 hover:shadow-lg transition">
                <a href="{{ route('videos.show', $history->video->slug) }}">
                    <video class="w-full h-48 object-cover rounded" controls muted>
                        <source src="{{ asset('storage/' . $history->video->video_path) }}" type="video/mp4">
                        Browser tidak mendukung video.
                    </video>
                    <h5 class="mt-3 font-semibold text-lg">{{ $history->video->title }}</h5>
                    <p class="text-sm text-gray-500">
                        {{ \Illuminate\Support\Str::limit($history->video->description, 100) }}
                    </p>
                    <p class="text-sm text-gray-400 mt-1">
                        Kategori: {{ $history->video->category->name }} &nbsp;|&nbsp;
                        Di Upload oleh: {{ $history->video->user->name }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">Ditonton pada: {{ $history->watched_at->format('d M Y H:i') }}</p>
                </a>
            </div>
        @endforeach
    </div>
@endif
@endsection
