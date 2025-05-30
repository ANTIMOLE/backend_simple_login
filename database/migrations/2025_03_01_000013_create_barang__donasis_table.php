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
            $table->foreignId('id_subkategori')->constrained('subkategoris','id_subkategori')->onDelete('cascade');
            $table->string('id_penitip');
            $table->string('nama');
            $table->double('ukuran');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->double('berat');
            $table->boolean('status_donasi')->default(0);
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
