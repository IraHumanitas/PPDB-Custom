<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Semester4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester4', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftar');
            $table->foreign('id_pendaftar')->references('id')->on('pendaftar');

            $table->string('nama');
            $table->string('nisn');
            
            $table->decimal('agama', 5, 2)->nullable();
            $table->decimal('indonesia', 5, 2)->nullable();
            $table->decimal('mtk', 5, 2)->nullable();
            $table->decimal('inggris', 5, 2)->nullable();
            $table->decimal('pjok', 5, 2)->nullable();
            $table->decimal('ipa', 5, 2)->nullable();
            $table->decimal('ips', 5, 2)->nullable();
            $table->decimal('pkn', 5, 2)->nullable();
            $table->decimal('komputer', 5, 2)->nullable();     
            $table->decimal('sunda', 5, 2)->nullable();     
            $table->decimal('seni', 5, 2)->nullable();         

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
        Schema::dropIfExists('semester4');
    }
}
