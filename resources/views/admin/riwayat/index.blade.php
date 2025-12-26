@extends('layouts.admin')

@section('title', 'Riwayat Konsultasi')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Riwayat Konsultasi</h2>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Tanggal</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Nama Pengguna</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Hasil Diagnosa</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Nilai Keyakinan</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-600">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayats as $r)
                        <tr class="hover:bg-gray-100">
                            <td class="py-4 px-6 border-b border-gray-200">{{ $r->created_at->format('d M Y H:i') }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $r->nama_pengguna }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                @if($r->penyakit)
                                    <span
                                        class="bg-red-100 text-red-800 py-1 px-2 rounded-full text-xs font-bold">{{ $r->penyakit->nama }}</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 py-1 px-2 rounded-full text-xs font-bold">Tidak
                                        Teridentifikasi</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                {{ round($r->nilai_keyakinan * 100, 2) }}%
                            </td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <a href="{{ route('admin.riwayat.show', $r->id) }}"
                                    class="text-blue-500 hover:text-blue-700 mr-4"><i class="fas fa-eye"></i> Detail</a>
                                <form action="{{ route('admin.riwayat.destroy', $r->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus riwayat ini?');">
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
            {{ $riwayats->links() }}
        </div>
    </div>
@endsection