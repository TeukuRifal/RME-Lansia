<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->date('record_date');
            $table->string('riwayat_ptm_keluarga') ->nullable();
            $table->string('riwayat_ptm_sendiri') ->nullable();
            $table->string('merokok') ->nullable();
            $table->string('kurang_aktivitas_fisik') ->nullable();
            $table->string('kurang_sayur_buah') ->nullable();
            $table->string('konsumsi_alkohol') ->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->float('indeks_massa_tubuh')->nullable();
            $table->integer('lingkar_perut')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('gula_darah_sewaktu')->nullable();
            $table->string('kolesterol_total')->nullable();
            $table->string('masalah_kesehatan')->nullable();
            $table->string('obat_fasilitas')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_records');
    }
}
