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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('kode_barang')->primary();
            $table->foreignId('id_penitip')->constrained('penitips');
            $table->integer('id_kategori')->constrained('kategoris');
            $table->integer('id_kondisi')->constrained('kondisis');
            $table->string('nama');
            $table->string('gambar');
            $table->string('ukuran');
            $table->text('deskripsi');
            $table->string('hunter');
            $table->integer('masa_penitipan');
            $table->tinyInteger('perpanjangan');
            $table->flodoubleat('berat');
            $table->double('harga'); 
            $table->enum('status', ['Tersedia', 'Terjual']);
            $table->timestamps();
            
            $table->foreign('id_penitip')->references('id')->on('penitips');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->foreign('id_kondisi')->references('id')->on('kondisis');
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
