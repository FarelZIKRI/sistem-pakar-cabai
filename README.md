# Sistem Pakar Diagnosis Penyakit Tanaman Cabai

![Laravel CI](https://github.com/FarelZIKRI/Sistem-Pakar-Cabai/actions/workflows/laravel.yml/badge.svg)
![PHP Version](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![Laravel Version](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)

Sistem Pakar ini adalah aplikasi berbasis web yang dirancang untuk membantu petani dalam mendeteksi penyakit pada tanaman cabai secara dini. Dengan menggunakan pengetahuan pakar yang dikonversi ke dalam basis aturan digital, sistem ini mampu memberikan diagnosis penyakit beserta tingkat keyakinannya.

## Fitur Utama

1. **Dashboard Statistik** - Memantau jumlah data penyakit, gejala, dan riwayat konsultasi
2. **Manajemen Data (CRUD)** - Pengelolaan data penyakit, gejala, dan basis aturan (rule base) oleh admin
3. **Konsultasi Interaktif** - Form bagi pengguna untuk memilih gejala yang dialami dan menentukan tingkat keyakinan (user certainty)
4. **Hasil Diagnosis Detail** - Menampilkan hasil perhitungan algoritma secara transparan, interpretasi penyakit, dan solusi penanganannya
5. **Metode Ganda** - Menggabungkan Certainty Factor (CF) sebagai mesin inferensi utama dan Weighted Product (WP) sebagai pendukung keputusan (validasi)

## Tech Stack

- **Backend:** Laravel 12 (PHP 8.2)
- **Database:** MySQL
- **Frontend:** Blade Templates + Vite
