<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->date('tanggal_lahir');
           
            $table->string('jenis_kelamin');
            $table->string('agama') ->nullable();
            $table->text('alamat') ->nullable();
            $table->string('no_hp') ->nullable();
            $table->string('pendidikan_terakhir') ->nullable();
            $table->string('pekerjaan') ->nullable();
            $table->string('status_kawin') ->nullable();
            $table->string('gol_darah') ->nullable();
            $table->string('email') ->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
