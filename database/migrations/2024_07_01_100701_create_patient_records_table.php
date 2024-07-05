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
            $table->boolean('riwayat_ptm_keluarga')->default(false);
            $table->boolean('riwayat_ptm_sendiri')->default(false);
            $table->boolean('merokok')->default(false);
            $table->boolean('kurang_aktivitas_fisik')->default(false);
            $table->boolean('kurang_sayur_buah')->default(false);
            $table->boolean('konsumsi_alkohol')->default(false);
            $table->boolean('stress')->default(false);
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
