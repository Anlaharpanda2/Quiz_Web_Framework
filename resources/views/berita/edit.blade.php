@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Edit Berita</h2>

    {{-- Tidak perlu pakai $berita->id jika sudah route model binding --}}
    <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block font-medium">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" class="w-full border-gray-300 rounded mt-1">
            @error('judul') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="konten" class="block font-medium">Konten</label>
            <textarea name="konten" id="konten" rows="6" class="w-full border-gray-300 rounded mt-1">{{ old('konten', $berita->konten) }}</textarea>
            @error('konten') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Foto Saat Ini:</label>
            @if ($berita->foto)
                <img src="{{ asset('storage/'.$berita->foto) }}" alt="Foto Berita" class="w-40 mb-2">
            @else
                <p class="text-sm text-gray-500 italic">Belum ada foto.</p>
            @endif
        </div>

        <div>
            <label for="foto" class="block font-medium">Ganti Foto (opsional)</label>
            <input type="file" name="foto" id="foto" class="mt-1">
            @error('foto') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Update
        </button>
    </form>
</div>
@endsection
