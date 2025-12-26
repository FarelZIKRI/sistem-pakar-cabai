@extends('layouts.admin')

@section('title', 'Tambah Gejala')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">Tambah Gejala Baru</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.gejala.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kode Gejala</label>
                    <input type="text" name="kode"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Contoh: G01" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Gejala</label>
                    <input type="text" name="nama"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Bobot (Weighted Product)</label>
                    <input type="number" step="0.01" name="bobot"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="0 - 5" required>
                    <p class="text-xs text-gray-500 mt-1">Bobot kepentingan gejala untuk metode WP.</p>
                </div>
                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.gejala.index') }}"
                        class="bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2 hover:bg-gray-600">Batal</a>
                    <button type="submit"
                        class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection