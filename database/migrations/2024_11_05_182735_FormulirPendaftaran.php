<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormulirPendaftaran extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->id();

            $table->string('no_pendaftaran')->unique()->nullable();

            $table->string('nama');
            $table->string('nik');
            $table->string('nisn');

            $table->unsignedBigInteger('id_minatbakat')->nullable();
            $table->foreign('id_minatbakat')->references('id')->on('minat_bakat');

            $table->string('jarak')->nullable();

            $table->unsignedBigInteger('id_pendaftar')->nullable();
            $table->foreign('id_pendaftar')->references('id')->on('pendaftar');

            $table->unsignedBigInteger('id_jalur')->nullable(); 
            $table->foreign('id_jalur')
                ->unsigned()
                ->references('id_jalur')
                ->on('jalur')
                ->onDelete('cascade');   
                  
            $table->unsignedBigInteger('id_keahlian')->nullable(); 
            $table->foreign('id_keahlian')
                ->unsigned()
                ->references('id_keahlian')
                ->on('program_keahlian')
                ->onDelete('cascade');
                  
            $table->unsignedBigInteger('id_kompetensi')->nullable(); 
            $table->foreign('id_kompetensi')
                ->unsigned()
                ->references('id_keahlian')
                ->on('program_keahlian')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('id_periode')->nullable();     
            $table->foreign('id_periode')
                ->unsigned()
                ->references('id_periode')
                ->on('periode')
                ->onDelete('cascade');
        
            $table->unsignedBigInteger('id_status')->nullable(); 
            $table->foreign('id_status')
                ->unsigned()
                ->references('id_status')
                ->on('status_pendaftaran')
                ->onDelete('cascade');
        
            $table->string('skck')->nullable();
            $table->string('surat_lulus')->nullable();
            $table->string('skhun')->nullable();
            $table->string('surat_sehat')->nullable();

            $table->string('bukti')->nullable();
            $table->string('bukti2')->nullable();
            $table->string('bukti3')->nullable();
            $table->string('bukti4')->nullable();


            $table->string('foto')->nullable();
            $table->text('alamat')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir');
    }
}
