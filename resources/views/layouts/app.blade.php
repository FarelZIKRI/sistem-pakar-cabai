<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Pakar Cabai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-green-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="{{ route('front.home') }}" class="text-2xl font-bold text-green-600 flex items-center">
                <i class="fas fa-seedling mr-2"></i> SISPAK CABAI
            </a>
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('front.home') }}" class="text-gray-600 hover:text-green-600 transition">Beranda</a>
                <a href="{{ route('front.consultation') }}"
                    class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition shadow-lg transform hover:scale-105">Konsultasi
                    Sekarang</a>
            </div>
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-600 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 min-h-screen">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12 py-8">
        <div class="container mx-auto px-6 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} Sistem Pakar Diagnosis Penyakit Tanaman Cabai. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>