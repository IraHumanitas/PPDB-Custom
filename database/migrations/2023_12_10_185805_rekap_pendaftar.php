<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RekapPendaftar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_pendaftar', function (Blueprint $table) {
            $table->id();

            $table->string('kelurahan');
            $table->string('kota');
            $table->string('asal_sekolah');
            $table->string('keahlian');
            $table->string('minat_bakat');
            $table->string('gender');
            $table->string('usia');

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
        Schema::dropIfExists('rekap_pendaftar');
    }
}
