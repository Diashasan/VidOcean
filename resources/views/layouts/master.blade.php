<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidOcean</title>
    @vite('resources/css/app.css')

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- AlpineJS CDN --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 font-sans" x-data="{ sidebarOpen: false }">

    {{-- Mobile Navbar --}}
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center md:hidden">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-10 w-10 object-contain">
            <span class="text-xl font-bold text-blue-600">VidOcean</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen">
            <i class="bi bi-list text-2xl text-blue-600"></i>
        </button>
    </nav>

    {{-- Sidebar Mobile --}}
    <div x-show="sidebarOpen" class="fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden" @click="sidebarOpen = false"></div>

    <aside x-show="sidebarOpen" x-transition class="fixed top-0 left-0 w-64 bg-white h-full z-50 p-6 md:hidden">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-blue-600">Menu</h2>
            <button @click="sidebarOpen = false" class="text-gray-500 hover:text-red-500">
                <i class="bi bi-x-lg text-xl"></i>
            </button>
        </div>
        <nav class="space-y-4">
            @auth
                <a href="{{ url('/') }}" class="block text-gray-700 hover:text-blue-600">Beranda</a>
                <a href="{{ route('videos.index') }}" class="block text-gray-700 hover:text-blue-600">Semua Video</a>
                <a href="{{ route('videos.create') }}" class="block text-gray-700 hover:text-blue-600">Upload</a>
                <a href="{{ route('history.index') }}" class="block text-gray-700 hover:text-blue-600">Histori</a>
                <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-blue-600">Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="block text-gray-700 hover:text-blue-600">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-blue-600 hover:underline">Login</a>
                <a href="{{ route('register') }}" class="block text-blue-600 hover:underline">Register</a>
            @endauth
        </nav>
    </aside>

    {{-- Desktop Navbar --}}
    <nav class="bg-white shadow px-6 py-4 justify-between items-center hidden md:flex">
        <a href="{{ url('/') }}" class="flex items-center space-x-3">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-14 w-14 object-contain">
            <span class="text-2xl font-bold text-blue-600">VidOcean</span>
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
                <span class="text-sm text-gray-600">
                    Halo, <a href="{{ url('profile') }}" class="text-blue-600 hover:underline">{{ Auth::user()->name }}</a>
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
        &copy; {{ date('Y') }} VidOcean — All rights reserved.
    </footer>
</body>
</html>
