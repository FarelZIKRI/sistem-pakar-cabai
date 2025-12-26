# Sitemap - Sistem Pakar Cabai

Berikut adalah struktur halaman (Sitemap) dari aplikasi Sistem Pakar Tanaman Cabai.

```mermaid
graph TD
    Root[("<b>ROOT (/)</b><br>Landing Page")]

    %% Public Area
    Root --> Konsultasi["<b>/konsultasi</b><br>Form Diagnosis"]
    Konsultasi --> Hasil["<b>/hasil/{id}</b><br>Hasil & Solusi"]

    %% Admin Area
    Root --> Login["<b>/admin</b><br>Dashboard Admin"]

    subgraph "Admin Panel"
        Login --> Dashboard["Dashboard Overview"]

        Dashboard --> Penyakit["<b>/admin/penyakit</b><br>Manajemen Penyakit"]
        Penyakit --> P_Create[Tambah Penyakit]
        Penyakit --> P_Edit[Edit Penyakit]
        Penyakit --> P_Delete[Hapus Penyakit]

        Dashboard --> Gejala["<b>/admin/gejala</b><br>Manajemen Gejala"]
        Gejala --> G_Create[Tambah Gejala]
        Gejala --> G_Edit[Edit Gejala]
        Gejala --> G_Delete[Hapus Gejala]

        Dashboard --> Rules["<b>/admin/rules</b><br>Basis Aturan (Rule Base)"]
        Rules --> R_Create[Tambah Rule]
        Rules --> R_Edit[Edit Rule]
        Rules --> R_Delete[Hapus Rule]

        Dashboard --> Riwayat["<b>/admin/riwayat</b><br>Riwayat Konsultasi"]
        Riwayat --> RiwayatDetail[Detail Hasil Diagnosis]
        Riwayat --> RiwayatDelete[Hapus Riwayat]
    end

    classDef public fill:#e1f5fe,stroke:#01579b,stroke-width:2px;
    classDef admin fill:#f3e5f5,stroke:#4a148c,stroke-width:2px;
    classDef delete fill:#ffebee,stroke:#c62828,stroke-width:2px,stroke-dasharray: 5 5;

    class Root,Konsultasi,Hasil public;
    class Login,Dashboard,Penyakit,Gejala,Rules,P_Create,P_Edit,G_Create,G_Edit,R_Create,R_Edit,Riwayat,RiwayatDetail admin;
    class P_Delete,G_Delete,R_Delete,RiwayatDelete delete;
```

## Deskripsi Halaman

### Halaman Publik (User)

1.  **Beranda (/)**: Halaman utama berisi informasi tentang sistem pakar.
2.  **Konsultasi (/konsultasi)**: Form untuk pengguna memasukkan data diri dan memilih gejala.
3.  **Hasil Diagnosis (/hasil/{id})**: Menampilkan penyakit yang teridentifikasi, nilai keyakinan (CF & WP), serta solusi penanganan.

### Halaman Admin

1.  **Dashboard (/admin)**: Ringkasan jumlah data (Penyakit, Gejala, Rule, History Konsultasi).
2.  **Manajemen Penyakit**: Modul untuk menambah, mengubah, dan menghapus data penyakit & solusi.
3.  **Manajemen Gejala**: Modul untuk mengelola data gejala dan bobot (untuk WP).
4.  **Basis Aturan (Rule Base)**: Tempat menghubungkan Penyakit dengan Gejala dan menentukan nilai CF Pakar.
5.  **Riwayat Konsultasi**: Modul untuk melihat histori diagnosis pengguna, melihat detail perhitungan, dan menghapus data.
