@extends('layouts.app')

@section('title', 'Konsultasi')

@section('content')
    <div class="container mx-auto px-6 py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="bg-green-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white text-center">form Konsultasi</h2>
                <p class="text-green-100 text-center">Silakan isi data diri dan pilih gejala yang dialami tanaman.</p>
            </div>

            <form action="{{ route('front.consultation.process') }}" method="POST" class="p-6">
                @csrf

                <!-- User Info -->
                <div class="mb-8">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Pengguna / Petani</label>
                    <input type="text" name="nama_pengguna"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan nama Anda" required>
                </div>

                <!-- Symptoms List -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Pilih Gejala & Tingkat Keyakinan</h3>

                    @if($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif

                    <div class="space-y-4">
                        @foreach($gejalas as $gejala)
                            <div
                                class="flex flex-col md:flex-row md:items-center justify-between bg-gray-50 p-4 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center mb-2 md:mb-0 md:w-2/3">
                                    <span class="font-bold text-green-600 mr-3">{{ $gejala->kode }}</span>
                                    <span class="text-gray-700">{{ $gejala->nama }}</span>
                                </div>
                                <div class="md:w-1/3">
                                    <select name="gejala[{{ $gejala->id }}]"
                                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-green-500">
                                        <option value="0">Tidak Mengalami (0)</option>
                                        <option value="0.2">Kurang Yakin (0.2)</option>
                                        <option value="0.4">Sedikit Yakin (0.4)</option>
                                        <option value="0.6">Cukup Yakin (0.6)</option>
                                        <option value="0.8">Yakin (0.8)</option>
                                        <option value="1">Sangat Yakin (1.0)</option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end pt-4 border-t">
                    <button type="submit"
                        class="bg-green-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-700 transition transform hover:-translate-y-1 shadow-md">
                        <i class="fas fa-clipboard-check mr-2"></i> Proses Diagnosis
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection