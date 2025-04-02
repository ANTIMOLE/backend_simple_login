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
            $table->string('id_penitipan');
            $table->integer('id_kategori');
            $table->string('nama');
            $table->string('ukuran');
            $table->text('deskripsi');
            $table->string('hunter');
            $table->string('gambar');
            $table->double('berat');
            $table->string('kondisi');
            $table->integer('masa_penitipan');
            $table->tinyInteger('perpanjangan');
            $table->double('harga'); 
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('id_penitipan')->references('id_penitipan')->on('penitipans')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade');
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
