@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}</h1>

        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-700">Ini adalah halaman dashboard setelah login.</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('berita.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Lihat Berita
            </a>
        </div>
    </div>
@endsection
