@extends('layouts.master')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800"> Selamat datang, {{ $user->name }}!</h2>

    {{-- Ringkasan Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-blue-500">
            <h4 class="text-xl font-semibold text-gray-700">Total Video</h4>
            <p class="text-4xl mt-2 font-bold text-blue-600">{{ $user->videos()->count() }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-green-500">
            <h4 class="text-xl font-semibold text-gray-700">Total Komentar</h4>
            <p class="text-4xl mt-2 font-bold text-green-600">{{ $user->comments()->count() }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-purple-500">
            <h4 class="text-xl font-semibold text-gray-700">Video Terakhir</h4>
            <p class="mt-2 text-gray-600">
                {{ optional($user->videos()->latest()->first())->title ?? 'Belum ada' }}
            </p>
        </div>
    </div>

    {{-- Daftar Video --}}
    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-2xl font-semibold mb-4 text-gray-800">Video Kamu</h3>

        @if($videos->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($videos as $video)
                    <div class="border rounded-xl p-3 shadow hover:shadow-lg transition">
                        <a href="{{ route('videos.show', $video->slug) }}">
                            <video class="w-full h-40 object-cover rounded mb-2" muted>
                                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                            </video>
                            <h4 class="text-lg font-semibold text-gray-800">{{ $video->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $video->category->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Kamu belum mengunggah video apapun.</p>
        @endif
    </div>
</div>
@endsection
