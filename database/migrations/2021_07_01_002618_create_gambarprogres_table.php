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
            $table->increments('idGambarprogres');
            $table->string('gambar2');
            $table->integer('detailproyek_id')->unsigned();
            $table->foreign('detailproyek_id')->references('idDetailproyek')->on('detailproyek')->onDelete('cascade');
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
