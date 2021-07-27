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
            $table->smallInteger('idJabatan')->autoIncrement()->unsigned();
            $table->string('jabatan', 25);
            $table->integer('gajiharian');
            $table->integer('gajilembur');
            $table->integer('uangmakan');
            $table->integer('bonusproyek');
            $table->integer('hariraya');
            $table->integer('potongantelat');

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
