<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang__donasis', function (Blueprint $table) {
            $table->string('kode_donasi')->primary();
            $table->integer('id_kategori')->constrained('kategoris');
            $table->string('nama');
            $table->double('ukuran');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->double('berat');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang__donasis');
    }
};
