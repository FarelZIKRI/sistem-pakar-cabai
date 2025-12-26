@extends('layouts.admin')

@section('title', 'Edit Gejala')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">Edit Gejala</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.gejala.update', $gejala->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kode Gejala</label>
                    <input type="text" name="kode" value="{{ old('kode', $gejala->kode) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Gejala</label>
                    <input type="text" name="nama" value="{{ old('nama', $gejala->nama) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Bobot (Weighted Product)</label>
                    <input type="number" step="0.01" name="bobot" value="{{ old('bobot', $gejala->bobot) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.gejala.index') }}"
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