@extends('layouts.admin')

@section('title', 'Edit Penyakit')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">Edit Penyakit</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.penyakit.update', $penyakit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kode Penyakit</label>
                    <input type="text" name="kode" value="{{ old('kode', $penyakit->kode) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Penyakit</label>
                    <input type="text" name="nama" value="{{ old('nama', $penyakit->nama) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24">{{ old('deskripsi', $penyakit->deskripsi) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Solusi</label>
                    <textarea name="solusi"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24">{{ old('solusi', $penyakit->solusi) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Gambar</label>
                    @if($penyakit->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $penyakit->gambar) }}" alt="{{ $penyakit->nama }}"
                                class="h-24 w-auto rounded">
                        </div>
                    @endif
                    <input type="file" name="gambar"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>
                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.penyakit.index') }}"
                        class="bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2 hover:bg-gray-600">Batal</a>
                    <button type="submit"
                        class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection