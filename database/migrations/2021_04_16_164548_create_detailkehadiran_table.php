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
            $table->smallInteger('idDetailKehadiran')->autoIncrement()->unsigned();
            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('pegawai')->onUpdate('cascade');
            $table->string('buktidatang',100)->nullable();
            $table->string('ketdatang',50)->nullable();
            $table->string('buktipulang',100)->nullable();
            $table->string('ketpulang', 50)->nullable();
            $table->string('bulan',6)->nullable();
            $table->string('keterangan',20);
            $table->string('ketepatanhadir',20);

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
