@extends('layouts.master')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Halo, {{ $user->name }}!</h2>
    <p class="mb-4">Berikut adalah video yang telah kamu unggah:</p>

    @if($videos->count())
        <ul>
            @foreach ($videos as $video)
                <li class="mb-2">
                    <a href="{{ route('videos.show', $video->slug) }}" class="text-blue-600 hover:underline">
                        {{ $video->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Kamu belum mengunggah video.</p>
    @endif
@endsection
