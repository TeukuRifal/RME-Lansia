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
        Schema::table('patient_records', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn('patient_id');
            $table->dropColumn('record_date');
            $table->dropColumn('riwayat_ptm_keluarga');
            $table->dropColumn('riwayat_ptm_sendiri');
            $table->dropColumn('merokok');
            $table->dropColumn('kurang_aktivitas_fisik');
            $table->dropColumn('kurang_sayur_buah');
            $table->dropColumn('konsumsi_alkohol');
            $table->dropColumn('stress');
            $table->dropColumn('berat_badan');
            $table->dropColumn('tinggi_badan');
            $table->dropColumn('indeks_massa_tubuh');
            $table->dropColumn('lingkar_perut');
            $table->dropColumn('tekanan_darah');
            $table->dropColumn('gula_darah_sewaktu');
            $table->dropColumn('kolesterol_total');
            $table->dropColumn('masalah_kesehatan');
            $table->dropColumn('obat_fasilitas');
            $table->dropColumn('tindak_lanjut');
        });
        Schema::dropIfExists('patient_records');
    }
}