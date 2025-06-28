@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
    {{-- Video & Detail --}}
    <div class="col-span-1 lg:col-span-8">
        <video controls class="w-full rounded-xl shadow mb-4" height="480">
            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <h2 class="text-2xl font-bold text-gray-800">{{ $video->title }}</h2>
        <div class="text-sm text-gray-500 mb-2">
            Kategori: {{ $video->category->name }} &nbsp;|&nbsp; User: {{ $video->user->name }} &nbsp;|&nbsp;
            {{ $video->created_at->format('d M Y') }}
        </div>

        {{-- Like / Dislike --}}
        <div class="flex items-center gap-4 my-4">
            <form action="{{ route('videos.like', $video->id) }}" method="POST">
                @csrf
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"><i onclick="myFunction(this)" class="fa fa-thumbs-up"></i> Like</button>
            </form>

            <form action="{{ route('videos.dislike', $video->id) }}" method="POST">
                @csrf
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"><i onclick="myFunction(this)" class="fa fa-thumbs-down"></i> Dislike</button>
            </form>

            <div class="text-sm text-gray-600">
                <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i> {{ $video->reactions()->where('type', 'like')->count() }} &nbsp;|&nbsp;
                <i onclick="myFunction(this)" class="fa fa-thumbs-down"></i> {{ $video->reactions()->where('type', 'dislike')->count() }}
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="bg-gray-100 p-4 rounded mb-6">
            <h4 class="font-semibold mb-2 text-gray-700">Deskripsi</h4>
            <p class="text-sm text-gray-800">{{ $video->description }}</p>
        </div>

        {{-- Komentar --}}
        <div class="mt-8">
            <h4 class="text-xl font-semibold text-gray-800 mb-3">Komentar</h4>

            @auth
                <form action="{{ route('comments.store', $video->slug) }}" method="POST" class="mb-6">
                    @csrf
                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                    <textarea name="body" rows="3" required class="w-full border px-4 py-2 rounded focus:ring"
                        placeholder="Tulis komentar..."></textarea>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 mt-2 rounded hover:bg-blue-700">
                        Kirim Komentar
                    </button>
                </form>
            @endauth

            @forelse($video->comments as $comment)
                <div class="border-t pt-3 mb-3">
                    <p class="text-sm text-gray-800">{{ $comment->body }}</p>
                    <p class="text-xs text-gray-500">User: {{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-gray-500 text-sm">Belum ada komentar.</p>
            @endforelse
        </div>
    </div>

    {{-- Sidebar (opsional) --}}
    <div class="col-span-1 lg:col-span-4">
        <h4 class="text-lg font-semibold text-gray-700 mb-3">Video Lainnya</h4>
        @foreach(
            \App\Models\Video::where('id', '!=', $video->id)
                ->latest()->take(5)->get() as $v
        )
            <a href="{{ route('videos.show', $v->slug) }}" class="flex mb-4 hover:bg-gray-100 p-2 rounded">
                <video class="w-24 h-16 object-cover mr-3 rounded" muted>
                    <source src="{{ asset('storage/' . $v->video_path) }}" type="video/mp4">
                </video>
                <div class="text-sm">
                    <h5 class="font-semibold text-gray-800 line-clamp-2">{{ $v->title }}</h5>
                    <p class="text-xs text-gray-500">{{ $v->user->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
