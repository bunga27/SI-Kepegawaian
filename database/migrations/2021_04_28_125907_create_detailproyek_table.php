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
            $table->smallInteger('idDetailProyek')->autoIncrement()->unsigned();
            $table->smallInteger('idProyek')->unsigned();
            $table->foreign('idProyek')->references('idProyek')->on('proyek')->onUpdate('cascade');
            $table->smallInteger('idAlurProyek')->unsigned();
            $table->foreign('idAlurProyek')->references('idAlurProyek')->on('alurproyek')->onUpdate('cascade');
            $table->date('tanggal');
            $table->string('keterangan',50);
            $table->string('gambar',100);
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
