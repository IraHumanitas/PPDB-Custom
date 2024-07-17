<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MinatBakat extends Migration{
    public function up()
    {
        Schema::create('minat_bakat', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_pendaftar')->nullable();
            $table->foreign('id_pendaftar')->references('id')->on('pendaftar');


            $table->string('nama');
            $table->string('nisn');

            $table->unsignedBigInteger('id_kompetensi_keahlian')->nullable();
            $table->foreign('id_kompetensi_keahlian')->references('id_keahlian')->on('program_keahlian');

            $table->string('hasil')->nullable();

            $table->unsignedBigInteger('id_soal')->nullable();
            $table->foreign('id_soal')->references('id')->on('soal_minat_bakat');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('minat_bakat');
    }

}
