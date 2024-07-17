<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoalMinatBakat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('soal_minat_bakat', function (Blueprint $table) {
            $table->id();
            
            $table->string('pertanyaan');
            $table->string('pilihan1');
            $table->string('pilihan2'); 
            $table->string('pilihan3'); 
            $table->string('pilihan4'); 
            $table->string('pilihan5'); 

            $table->unsignedBigInteger('id_kompetensi_keahlian');
            $table->foreign('id_kompetensi_keahlian')->references('id_keahlian')->on('program_keahlian');

            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('soal_minat_bakat');
    }
}
