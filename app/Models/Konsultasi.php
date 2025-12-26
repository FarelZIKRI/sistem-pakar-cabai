<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $casts = [
        'hasil_cf' => 'array',
        'hasil_wp' => 'array',
        'input_gejala' => 'array',
        'tanggal' => 'datetime',
    ];

    protected $fillable = [
        'nama_pengguna',
        'tanggal',
        'hasil_cf',
        'hasil_wp',
        'penyakit_terpilih_id',
        'nilai_keyakinan',
        'input_gejala',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_terpilih_id');
    }
}
