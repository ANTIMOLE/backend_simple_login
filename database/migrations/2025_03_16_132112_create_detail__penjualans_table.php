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
        Schema::create('detail__penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_penjualan')->references('id')->on('penjualans');
            $table->string('no_nota');
            $table->double('komisi');
            $table->double('total_transaksi');
            $table->double('total_penitip');
            $table->double('total_reusemart');
            $table->timestamps();
            $table->foreign('id_penjualan')->references('id')->on('penjualans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__penjualans');
    }
};
