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
        Schema::create('komisis', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_pegawai')->references('id')->on('pegawais');
            $table->foreign('id_penjualan')->references('id')->on('penjualans');
            $table->foreign('kode_barang')->references('id')->on('barangs');
            $table->double('komisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komisis');
    }
};
