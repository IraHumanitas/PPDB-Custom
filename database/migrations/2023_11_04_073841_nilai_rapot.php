<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NilaiRapot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_rapot', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('nisn');

            $table->unsignedBigInteger('id_pendaftar')->nullable();
            $table->foreign('id_pendaftar')->references('id')->on('pendaftar');

            $table->string('averageS1')->nullable();    
            $table->string('averageS2')->nullable();     
            $table->string('averageS3')->nullable();     
            $table->string('averageS4')->nullable();     
            $table->string('averageS5')->nullable();     
            $table->string('averageS6')->nullable();     

            $table->string('averageMTK')->nullable();
            $table->string('averageInggris')->nullable();
            $table->string('averageKomputer')->nullable();

            $table->string('averageAll')->nullable();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_rapot');
    }
}
