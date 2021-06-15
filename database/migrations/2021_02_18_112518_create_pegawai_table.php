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
            $table->integer('jabatan_id')->unsigned();
            $table->foreign('jabatan_id')->references('idJabatan')->on('jabatan')->onUpdate('cascade');
            $table->string('nama');
            $table->string('pasfoto');
            $table->string('nik');
            $table->string('jeniskelamin');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('alamat');
            $table->string('agama');
            $table->string('telp');
            $table->string('statuskerja');

            $table->date('tanggalgabung')->nullable();

            //riwayatpend
            $table->string('sd')->nullable();
            $table->string('smp')->nullable();
            $table->string('sma')->nullable();
            $table->string('lanjutan')->nullable();

            //fisik
            $table->string('riwayatpenyakit')->nullable();
            $table->Integer('tinggi')->nullable();
            $table->Integer('berat')->nullable();

            //wali

            $table->string('status',)->nullable();
            $table->Integer('tanggungan')->nullable();
            $table->string('namawali')->nullable();
            $table->string('hubungan')->nullable();
            $table->string('telpwali')->nullable();
            $table->string('alamatwali')->nullable();

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
