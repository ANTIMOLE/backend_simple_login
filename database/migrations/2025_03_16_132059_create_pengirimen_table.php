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
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jadwal')->constrained('jadwals');
            $table->integer('id_penjualan')->constrained('penjualans');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->foreign('id_penjualan')->references('id')->on('penjualans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimen');
    }
};
