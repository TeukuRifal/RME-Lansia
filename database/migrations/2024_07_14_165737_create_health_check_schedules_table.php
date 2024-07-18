<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthCheckSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('health_check_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_check_schedules');
    }
}
