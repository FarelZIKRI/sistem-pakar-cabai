@extends('layouts.admin')

@section('title', 'Detail Riwayat')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
            <div class="bg-indigo-600 p-6 text-white">
                <h2 class="text-2xl font-bold">Detail Riwayat Konsultasi</h2>
                <p class="opacity-90">ID Konsultasi: #{{ $riwayat->id }} | Tanggal:
                    {{ $riwayat->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Info Pengguna -->
                    <div>
                        <h3 class="text-gray-500 font-bold uppercase text-sm mb-2">Nama Pengguna</h3>
                        <p class="text-xl font-semibold text-gray-800">{{ $riwayat->nama_pengguna }}</p>
                    </div>

                    <!-- Info Hasil -->
                    <div>
                        <h3 class="text-gray-500 font-bold uppercase text-sm mb-2">Hasil Diagnosa</h3>
                        @if($riwayat->penyakit)
                            <p class="text-xl font-bold text-green-600">{{ $riwayat->penyakit->nama }}</p>
                            <p class="text-gray-600">Tingkat Keyakinan:
                                <strong>{{ round($riwayat->nilai_keyakinan * 100, 2) }}%</strong></p>
                        @else
                            <p class="text-xl font-bold text-gray-500">Tidak Teridentifikasi</p>
                        @endif
                    </div>
                </div>

                <hr class="my-6">

                <!-- Gejala yang dipilih -->
                <h3 class="text-gray-700 font-bold text-lg mb-4">Gejala yang Dipilih</h3>
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($riwayat->input_gejala as $gejala_id => $cf_user)
                            @php
                                $gejala = \App\Models\Gejala::find($gejala_id);
                            @endphp
                            @if($gejala)
                                <li class="mb-2 text-gray-700">
                                    <span class="font-semibold">{{ $gejala->kode }} - {{ $gejala->nama }}</span>
                                    <span class="text-sm text-gray-500">(CF User: {{ $cf_user }})</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Detail Perhitungan CF -->
                <h3 class="text-gray-700 font-bold text-lg mb-4">Hasil Perhitungan (Certainty Factor)</h3>
                <table class="w-full text-left border-collapse border border-gray-200 mb-6">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border border-gray-200">Penyakit</th>
                            <th class="p-3 border border-gray-200 text-right">Nilai CF</th>
                            <th class="p-3 border border-gray-200 text-right">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat->hasil_cf as $res)
                            <tr>
                                <td class="p-3 border border-gray-200">{{ $res['penyakit']['nama'] }}</td>
                                <td class="p-3 border border-gray-200 text-right font-mono">
                                    {{ number_format($res['cf_value'], 4) }}</td>
                                <td class="p-3 border border-gray-200 text-right font-bold">{{ $res['percentage'] }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="flex justify-end">
                    <a href="{{ route('admin.riwayat.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection