@extends('layouts.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Semua Video</h2>
        <form action="{{ route('videos.index') }}" method="GET" class="flex">
            <input type="text" name="search" placeholder="Cari video..." value="{{ request('search') }}"
                class="rounded-l px-4 py-2 border border-gray-300 focus:outline-none focus:ring focus:border-blue-400 w-64" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">
                🔍
            </button>
        </form>
    </div>

    @if(request('search'))
        <p class="text-gray-600 text-sm mb-4">
            Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
        </p>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($videos as $video)
            <a href="{{ route('videos.show', $video->slug) }}" class="group bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                <div class="relative">
                    <video class="w-full h-48 object-cover group-hover:opacity-90 transition" muted>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                    </video>
                    <span class="absolute top-2 left-2 bg-white text-blue-700 text-xs font-bold px-2 py-1 rounded">
                        {{ $video->category->name }}
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 truncate">{{ $video->title }}</h3>
                    <p class="text-sm text-gray-500 mb-1 truncate">{{ $video->description }}</p>
                    <p class="text-xs text-gray-400">👤 {{ $video->user->name }}</p>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center text-gray-500 py-16">
                Tidak ada video ditemukan.
            </div>
        @endforelse
    </div>
</div>
@endsection
