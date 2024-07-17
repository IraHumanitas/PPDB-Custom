<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPendaftar extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_login')->nullable();
            $table->foreign('id_login')->references('id')->on('user_pendaftar');

            $table->string('nama');
            $table->string('nik');
            $table->string('nisn');

            $table->string('tempat_lahir',50)->nullable();
            $table->date('tanggal_lahir')->nullable();

            $table->string('umur')->nullable();

            $table->enum('jenis_kelamin',['L','P'])->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('agama',15)->nullable();
            $table->string('hp',18)->nullable();

            $table->string('alamat')->nullable();

            $table->unsignedBigInteger('id_asal_kelurahan')->nullable(); 
            $table->foreign('id_asal_kelurahan')->unsigned()->references('id')->on('asal_kelurahan')->onDelete('cascade');             
            
            $table->string('kecamatan',50)->nullable();

            $table->unsignedBigInteger('id_asal_kota')->nullable(); 
            $table->foreign('id_asal_kota')->unsigned()->references('id')->on('asal_kota')->onDelete('cascade');   

            $table->string('provinsi',50)->nullable();
            $table->string('kode_pos',5)->nullable();

            $table->string('aktakelahiran')->nullable();
            $table->string('kartukeluarga')->nullable();

            $table->string('nama_ayah',100)->nullable();
            $table->string('nik_ayah',50)->nullable();
            $table->string('pekerjaan_ayah',50)->nullable();
            $table->string('hp_ayah',18)->nullable();

            $table->string('nama_ibu',100)->nullable();
            $table->string('nik_ibu',50)->nullable();
            $table->string('pekerjaan_ibu',50)->nullable();
            $table->string('hp_ibu',18)->nullable();

            $table->string('alamat_ortu')->nullable();

            $table->string('nama_wali',100)->nullable();
            $table->string('nik_wali',50)->nullable();
            $table->string('pekerjaan_wali',50)->nullable();
            $table->string('hp_wali',15)->nullable();
            $table->string('alamat_wali')->nullable();


            $table->string('no_kk',50)->nullable();

            $table->unsignedBigInteger('id_asal_sekolah')->nullable(); 
            $table->foreign('id_asal_sekolah')->unsigned()->references('id')->on('asal_sekolah')->onDelete('cascade');            
            
            $table->integer('tahun_lulus')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
}

