<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->increments('idJabatan')->unsigned();
            $table->string('jabatan');
            $table->string('gajiharian');
            $table->string('gajilembur');
            $table->string('uangmakan');
            $table->string('bonusproyek');
            $table->string('hariraya');
            $table->string('potongantelat');

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
        Schema::dropIfExists('jabatan');
    }
}
