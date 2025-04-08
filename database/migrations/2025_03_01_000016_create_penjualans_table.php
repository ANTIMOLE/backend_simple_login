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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id('no_penjualan');
            $table->string('id_pegawai');
            $table->string('id_penitip');
            $table->string('list_barang');
            $table->string('status');
            $table->string('tipe');
            $table->string('alamat');
            $table->string('bukti_transfer');
            $table->timestamps();

            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
            $table->foreign('id_penitip')->references('id_penitip')->on('penitips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
