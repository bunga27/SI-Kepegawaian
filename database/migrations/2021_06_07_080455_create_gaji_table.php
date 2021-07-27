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
            $table->smallInteger('idGaji')->autoIncrement()->unsigned();
            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('pegawai')->onUpdate('cascade');
            $table->string('bulan',6);
            $table->integer('gajibulan');
            $table->integer('totaluangmakan');//$harikerja*$request->uangmakan
            $table->integer('totalgajilembur');//$harilembur*$request->gajilembur
            $table->integer('totalbonusproyek');//$totalproyek*bonusproyek
            $table->integer('totalthr');//$hr*$
            $table->integer('potongantelat');
            $table->integer('totalgaji');





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
