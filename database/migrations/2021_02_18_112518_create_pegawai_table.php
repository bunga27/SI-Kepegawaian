<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigInteger('nik')->autoIncrement()->unsigned();
            $table->smallInteger('idJabatan')->unsigned();
            $table->foreign('idJabatan')->references('idJabatan')->on('jabatan')->onUpdate('cascade');
            $table->string('nama', 50);
            $table->string('pasfoto',100);
            $table->string('jeniskelamin', 10);
            $table->string('tempatlahir', 20);
            $table->date('tanggallahir');
            $table->string('alamat', 180);
            $table->string('agama', 10);
            $table->string('telp', 15);
            $table->string('statuskerja', 12);
            $table->date('tanggalgabung')->nullable();


            //fisik
            $table->string('riwayatpenyakit',40)->nullable();
            $table->tinyInteger('tinggi')->nullable();
            $table->tinyInteger('berat' )->nullable();

            //wali

            $table->string('status',15)->nullable();
            $table->Integer('tanggungan')->nullable();
            $table->string('namawali',25)->nullable();
            $table->string('hubungan', 10)->nullable();
            $table->string('telpwali', 15)->nullable();
            $table->string('alamatwali',180)->nullable();

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
        Schema::dropIfExists('pegawai');
    }
}
