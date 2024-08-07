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
            $table->string('riwayat_ptm_keluarga')->nullable();
            $table->string('riwayat_ptm_sendiri')->nullable();
            $table->string('merokok')->nullable();
            $table->string('kurang_aktivitas_fisik')->nullable();
            $table->string('kurang_sayur_buah')->nullable();
            $table->string('konsumsi_alkohol')->nullable();
            $table->float('berat_badan')->nullable();
            $table->float('tinggi_badan')->nullable();
            $table->float('asam_urat')->nullable();
            $table->float('lingkar_perut')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('tekanan_darah_sistolik')->nullable();
            $table->string('tekanan_darah_diastolik')->nullable();
            $table->float('gula_darah_sewaktu')->nullable();
            $table->float('gula_darah_puasa')->nullable();
            $table->float('kolesterol_total')->nullable();
            $table->string('masalah_kesehatan')->nullable();
            $table->string('obat')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_records');
    }
}
