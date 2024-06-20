<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('email')->nullable();
            $table->string('riwayat_ptm_keluarga')->nullable();
            $table->string('riwayat_ptm_sendiri')->nullable();
            $table->string('merokok')->nullable();
            $table->string('kurang_aktivitas_fisik')->nullable();
            $table->string('kurang_sayur_buah')->nullable();
            $table->string('konsumsi_alkohol')->nullable();
            $table->string('stress')->nullable();
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('indeks_massa_tubuh')->nullable();
            $table->float('lingkar_perut')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('gula_darah_sewaktu')->nullable();
            $table->string('kolesterol_total')->nullable();
            $table->string('masalah_kesehatan')->nullable();
            $table->string('obat_fasilitas')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
