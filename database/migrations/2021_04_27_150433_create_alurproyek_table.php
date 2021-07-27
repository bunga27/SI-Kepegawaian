<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlurproyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alurproyek', function (Blueprint $table) {
            $table->smallInteger('idAlurProyek')->autoIncrement()->unsigned();
            $table->smallInteger('idProyek')->unsigned();
            $table->foreign('idProyek')->references('idProyek')->on('proyek')->onUpdate('cascade');
            $table->string('tahapan',150);
            $table->tinyInteger('progres');
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
        Schema::dropIfExists('alurproyek');
    }
}
