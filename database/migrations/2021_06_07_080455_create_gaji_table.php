<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->increments('idGaji')->unsigned();
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('idPegawai')->on('pegawai')->onUpdate('cascade');
            $table->string('bulan');
            $table->string('gajibulan');
            $table->string('totaluangmakan');//$harikerja*$request->uangmakan
            $table->string('totalgajilembur');//$harilembur*$request->gajilembur
            $table->string('totalbonusproyek');//$totalproyek*bonusproyek
            $table->string('totalthr');//$hr*$
            $table->string('potongantelat');
            $table->string('totalgaji');





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
        Schema::dropIfExists('gaji');
    }
}
