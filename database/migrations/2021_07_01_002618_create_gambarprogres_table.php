<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarprogresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambarprogres', function (Blueprint $table) {
            $table->smallInteger('idGambarprogres')->autoIncrement();
            $table->string('gambar2',100);
            $table->smallInteger('idDetailProyek')->unsigned();
            $table->foreign('idDetailProyek')->references('idDetailProyek')->on('detailproyek')->onDelete('cascade');
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
        Schema::dropIfExists('gambarprogres');
    }
}
