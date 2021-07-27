<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->smallInteger('id')->autoIncrement();

            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('pegawai')->unique()->onUpdate('cascade');

            $table->string('email',40)->unique();
            $table->string('level',10);
            $table->string('password',70);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
