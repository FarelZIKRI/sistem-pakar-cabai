@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-wrap">
        <!-- Card Penyakit -->
        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
            <a href="{{ route('admin.penyakit.index') }}" class="block">
                <div
                    class="bg-white border-l-4 border-indigo-500 rounded-lg shadow-xl p-5 hover:shadow-2xl transition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-indigo-100"><i
                                    class="fas fa-virus text-indigo-500 text-2xl"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Total Penyakit</h5>
                            <h3 class="font-bold text-3xl">{{ $penyakit_count }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Gejala -->
        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
            <a href="{{ route('admin.gejala.index') }}" class="block">
                <div
                    class="bg-white border-l-4 border-green-500 rounded-lg shadow-xl p-5 hover:shadow-2xl transition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-100"><i
                                    class="fas fa-notes-medical text-green-500 text-2xl"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Total Gejala</h5>
                            <h3 class="font-bold text-3xl">{{ $gejala_count }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Rules -->
        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
            <a href="{{ route('admin.rule.index') }}" class="block">
                <div
                    class="bg-white border-l-4 border-yellow-500 rounded-lg shadow-xl p-5 hover:shadow-2xl transition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-yellow-100"><i
                                    class="fas fa-project-diagram text-yellow-500 text-2xl"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Basis Aturan</h5>
                            <h3 class="font-bold text-3xl">{{ $rule_count }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Konsultasi -->
        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
            <a href="{{ route('admin.riwayat.index') }}" class="block">
                <div
                    class="bg-white border-l-4 border-pink-500 rounded-lg shadow-xl p-5 hover:shadow-2xl transition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-pink-100"><i class="fas fa-users text-pink-500 text-2xl"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Riwayat Konsultasi</h5>
                            <h3 class="font-bold text-3xl">{{ $konsultasi_count }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="flex flex-wrap mt-6">
        <!-- Pie Chart: Sebaran Penyakit -->
        <div class="w-full lg:w-1/2 p-6">
            <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div
                    class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Statistik Penyakit Teridentifikasi</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartPenyakit" class="chartjs" width="undefined" height="undefined"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart: Konsultasi Bulanan -->
        <div class="w-full lg:w-1/2 p-6">
            <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div
                    class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Konsultasi per Bulan ({{ date('Y') }})</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartBulanan" class="chartjs" width="undefined" height="undefined"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Pie Chart
        const ctxPie = document.getElementById('chartPenyakit').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($pie_labels) !!},
                datasets: [{
                    label: 'Jumlah Kasus',
                    data: {!! json_encode($pie_data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        // Bar Chart
        const ctxBar = document.getElementById('chartBulanan').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Jumlah Konsultasi',
                    data: {!! json_encode($bar_data) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection