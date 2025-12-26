@extends('layouts.app')

@section('title', 'Hasil Diagnosis')

@section('content')
    <div class="container mx-auto px-6 py-10">

        <!-- Header Hasil -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-green-500 to-green-700 p-6 text-white text-center">
                <h2 class="text-3xl font-bold mb-2">Hasil Diagnosis</h2>
                <p class="opacity-90">Halo, {{ $konsultasi->nama_pengguna }}. Berikut adalah hasil analisis penyakit tanaman
                    cabai Anda.</p>
            </div>

            <div class="p-8 text-center">
                @if($konsultasi->penyakit)
                    <h3 class="text-gray-600 font-semibold uppercase tracking-wide">Penyakit Terdeteksi</h3>
                    <h1 class="text-4xl font-extrabold text-gray-800 mt-2 mb-4">{{ $konsultasi->penyakit->nama }}</h1>
                    <div class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full font-bold text-lg mb-6">
                        Tingkat Keyakinan: {{ round($konsultasi->nilai_keyakinan * 100, 2) }}%
                    </div>

                    @if($konsultasi->penyakit->gambar)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $konsultasi->penyakit->gambar) }}"
                                alt="{{ $konsultasi->penyakit->nama }}"
                                class="max-w-md mx-auto rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left mt-8">
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center"><i class="fas fa-info-circle mr-2"></i>
                                Deskripsi</h4>
                            <p class="text-gray-600 leading-relaxed">{{ $konsultasi->penyakit->deskripsi }}</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center"><i class="fas fa-check-circle mr-2"></i>
                                Solusi & Pengendalian</h4>
                            <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $konsultasi->penyakit->solusi }}</p>
                        </div>
                    </div>
                @else
                    <div class="py-10">
                        <i class="fas fa-question-circle text-gray-300 text-6xl mb-4"></i>
                        <h3 class="text-xl text-gray-600 font-semibold">Tidak dapat menentukan penyakit secara spesifik.</h3>
                        <p class="text-gray-500 mt-2">Gejala yang Anda pilih tidak mengarah kuat ke satu penyakit tertentu.
                            Mohon periksa kembali gejala yang dialami.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Detail Perhitungan -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Certainty Factor Results -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-indigo-600 px-6 py-3">
                    <h3 class="text-white font-bold"><i class="fas fa-calculator mr-2"></i> Perhitungan Certainty Factor
                        (CF)</h3>
                </div>
                <div class="p-6">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="pb-2 font-semibold text-gray-600">Penyakit</th>
                                <th class="pb-2 font-semibold text-gray-600 text-right">Nilai CF</th>
                                <th class="pb-2 font-semibold text-gray-600 text-right">Persentase</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($konsultasi->hasil_cf as $res)
                                <tr>
                                    <td class="py-3 text-gray-700">{{ $res['penyakit']['nama'] }}</td>
                                    <td class="py-3 text-right text-gray-600 font-mono">{{ number_format($res['cf_value'], 4) }}
                                    </td>
                                    <td
                                        class="py-3 text-right font-bold {{ $loop->first ? 'text-green-600' : 'text-gray-600' }}">
                                        {{ $res['percentage'] }}%
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Weighted Product Results -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-blue-600 px-6 py-3">
                    <h3 class="text-white font-bold"><i class="fas fa-balance-scale mr-2"></i> Perhitungan Weighted Product
                        (WP)</h3>
                </div>
                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-4">Metode WP digunakan sebagai pembanding keputusan.</p>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="pb-2 font-semibold text-gray-600">Penyakit</th>
                                <th class="pb-2 font-semibold text-gray-600 text-right">Nilai Vektor V</th>
                                <th class="pb-2 font-semibold text-gray-600 text-right">Persentase</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($konsultasi->hasil_wp as $res)
                                <tr>
                                    <td class="py-3 text-gray-700">{{ $res['penyakit']['nama'] }}</td>
                                    <td class="py-3 text-right text-gray-600 font-mono">{{ number_format($res['wp_value'], 4) }}
                                    </td>
                                    <td
                                        class="py-3 text-right font-bold {{ $loop->first ? 'text-blue-600' : 'text-gray-600' }}">
                                        {{ $res['percentage'] }}%
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="mt-8 text-center space-x-4">
            <a href="{{ route('front.consultation') }}"
                class="inline-block bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-redo mr-2"></i> Konsultasi Ulang
            </a>
            <a href="{{ route('front.home') }}"
                class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-home mr-2"></i> Kembali ke Beranda
            </a>
        </div>

    </div>
@endsection