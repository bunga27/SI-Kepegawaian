<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembiayaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembiayaan', function (Blueprint $table) {
            $table->increments('idPembiayaan')->unsigned();
            $table->integer('proyek_id')->unsigned();
            $table->foreign('proyek_id')->references('idProyek')->on('proyek')->onUpdate('cascade');
            $table->string('tanggal');
            $table->string('jenispekerjaan');
            $table->string('uraianpekerjaan');
            $table->string('vol');
            $table->string('hargasatuan');
            $table->string('hargatotal');
            $table->string('nota');
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
        Schema::dropIfExists('pembiayaan');
    }
}
