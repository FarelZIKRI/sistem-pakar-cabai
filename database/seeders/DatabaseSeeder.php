<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Rule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Penyakit
        $penyakits = [
            [
                'kode' => 'P01',
                'nama' => 'Layu Fusarium',
                'deskripsi' => 'Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.',
                'solusi' => 'Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.',
                'gambar' => null
            ],
            [
                'kode' => 'P02',
                'nama' => 'Layu Bakteri',
                'deskripsi' => 'Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.',
                'solusi' => 'Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.',
                'gambar' => null
            ],
            [
                'kode' => 'P03',
                'nama' => 'Busuk Buah (Antraknosa)',
                'deskripsi' => 'Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.',
                'solusi' => 'Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.',
                'gambar' => null
            ],
            [
                'kode' => 'P04',
                'nama' => 'Bercak Daun',
                'deskripsi' => 'Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.',
                'solusi' => 'Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.',
                'gambar' => null
            ],
        ];

        foreach ($penyakits as $p) {
            Penyakit::updateOrCreate(['kode' => $p['kode']], $p);
        }

        // 2. Seed Gejala (G01 - G20)
        $gejalas = [
            ['kode' => 'G01', 'nama' => 'Daun menguning', 'bobot' => 3],
            ['kode' => 'G02', 'nama' => 'Daun layu', 'bobot' => 5],
            ['kode' => 'G03', 'nama' => 'Tulang daun memutih/pucat', 'bobot' => 2],
            ['kode' => 'G04', 'nama' => 'Batang menguning', 'bobot' => 3],
            ['kode' => 'G05', 'nama' => 'Akar membusuk', 'bobot' => 5],
            ['kode' => 'G06', 'nama' => 'Tanaman layu mendadak', 'bobot' => 5],
            ['kode' => 'G07', 'nama' => 'Batang kecoklatan jika dipotong', 'bobot' => 4],
            ['kode' => 'G08', 'nama' => 'Keluar lendir putih dari batang', 'bobot' => 5],
            ['kode' => 'G09', 'nama' => 'Akar utama membusuk/rusak', 'bobot' => 4],
            ['kode' => 'G10', 'nama' => 'Bercak coklat pada buah', 'bobot' => 4],
            ['kode' => 'G11', 'nama' => 'Buah membusuk', 'bobot' => 5],
            ['kode' => 'G12', 'nama' => 'Jamur berwarna pink pada buah', 'bobot' => 3],
            ['kode' => 'G13', 'nama' => 'Bercak hitam melingkar pada buah', 'bobot' => 4],
            ['kode' => 'G14', 'nama' => 'Buah kering dan keriput', 'bobot' => 3],
            ['kode' => 'G15', 'nama' => 'Bercak bulat kecil pada daun', 'bobot' => 3],
            ['kode' => 'G16', 'nama' => 'Bercak abu-abu dengan tepi coklat', 'bobot' => 3],
            ['kode' => 'G17', 'nama' => 'Daun kering dan rontok', 'bobot' => 4],
            ['kode' => 'G18', 'nama' => 'Bercak berlubang di tengah', 'bobot' => 2],
            ['kode' => 'G19', 'nama' => 'Pertumbuhan kerdil', 'bobot' => 3],
            ['kode' => 'G20', 'nama' => 'Produksi buah menurun', 'bobot' => 2],
        ];

        foreach ($gejalas as $g) {
            Gejala::updateOrCreate(['kode' => $g['kode']], $g);
        }

        // 3. Seed Rules (Contoh Aturan)

        $p1 = Penyakit::where('kode', 'P01')->first(); // Layu Fusarium
        $p2 = Penyakit::where('kode', 'P02')->first(); // Layu Bakteri
        $p3 = Penyakit::where('kode', 'P03')->first(); // Antraknosa
        $p4 = Penyakit::where('kode', 'P04')->first(); // Bercak Daun

        // Mapping simple rules
        $rules = [
            // P01: Layu Fusarium (G01, G02, G04, G05)
            ['penyakit_id' => $p1->id, 'gejala_kode' => 'G01', 'cf' => 0.8],
            ['penyakit_id' => $p1->id, 'gejala_kode' => 'G02', 'cf' => 0.8],
            ['penyakit_id' => $p1->id, 'gejala_kode' => 'G04', 'cf' => 0.6],
            ['penyakit_id' => $p1->id, 'gejala_kode' => 'G05', 'cf' => 0.7],

            // P02: Layu Bakteri (G06, G07, G08, G09)
            ['penyakit_id' => $p2->id, 'gejala_kode' => 'G06', 'cf' => 0.9],
            ['penyakit_id' => $p2->id, 'gejala_kode' => 'G07', 'cf' => 0.8],
            ['penyakit_id' => $p2->id, 'gejala_kode' => 'G08', 'cf' => 0.9],
            ['penyakit_id' => $p2->id, 'gejala_kode' => 'G09', 'cf' => 0.7],

            // P03: Antraknosa (G10, G11, G12, G13)
            ['penyakit_id' => $p3->id, 'gejala_kode' => 'G10', 'cf' => 0.8],
            ['penyakit_id' => $p3->id, 'gejala_kode' => 'G11', 'cf' => 0.9],
            ['penyakit_id' => $p3->id, 'gejala_kode' => 'G12', 'cf' => 0.7],
            ['penyakit_id' => $p3->id, 'gejala_kode' => 'G13', 'cf' => 0.8],

            // P04: Bercak Daun (G15, G16, G17, G18)
            ['penyakit_id' => $p4->id, 'gejala_kode' => 'G15', 'cf' => 0.7],
            ['penyakit_id' => $p4->id, 'gejala_kode' => 'G16', 'cf' => 0.9],
            ['penyakit_id' => $p4->id, 'gejala_kode' => 'G17', 'cf' => 0.6],
            ['penyakit_id' => $p4->id, 'gejala_kode' => 'G18', 'cf' => 0.5],
        ];

        foreach ($rules as $r) {
            $gejala = Gejala::where('kode', $r['gejala_kode'])->first();
            Rule::updateOrCreate(
                ['penyakit_id' => $r['penyakit_id'], 'gejala_id' => $gejala->id],
                ['cf_pakar' => $r['cf']]
            );
        }
    }
}
