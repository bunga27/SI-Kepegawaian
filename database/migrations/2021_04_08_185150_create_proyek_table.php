<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->increments('idProyek')->unsigned();
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('idPegawai')->on('pegawai')->onUpdate('cascade');
            $table->string('client');
            $table->string('nama');
            $table->string('alamat');
            $table->string('bulan')->nullable();
            $table->string('tanggalpengerjaan');
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
        Schema::dropIfExists('proyek');
    }
}
