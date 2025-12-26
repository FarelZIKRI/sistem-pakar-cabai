@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <div class="container mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">Sistem Pakar <span class="text-green-600">Tanaman
                Cabai</span></h1>
        <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
            Deteksi dini penyakit pada tanaman cabai Anda dengan metode <span class="font-semibold">Certainty Factor</span>
            (CF) dan <span class="font-semibold">Weighted Product</span> (WP). Akurat dan terpercaya.
        </p>
        <a href="{{ route('front.consultation') }}"
            class="bg-green-600 text-white text-lg font-bold px-8 py-4 rounded-full hover:bg-green-700 transition shadow-lg transform hover:scale-105">
            Mulai Konsultasi <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>

    <!-- Features Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Mengapa Menggunakan Sistem Ini?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-stethoscope text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Diagnosis Cepat</h3>
                    <p class="text-gray-600">Dapatkan hasil diagnosis penyakit tanaman cabai Anda dalam hitungan detik.</p>
                </div>
                <div class="p-6">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calculator text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Metode Akurat</h3>
                    <p class="text-gray-600">Menggunakan kombinasi Certainty Factor dan Weighted Product untuk validasi
                        hasil.</p>
                </div>
                <div class="p-6">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Solusi Tepat</h3>
                    <p class="text-gray-600">Memberikan saran pengendalian dan solusi yang sesuai dengan penyakit yang
                        terdeteksi.</p>
                </div>
            </div>
        </div>
    </div>
@endsection