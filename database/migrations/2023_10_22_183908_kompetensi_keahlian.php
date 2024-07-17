<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KompetensiKeahlian extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('program_keahlian', function (Blueprint $table) {
            $table->id('id_keahlian');
            $table->string('nama_program');
            $table->string('singkatan');
            $table->string('pelajaran')->nullable();
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->string('program');
            $table->string('kuota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_keahlian');

    }
}
