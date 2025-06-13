@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Tambah Berita</h2>

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="judul" class="block font-medium">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="w-full border-gray-300 rounded mt-1">
            @error('judul') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="konten" class="block font-medium">Konten</label>
            <textarea name="konten" id="konten" rows="6" class="w-full border-gray-300 rounded mt-1">{{ old('konten') }}</textarea>
            @error('konten') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="foto" class="block font-medium">Foto</label>
            <input type="file" name="foto" id="foto" class="mt-1">
            @error('foto') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
    </form>
</div>
@endsection
