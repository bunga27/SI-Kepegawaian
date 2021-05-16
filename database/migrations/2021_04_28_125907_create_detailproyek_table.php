<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailproyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailproyek', function (Blueprint $table) {
            $table->increments('idDetailProyek')->unsigned();
            $table->integer('proyek_id')->unsigned();
            $table->foreign('proyek_id')->references('idProyek')->on('proyek')->onUpdate('cascade');
            $table->string('tanggal');
            $table->string('progres');
            $table->string('keterangan');
            $table->string('gambar');
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
        Schema::dropIfExists('detailproyek');
    }
}
