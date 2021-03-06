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
            $table->smallInteger('idProyek')->autoIncrement()->unsigned();
            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('pegawai')->onUpdate('cascade');
            $table->string('nama',50);
            $table->string('client', 25);
            $table->string('alamat', 180);
            $table->string('bulan', 6)->nullable();
            $table->date('tanggalpengerjaan');
            $table->date('tanggalberakhir');

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
