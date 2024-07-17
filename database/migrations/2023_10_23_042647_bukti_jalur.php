<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuktiJalur extends Migration
{
    public function up()
    {
        Schema::create('bukti_ppdb', function (Blueprint $table) {
            $table->id('id_bukti');
            $table->unsignedBigInteger('id_jalur')->unsigned(); 
            $table->string('bukti');
            $table->timestamps();

            $table->foreign('id_jalur')->references('id_jalur')->on('jalur');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('bukti_ppdb');
    }
}
