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
            $table->increments('idPegawai');

            $table->string('nama');
            $table->string('pasfoto');
            $table->string('nik');
            $table->string('jeniskelamin');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('alamat');
            $table->string('agama');
            $table->string('telp');
            $table->string('email');
            $table->string('jabatan');
            $table->date('tanggalgabung');
            $table->string('statuskerja');

            //riwayatpend
            $table->string('sd');
            $table->string('smp');
            $table->string('sma');
            $table->string('lanjutan');

            //fisik
            $table->string('riwayatpenyakit');
            $table->Integer('tinggi');
            $table->Integer('berat');

            //wali

            $table->string('status',);
            $table->Integer('tanggungan');
            $table->string('namawali');
            $table->string('hubungan');
            $table->string('telpwali');
            $table->string('alamatwali');

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
