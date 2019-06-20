<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('no_kk', 16);
            $table->string('no_rt', 2);
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('agama');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir'); 
            $table->string('status_keluarga');
            $table->string('status_kawin');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}
