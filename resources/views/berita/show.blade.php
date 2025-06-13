@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="{{ asset('storage/' . $berita->foto) }}" alt="Gambar Berita" class="w-full h-64 object-cover">

        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $berita->judul }}</h2>
            <p class="text-sm text-gray-500 mb-4">
                oleh <span class="font-medium">{{ $berita->user->name }}</span> | {{ $berita->created_at->format('d M Y') }}
            </p>

            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($berita->konten)) !!}
            </div>

            <div class="mt-6">
                <a href="{{ route('berita.index') }}" class="inline-block bg-gray-700 hover:bg-gray-800 text-white text-sm px-4 py-2 rounded">
                    ← Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
