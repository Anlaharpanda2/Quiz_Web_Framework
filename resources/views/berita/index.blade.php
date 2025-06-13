@extends('layouts.app')

@section('header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Berita</h2>
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('berita.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    + Tambah Berita
                </a>
            @endif
        @endauth
        </div>
    </header>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @forelse($beritas as $b)
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <img src="{{ asset('storage/'.$b->foto) }}" class="w-full h-48 object-cover mb-3 rounded" alt="Foto Berita">
                <h3 class="text-xl font-semibold text-gray-800">{{ $b->judul }}</h3>
                <p class="text-sm text-gray-500 mb-2">oleh {{ $b->user->name }} | {{ $b->created_at->format('d M Y') }}</p>

                <div class="flex items-center space-x-4 mt-2">
                    <a href="{{ route('berita.show', $b) }}" class="text-blue-600 hover:underline text-sm">Selengkapnya</a>

                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('berita.edit', $b) }}" class="text-yellow-600 hover:underline text-sm">Edit</a>

                            <form action="{{ route('berita.destroy', $b) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada berita tersedia.</p>
        @endforelse

        <div class="mt-6">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection
