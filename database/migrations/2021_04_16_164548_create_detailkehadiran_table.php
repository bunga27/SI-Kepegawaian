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
            $table->string('buktidatang')->nullable();
            $table->string('ketdatang')->nullable();
            $table->string('buktipulang')->nullable();
            $table->string('ketpulang')->nullable();
            $table->string('bulan')->nullable();
            $table->string('keterangan');
            $table->string('ketepatanhadir');

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
