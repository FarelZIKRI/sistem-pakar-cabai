<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna', 100);
            $table->dateTime('tanggal')->useCurrent();
            $table->text('hasil_cf')->nullable();
            $table->text('hasil_wp')->nullable();
            $table->foreignId('penyakit_terpilih_id')->nullable()->constrained('penyakits')->onDelete('set null');
            $table->double('nilai_keyakinan')->nullable();
            $table->text('input_gejala')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
