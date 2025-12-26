<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Sistem Pakar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .active-nav {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #fff;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal flex">

    <!-- Sidebar -->
    <div
        class="w-64 bg-indigo-800 text-white min-h-screen fixed left-0 top-0 flex flex-col transition-all duration-300 z-50">
        <!-- Logo -->
        <div class="p-6 flex items-center justify-center border-b border-indigo-700">
            <a href="{{ route('admin.dashboard') }}" class="text-white font-bold text-xl flex items-center">
                <i class="fas fa-leaf mr-2"></i>ADMIN CABAI
            </a>
        </div>

        <!-- Admin Profile Section -->
        @php
            $adminUser = \App\Models\User::first();
            $adminName = $adminUser ? $adminUser->name : 'Administrator';
            $adminAvatar = $adminUser && $adminUser->avatar ? asset('storage/' . $adminUser->avatar) : null;
        @endphp
        <div class="p-6 border-b border-indigo-700 flex items-center cursor-pointer hover:bg-indigo-700 transition"
            onclick="openProfileModal('{{ $adminName }}')">
            <div
                class="w-10 h-10 rounded-full bg-white text-indigo-800 flex items-center justify-center font-bold text-xl mr-3 overflow-hidden">
                @if($adminAvatar)
                    <img src="{{ $adminAvatar }}" alt="Avatar" class="w-full h-full object-cover">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </div>
            <div>
                <p class="font-bold text-sm">{{ $adminName }}</p>
                <p class="text-xs text-indigo-300">Online <i class="fas fa-pen ml-1 text-xs opacity-50"></i></p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block py-3 px-6 hover:bg-indigo-700 transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'active-nav' : '' }}">
                        <i class="fas fa-tachometer-alt w-6 text-center mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penyakit.index') }}"
                        class="block py-3 px-6 hover:bg-indigo-700 transition duration-200 {{ request()->routeIs('admin.penyakit.*') ? 'active-nav' : '' }}">
                        <i class="fas fa-virus w-6 text-center mr-2"></i> Data Penyakit
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.gejala.index') }}"
                        class="block py-3 px-6 hover:bg-indigo-700 transition duration-200 {{ request()->routeIs('admin.gejala.*') ? 'active-nav' : '' }}">
                        <i class="fas fa-notes-medical w-6 text-center mr-2"></i> Data Gejala
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rule.index') }}"
                        class="block py-3 px-6 hover:bg-indigo-700 transition duration-200 {{ request()->routeIs('admin.rule.*') ? 'active-nav' : '' }}">
                        <i class="fas fa-project-diagram w-6 text-center mr-2"></i> Rule Base (Aturan)
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.riwayat.index') }}"
                        class="block py-3 px-6 hover:bg-indigo-700 transition duration-200 {{ request()->routeIs('admin.riwayat.*') ? 'active-nav' : '' }}">
                        <i class="fas fa-history w-6 text-center mr-2"></i> Riwayat Konsultasi
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Bottom Link -->
        <div class="p-4 border-t border-indigo-700">
            <a href="{{ route('front.home') }}" target="_blank"
                class="block py-2 px-4 bg-indigo-600 hover:bg-indigo-500 text-center rounded text-sm transition font-bold">
                <i class="fas fa-external-link-alt mr-2"></i> Lihat Website
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-64 min-h-screen flex flex-col">
        <!-- Top header (optional, mostly for mobile menu check if needed later) -->
        <!-- Content Container -->
        <div class="p-6 flex-1">
            <!-- Messages -->


            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center py-4 text-gray-500 text-sm">
            &copy; {{ date('Y') }} Sistem Pakar Cabai. All rights reserved.
        </footer>
    </div>



    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Check for session success
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        // Check for session errors
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan!',
                html: '<ul class="text-left">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        @endif

        // Delete Confirmation Helper
        // ...

        function openProfileModal(currentName) {
            Swal.fire({
                title: 'Update Profil Admin',
                html: `
                    <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="text-left">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                            <input type="text" name="name" value="${currentName}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                            <input type="file" name="avatar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    document.getElementById('profileForm').submit();
                }
            });
        }
    </script>
</body>

</html>