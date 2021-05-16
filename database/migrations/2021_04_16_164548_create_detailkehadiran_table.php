<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailkehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailkehadiran', function (Blueprint $table) {
            $table->increments('idDetailKehadiran')->unsigned();
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('idPegawai')->on('pegawai')->onUpdate('cascade');
            $table->integer('kehadiran_id')->unsigned();
            $table->foreign('kehadiran_id')->references('idKehadiran')->on('kehadiran')->onUpdate('cascade');
            $table->string('ketkehadiran');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailkehadiran');
    }
}
