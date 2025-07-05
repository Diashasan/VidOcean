<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidOcean</title>
    @vite('resources/css/app.css')

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 font-sans">

    {{-- Navbar --}}
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
         VidOcean
        </a>

        <form action="{{ route('videos.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" placeholder="Cari video..."
                class="border rounded px-3 py-1 text-sm focus:outline-none focus:ring focus:border-blue-300"
                value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                Cari
            </button>
        </form>

        <div class="flex gap-3 items-center">
            @auth
                <a href="{{ route('videos.create') }}" class="text-sm text-blue-600 hover:underline">Upload</a>
                <a href="{{ route('history.index') }}" class="text-sm text-blue-700 hover:underline">Histori</a>
                <a href="{{ route('dashboard') }}" class="text-sm text-blue-600 hover:underline">Dashboard</a>
                <span class="text-sm text-gray-600">Halo, 
                    <a href="{{ url('profile') }}"class="text-sm text-blue-600 hover:underline">{{ Auth::user()->name }}
                    </a>
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">Register</a>
            @endauth
        </div>
    </nav>

    {{-- Konten --}}
    <main class="px-6 py-6 max-w-7xl mx-auto">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t text-center py-4 text-sm text-gray-400">
        &copy; {{ date('Y') }} VidOcean — Allright Reserved.
    </footer>
</body>
</html>
