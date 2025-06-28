@extends('layouts.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-extrabold text-center text-blue-700 mb-12 tracking-wide">
        Kelompok VidOcean
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        {{-- ANGGOTA 1 --}}
        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition text-center">
            <img src="https://ui-avatars.com/api/?name=Nama+Anggota1&background=0D8ABC&color=fff"
                 class="w-24 h-24 rounded-full mx-auto mb-4 ring-4 ring-blue-200 shadow" alt="Anggota 1">
            <h3 class="text-xl font-bold text-gray-800 mb-1">Nama Anggota 1</h3>
            <p class="text-sm text-gray-600 mb-1">NIM</p>
        </div>

        {{-- ANGGOTA 2 --}}
        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition text-center">
            <img src="https://ui-avatars.com/api/?name=Nama+Anggota2&background=7E3AF2&color=fff"
                 class="w-24 h-24 rounded-full mx-auto mb-4 ring-4 ring-purple-200 shadow" alt="Anggota 2">
            <h3 class="text-xl font-bold text-gray-800 mb-1">Nama Anggota 2</h3>
            <p class="text-sm text-gray-600 mb-1">NIM</p>
            <p class="text-gray-500 text-sm italic">Backend Engineer</p>
        </div>

        {{-- ANGGOTA 3 --}}
        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition text-center">
            <img src="https://ui-avatars.com/api/?name=Nama+Anggota3&background=F59E0B&color=fff"
                 class="w-24 h-24 rounded-full mx-auto mb-4 ring-4 ring-yellow-200 shadow" alt="Anggota 3">
            <h3 class="text-xl font-bold text-gray-800 mb-1">Nama Anggota 3</h3>
            <p class="text-sm text-gray-600 mb-1">NIM</p>
            <p class="text-gray-500 text-sm italic">UI/UX Designer</p>
        </div>

        {{-- ANGGOTA 4 --}}
        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition text-center">
            <img src="https://ui-avatars.com/api/?name=Nama+Anggota4&background=10B981&color=fff"
                 class="w-24 h-24 rounded-full mx-auto mb-4 ring-4 ring-green-200 shadow" alt="Anggota 4">
            <h3 class="text-xl font-bold text-gray-800 mb-1">Nama Anggota 4</h3>
            <p class="text-sm text-gray-600 mb-1">NIM</p>
            <p class="text-gray-500 text-sm italic">Project Manager</p>
        </div>
    </div>

    <div class="mt-16 text-center">
        <p class="text-gray-600 text-sm">Terima kasih atas dedikasi, kerja sama, dan semangat kalian. 💙</p>
    </div>
</div>
@endsection
