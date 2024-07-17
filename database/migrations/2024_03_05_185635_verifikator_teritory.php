<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VerifikatorTeritory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftar');
            $table->string('nisn');
            $table->enum('status', ['Terverifikasi', 'Belum Diverifikasi', 'Proses Revisi', 'Di Tolak']);
            $table->string('no_pendaftaran')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->timestamp('tanggal_verifikasi')->nullable();
            $table->timestamps();
        });

        Schema::create('checklist_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('item_checklist');
            $table->enum('status', ['Ya', 'Tidak'])->nullable();
            $table->string('no_pendaftaran')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('id_formulir');
            $table->foreign('id_formulir')->references('id')->on('formulir_pendaftaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pendaftaran');
        Schema::dropIfExists('checklist_pendaftaran');
    }
}
