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
            $table->string('id_barang_donasi')->primary();
            $table->foreignId('id_kategori')->constrained('kategoris','id_kategori')->onDelete('cascade');
            $table->string('nama');
            $table->double('ukuran');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->double('berat');
            $table->timestamps();

           
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
