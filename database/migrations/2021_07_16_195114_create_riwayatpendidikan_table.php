<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatpendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatpendidikan', function (Blueprint $table) {
            $table->smallInteger('idRiwayatPendidikan')->autoIncrement();
            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('pegawai')->onUpdate('cascade');
            $table->string('jenjang', 10)->nullable();
            $table->string('tempat', 25)->nullable();
            $table->string('tahun', 25)->nullable();
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
        Schema::dropIfExists('riwayatpendidikan');
    }
}
