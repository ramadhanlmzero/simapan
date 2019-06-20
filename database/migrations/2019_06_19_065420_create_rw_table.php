<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rw', function (Blueprint $table) {
            $table->increments('id_rw');
            $table->string('no_rw', 2);
            $table->string('nama_rw');
            $table->unsignedInteger('id_kelurahan');
            $table->foreign('id_kelurahan')->references('id_kelurahan')->on('kelurahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rw');
    }
}
