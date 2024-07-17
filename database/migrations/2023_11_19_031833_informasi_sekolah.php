<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformasiSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('informasi_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('judul',100);
            $table->longText('deskripsi');
            $table->text('foto');
            $table->text('video')->nullable();
            $table->boolean('checkbox')->default(0);
            $table->date('date')->format('d/m/Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_sekolah');

    }
}
