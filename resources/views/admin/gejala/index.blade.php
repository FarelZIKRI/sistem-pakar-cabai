@extends('layouts.admin')

@section('title', 'Data Gejala')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Daftar Gejala</h2>
            <a href="{{ route('admin.gejala.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                <i class="fas fa-plus mr-2"></i>Tambah Data
            </a>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Kode</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Nama Gejala</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Bobot (WP)</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gejalas as $g)
                        <tr class="hover:bg-gray-100">
                            <td class="py-4 px-6 border-b border-gray-200">{{ $g->kode }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $g->nama }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $g->bobot }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <a href="{{ route('admin.gejala.edit', $g->id) }}"
                                    class="text-blue-500 hover:text-blue-700 mr-4"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.gejala.destroy', $g->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-gray-200">
            {{ $gejalas->links() }}
        </div>
    </div>
@endsection