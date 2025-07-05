@extends('layouts.master')

@section('content')

{{-- HERO SECTION --}}
<div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-24 shadow-inner">
    <div class="max-w-5xl mx-auto text-center px-4">
        <h1 class="text-5xl font-bold mb-4">Selamat Datang di <span class="text-yellow-300">VidOcean</span></h1>
        <p class="text-xl mb-6">Platform berbagi video kreatif, bebas, dan inspiratif untuk semua orang.</p>

        @guest
            <a href="{{ route('login') }}" class="bg-yellow-400 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-300 transition">Masuk Sekarang</a>
            <a href="{{ route('register') }}" class="ml-3 border border-white px-6 py-3 rounded font-semibold hover:bg-white hover:text-blue-700 transition">Daftar Gratis</a>
        @else
            <a href="{{ route('videos.create') }}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold hover:bg-gray-100 transition">Upload Video</a>
            <a href="{{ route('videos.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded font-semibold hover:bg-gray-100 transition">Jelajahi!</a>
        @endguest
    </div>
</div>

{{-- KATEGORI POPULER --}}
<div class="max-w-6xl mx-auto px-4 mt-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">Jelajahi Kategori</h2>
    <div class="flex flex-wrap gap-3">
        @foreach(\App\Models\Category::inRandomOrder()->take(8)->get() as $category)
            <span class="bg-gray-100 text-sm px-4 py-2 rounded-full border hover:bg-blue-100 cursor-pointer">
                {{ $category->name }}
            </span>
        @endforeach
    </div>
</div>

{{-- VIDEO TERBARU --}}
<div class="max-w-6xl mx-auto px-4 mt-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Video Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(\App\Models\Video::latest()->take(6)->get() as $video)
            <a href="{{ route('videos.show', $video->slug) }}" class="group bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                <video class="w-full h-44 object-cover group-hover:opacity-80 transition" muted>
                    <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                </video>
                <div class="p-4">
                    <h3 class="font-bold text-lg text-gray-800 group-hover:text-blue-600 truncate">{{ $video->title }}</h3>
                    <p class="text-sm text-gray-500 truncate">{{ $video->description }}</p>
                    <div class="text-xs text-gray-400 mt-1">
                        Kategori: {{ $video->category->name }} &nbsp;|&nbsp; Di Upload oleh: {{ $video->user->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

{{-- VIDEO POPULER --}}
<div class="max-w-6xl mx-auto px-4 mt-20">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Video Populer Minggu Ini</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(
            \App\Models\Video::withCount(['reactions as likes_count' => function ($query) {
                $query->where('type', 'like');
            }])
            ->orderBy('likes_count', 'desc')
            ->take(6)
            ->get() as $video
        )
            <a href="{{ route('videos.show', $video->slug) }}" class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                <video class="w-full h-44 object-cover" muted>
                    <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                </video>
                <div class="p-4">
                    <h3 class="font-bold text-lg text-gray-800">{{ $video->title }}</h3>
                    <div class="text-sm text-gray-500">
                        Like(s) {{ $video->likes_count }} Like &nbsp;|&nbsp; Kategori: {{ $video->category->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

{{-- CTA / TESTIMONIAL --}}
<div class="bg-indigo-50 mt-24 py-16">
    <div class="max-w-4xl mx-auto text-center px-6">
        <blockquote class="italic text-xl text-gray-700 mb-4">
            “VidOcean membantu saya berbagi konten dan menumbuhkan audiens dengan mudah.”
        </blockquote>
        <p class="font-semibold text-gray-600 mb-6">— Kreator VidOcean</p>
        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
             Gabung Sekarang
        </a>
    </div>
</div>

@endsection
