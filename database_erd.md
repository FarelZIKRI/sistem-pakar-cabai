# Entity Relationship Diagram (ERD) - Sistem Pakar Cabai

Berikut adalah visualisasi hubungan antar tabel dalam database `sispak_cabe`.

```mermaid
erDiagram
    penyakits ||--o{ rules : "has many"
    gejalas ||--o{ rules : "has many"
    penyakits ||--o{ konsultasis : "result of"

    penyakits {
        bigint id PK
        string kode
        string nama
        text deskripsi
        text solusi
        string gambar
        timestamp created_at
        timestamp updated_at
    }

    gejalas {
        bigint id PK
        string kode
        string nama
        double bobot "Bobot WP"
        timestamp created_at
        timestamp updated_at
    }

    rules {
        bigint id PK
        bigint penyakit_id FK
        bigint gejala_id FK
        double cf_pakar
        timestamp created_at
        timestamp updated_at
    }

    konsultasis {
        bigint id PK
        string nama_pengguna
        datetime tanggal
        text hasil_cf "JSON"
        text hasil_wp "JSON"
        bigint penyakit_terpilih_id FK
        double nilai_keyakinan
        text input_gejala "JSON"
        timestamp created_at
        timestamp updated_at
    }
```

## Penjelasan Relasi

1.  **Rules (Aturan)**

    -   Tabel `rules` adalah tabel pivot (penghubung) antara `penyakits` dan `gejalas`.
    -   **One-to-Many**: Satu `penyakit` bisa memiliki banyak `rule` (banyak gejala).
    -   **One-to-Many**: Satu `gejala` bisa ada di banyak `rule` (banyak penyakit).
    -   Aturan ini menyimpan nilai `cf_pakar` yang menunjukkan seberapa yakin pakar bahwa gejala tersebut menyebabkan penyakit tersebut.

2.  **Konsultasi**
    -   Tabel `konsultasis` menyimpan riwayat diagnosa user.
    -   **One-to-Many**: Satu `penyakit` bisa menjadi hasil dari banyak `konsultasi`.
    -   Kolom `penyakit_terpilih_id` adalah Foreign Key yang merujuk ke tabel `penyakits`.
